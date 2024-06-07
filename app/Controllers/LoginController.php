<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use App\Exceptions\InvalidCredentialsException;
use App\Exceptions\UserNotFoundException;
use Exception;

class LoginController extends BaseController
{
    use ResponseTrait;

    public function login(): string
    {
        return view('pages/login');
    }

    public function recuperar(): string
    {
        return view('pages/recuperar');
    }

    public function registrar(): string
    {
        return view('pages/registrar');
    }

    public function logear(): ResponseInterface
    {
        try {

            // Crear instancia del modelo desde los datos POST
            $user = UserModel::createFromPostData($this->request->getPost());

            if (!$user->userExist()) {
                return $this->failNotFound('User not found');
            }

            if (!$user->userPassCorrect()) {
                return $this->failUnauthorized('Invalid credentials');
            }

            $user->dataSession();

            $retorno['url'] = base_url($user->urlDir());
            $retorno['msj'] = 'User successfully logged in';

            return $this->respondUpdated($retorno);

        } catch (UserNotFoundException $e) {
            return $this->failNotFound($e->getMessage());
        } catch (InvalidCredentialsException $e) {
            return $this->failUnauthorized($e->getMessage());
        } catch (Exception $e) {
            $retorno['msj'] = 'Server error';
            return $this->failServerError($retorno['msj']);
        }
    }

    public function registrarse(): ResponseInterface
    {
        $retorno = [
            'estado' => 'error',
            'msj' => 'Error en el back',
            'url' => base_url('/login')
        ];

        try {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $localidad = $_POST['localidad'];
            $nacionalidad = $_POST['nacionalidad'];
            $sobre = $_POST['sobre_mi'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $contra = $_POST['contra'];
            $fecha = $_POST['fecha_nacimiento'];

            $userModel = new UserModel(
                $nombre,
                $direccion,
                $localidad,
                $nacionalidad,
                $sobre,
                $apellido,
                $email,
                $telefono,
                $dni,
                $contra,
                $fecha
            );

            if ($userModel->userExist()) {
                throw new Exception('El usuario ya existe');
            }

            if ($userModel->createUser()) {
                throw new Exception('Error al insertar usuario!');
            }
            $retorno['msj'] = 'Usuario registrado con exito!';

            return $this->respondUpdated($retorno);
        } catch (Exception $e) {
            $retorno['msj'] = $e->getMessage();
            return $this->response->setJSON($retorno);
        }
    }

    public function recuperarse(): ResponseInterface
    {
        $retorno = [
            'estado' => 'error',
            'msj' => 'Error en el back',
            'url' => base_url('/login')
        ];

        try {
            $mail = new Phpmailer_lib();
            var_dump($mail);
            $mail = $mail->load();

            var_dump($mail);
            $mail->addAddress($_POST['email']);

            $mail->Subject = 'Recuperacion de la contraseña.';
            $mail->Body = '<html>
        <h1>Contraseña</h1>
        </html>';

            $retorno['estado'] = 'ok';
            $retorno['msj'] = 'Email enviado con exito!';
            $retorno['url'] = base_url('/login');

            return $this->response->setJSON($retorno);
        } catch (Exception $e) {
            $retorno['msj'] = $e->getMessage();
            return $this->response->setJSON($retorno);
        }
    }
}

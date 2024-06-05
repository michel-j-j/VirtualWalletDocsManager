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
        $retorno = [
            'msj' => 'Email y/o contraseña erróneo.',
            'url' => base_url('/')
        ];

        try {
            $userModel = new UserModel();
            $email = $this->request->getPost('email');
            $contra = $this->request->getPost('contra');

            $user = $userModel->where('email', $email)->first();

            if ($user == null) {
                throw new UserNotFoundException('El usuario no existe.');
            }

            if ($user['contraseña'] != $contra) {
                throw new InvalidCredentialsException('Contraseña incorrecta.');
            }

            $tipoRol = ($user['id_rol'] == 1) ? 'Administrador' : 'Ciudadano';
            $index = ($user['id_rol'] == 1) ? 'dashboard/admin' : 'dashboard/user';

            $retorno['url'] = base_url($index);

            $data = [
                'id' => $user['id'],
                'nombre' => $user['nombre'],
                'apellido' => $user['apellido'],
                'tipo_rol' => $tipoRol,
                'rol' => $user['id_rol'],
                'index' => $index
            ];
            session()->set($data);

            $retorno['msj'] = 'El usuario se logeó con éxito!';

            return $this->respondUpdated($retorno);

        } catch (UserNotFoundException $e) {
            return $this->failNotFound($e->getMessage());
        } catch (InvalidCredentialsException $e) {
            return $this->failUnauthorized($e->getMessage());
        } catch (Exception $e) {
            $retorno['msj'] = 'Error en el servidor.';
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
            $userModel = new UserModel();
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

            $datos = [

                'nombre' => $nombre,
                'apellido' => $apellido,
                'direccion' => $direccion,
                'localidad' => $localidad,
                'nacionalidad' => $nacionalidad,
                'sobre_mi' => $sobre,
                'email' => $email,
                'dni' => $dni,
                'fecha_nacimiento' => $fecha,
                'telefono' => $telefono,
                'contraseña' => $contra,
                'id_rol' => 2
            ];

            if ($userModel->where('email', $email)->first()) {
                throw new Exception('El usuario ya existe');
            }

            if (!$userModel->insert($datos)) {
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

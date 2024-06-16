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

    public function register(): string
    {
        return view('pages/register');
    }

    public function signIn(): ResponseInterface
    {
        try {
            // Create an instance of the model from the POST data
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

    public function signUp(): ResponseInterface
    {
        $retorno = [
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

            if (!$userModel->createUser()) {
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
        $email = \Config\Services::email();

        // Configuración del correo
        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = env('SMTP_HOST');
        $config['SMTPPort'] = env('SMTP_PORT');  // Puedes usar 465 para SSL
        $config['SMTPUser'] = env('SMTP_USER');  // Tu dirección de correo completa
        $config['SMTPPass'] = env('SMTP_PASS');  // Tu contraseña de aplicación generada
        $config['SMTPCrypto'] = env('SMTP_CRYPTO');  // Usa 'ssl' si usas el puerto 465
        $config['charset'] = 'UTF-8';  // Usa 'UTF-8' para caracteres especiales
        $config['mailType'] = 'html';  // Puedes cambiar esto a 'text' si prefieres correos de texto plano
        $config['wordWrap'] = true;

        // Inicializa la configuración del correo
        $email->initialize($config);
        $name = "";
        $new_pass = "";
        $data['usuario'] = [
            'name' => $name,
            'new_pass' => $new_pass,
        ];
        // Configuración de los detalles del correo
        $email->setFrom('your_email@gmail.com', 'VirtualWallet');
        $email->setTo('michellejauge@gmail.com');
        $email->setSubject('Email Test');
        $email->setMessage(view('recuperacionEmail/recuperacionEmail', $data));


        // Enviar el correo y manejar errores
        if ($email->send()) {

            $retorno['title'] = 'Email enviado con exito!';
            $retorno['msj'] = 'Verifique su casilla de mensajes.';
            return $this->respondUpdated($retorno);
        }
        // Obtener el depurador de errores
        $error = $email->printDebugger(['headers']);
        return $this->response->setJSON([
            'msj' => 'Error al enviar el correo',
            'error' => $error
        ]);

    }
}

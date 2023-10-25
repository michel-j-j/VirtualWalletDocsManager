<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index(): String
    {

        return view('pages/login');
    }

    public function registrar(): String
    {
        return view('pages/registrar');
    }
    public function logear(): ResponseInterface
    {
        $userModel = new UserModel();

        $email = $_POST['email'];
        $contra = $_POST['contra'];

        $user = $userModel->where('email', $email)->first();

        $retorno = [
            'estado' => 'error',
            'msj'    => 'Email y/o contraseña erroneo.',
            'url'    =>  base_url('/')
        ];

        if ($user != null) {
            if ($user->contraseña == $contra) {

                $data = ([
                    'id' => $user->id_usuario,
                ]);
                $session = session();
                $session->set($data);

                $msj = "El usuario se logeo con exito!";
                $estado = "ok";

                $retorno['estado'] = $estado;
                $retorno['msj'] = $msj;
            }
        }

        return   $this->response->setJSON($retorno);
    }
}

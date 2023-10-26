<?php

namespace App\Controllers;

use App\Models\EntidadesModel;
use CodeIgniter\HTTP\ResponseInterface;

class EntidadController extends BaseController
{

    public function formularioEntidad(): string
    {
        $entidad = new EntidadesModel();

        if ($_POST) {
            $data = ([

                "nombre" => $_POST['nombre'],
                "direccion" => $_POST['direccion'],
                "localidad" => $_POST['localidad'],
                "email" => $_POST['email'],
                "telefono" => $_POST['telefono'],
                "id_usuario" => $_POST['id_usuario'],
            ]);

            $entidad->insert($data);
        }
        return view('entities/form_entities');
    }

    public function modificarEntidad($id = null)
    {

        $entidad = new EntidadesModel();
        $data['entidad'] = $entidad->find($id);


        if ($_POST) {
            $datos = ([
                "nombre" => $_POST['nombre'],
                "localidad" => $_POST['localidad'],
                "direccion" => $_POST['direccion'],
                "email" => $_POST['email'],
                "telefono" => $_POST['telefono'],
                "id_usuario" => $_POST['id_usuario'],
            ]);

            $entidad->update($_POST['id'], $datos);
            // Agrega un mensaje de éxito en una variable de sesión
            session()->setFlashdata('success', 'Entidad modificada exitosamente');
            sleep(2);

            return redirect()->to('/listaEntidades');
        }
        return view('entities/form_modificar_entidad', $data);
    }

    public function eliminarEntidad(): ResponseInterface
    {



        $entidad = new EntidadesModel();
        if ($entidad->delete($_POST['eliminar'])) {
            // session()->setFlashdata('eliminado', 'Entidad eliminada exitosamente');
            // echo var_dump(session('success'));
            // die;
            //sleep(2);
            $respuesta = [
                'exito' => 'ok',
                'msj' => 'Eliminado Exitoso',
                'url' => base_url('/listaEntidades'),
            ];
            return  $this->response->setJSON($respuesta);
        }
        $respuesta = [
            'exito' => 'noOk',
            'msj' => 'Error al eliminar',
            'url' => base_url('/listaEntidades'),
        ];

        return $this->response->setJSON($respuesta);
    }

    public function entidadesList()
    {
        $entidad = new EntidadesModel();
        $data['entidades'] = $entidad->findAll();
        return view('entities/entitiesList', $data);
    }
}

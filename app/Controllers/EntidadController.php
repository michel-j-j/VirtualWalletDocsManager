<?php

namespace App\Controllers;

use App\Models\EntidadesModel;

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
        //echo var_dump($_POST);
        //die;

        if ($_POST) {
            $datos = ([
                "nombre" => $_POST['nombre'],
                "localidad" => $_POST['localidad'],
                "direccion" => $_POST['direccion'],
                "email" => $_POST['email'],
                "telefono" => $_POST['telefono'],
                "id_usuario" => $_POST['id_usuario'],
            ]);
            // echo var_dump($datos);
            // die;
            $entidad->update($_POST['id'], $datos);
            return redirect()->to('/listaEntidades');
        }
        return view('entities/form_modificar_entidad', $data);
    }

    public function eliminarEntidad($id = null)
    {
        $entidad = new EntidadesModel();
        if ($eliminar = $entidad->delete($id)) {
            echo "EXITO AL ELIMINAR EL USUARIO" . $id;
            return redirect()->to('/listaEntidades');
            // echo var_dump($eliminar);
            // die;
        }
        return redirect()->to('/listaEntidades');
    }

    public function entidadesList()
    {
        $entidad = new EntidadesModel();
        $data['entidades'] = $entidad->findAll();
        return view('entities/entitiesList', $data);
    }
}

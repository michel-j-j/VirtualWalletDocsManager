<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\DenunciaModel;
use App\Models\DocumentoModel;
use App\Models\EstadoDocumentacionModel;

class DenunciaController extends BaseController
{

    public function modificarEstadoDocumentoDenuncia()
    {
        $usuario = new UserModel();
        if ($_POST) {

            //Compruebo si el dni ya existe
            $dniACargar = $_POST['dni'];
            $dniDesdeBaseDeDatos = $usuario->select('dni')->getWhere(['dni' => $dniACargar])->getRow();

            if (!($dniDesdeBaseDeDatos == $dniACargar)) {
                $nombre_rol = $_POST["rol"];
                // Obtener el ID del rol a partir del nombre
                $rolModel = new RoleModel();
                $rol = $rolModel->select('id')->getWhere(['rol' => $nombre_rol])->getRow();
                $rol_id = $rol->id;

                $data = ([
                    "nombre" => $_POST['nombre'],
                    "apellido" => $_POST['apellido'],
                    "email" => $_POST['email'],
                    "contrasena" => $_POST['contrasena'],
                    "dni" => $_POST['dni'],
                    "fecha_nacimiento" => $_POST['fecha_nacimiento'],
                    "localidad" => $_POST['localidad'],
                    "direccion" => $_POST['direccion'],
                    "nacionalidad" => $_POST['nacionalidad'],
                    "rol" => $rol_id,
                ]);
                $usuario->insert($data);
            }

        }
        return view('forms/form_user');
    }

    public function seleccionarUsuarioDenuncia()
    {
        $usuarios = new UserModel();
        $data['usuarios'] = $usuarios->findAll();
        return view('seccionDenuncias/seleccionarUsuarioDenuncias', $data);
    }

    //A partir de un email/nombre de usuario, devuelve el historial de denuncias de un usuario.
    //Desde la vista, solo se podra modificar la documentacion de denuncias activas.
    public function administrarDenunciasActivas()
    {
        if ($_POST) {
            //Inicializo los modelos
            $usuarioModel = new UserModel();
            $documentoModel = new DocumentoModel();
            $estadoDocumentacionModel = new EstadoDocumentacionModel();
            //Recupero ID de usuario
            $idUsuario = $usuarioModel->select('id')->getWhere(['email' => $_POST['email']])->getRow();
            $id = $idUsuario->id;
            //Filtro las denuncias que tenga ese usuario
            $denunciaModel = new DenunciaModel();

            $indice = 0;

            $denunciasDelUsuario = $denunciaModel->query("SELECT * FROM denuncia WHERE id_usuario = $id;");

            foreach ($denunciasDelUsuario->getResultArray() as $row) {

                // Si es "En curso" o "Iniciada" guardamos la denuncia
                // 1 loop por denuncia
                if (($row['id_estado_denuncia'] = 1) || ($row['id_estado_denuncia'] = 2)) {

                    //Convertimos el estado numerico del "id_estado_denuncia" en su nombre real para mostrar en la view
                    if ($row['id_estado_denuncia'] = 1) {
                        $estado = "Iniciada";
                    } else {
                        $estado = "En curso";
                    }

                    $idDenuncia = $row['id'];

                    //Documentacion asociada a la denuncia del loop

                    $documentosAsociados = $documentoModel->query("SELECT d.*, ed.descripcion estado FROM documentacion d JOIN denuncia_documentacion dd 
                    ON d.id = dd.id_documentacion JOIN denuncia den ON dd.id_denuncia = den.id 
                    JOIN estado_documentacion ed on ed.id_estado_documentacion = d.id_estado_documentacion 
                    WHERE den.id = $idDenuncia;");

                    $indiceDocumentacion = 0;
                    foreach ($documentosAsociados->getResultArray() as $rowDocumento) {
                        $documentacion[$indiceDocumentacion] = [
                            'id' => $rowDocumento['id'],
                            'numero' => $rowDocumento['numero'],
                            'fecha_vencimiento' => $rowDocumento['fecha_vencimiento'],
                            'id_usuario' => $rowDocumento['id_usuario'],
                            'id_entidad' => $rowDocumento['id_entidad'],
                            'id_tipo_documentacion' => $rowDocumento['id_tipo_documentacion'],
                            'nombre' => $rowDocumento['nombre'],
                            'id_estado_documentacion' => $rowDocumento['id_estado_documentacion'],
                            'estado' => $rowDocumento['estado']

                        ];
                        $indiceDocumentacion++;
                    }


                    // --Fin loop documentacion--

                    //Almacenamos la denuncia activa, ya sea "En curso" o "Iniciada"
                    $denunciasActivas[$indice] =
                        [
                            'id' => $row['id'],
                            'id_usuario' => $row['id_usuario'],
                            'estado' => $estado,
                            'documentacion' => $documentacion
                        ];
                    $indice++;
                }

            }
            return view('seccionDenuncias/administrarDenuncias', ['denunciasActivas' => $denunciasActivas]);
        }
    }
}
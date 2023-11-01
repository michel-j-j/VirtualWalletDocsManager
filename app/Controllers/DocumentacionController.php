<?php

namespace App\Controllers;

use App\Models\DocumentoModel;

class DocumentacionController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function insertarDocumentacion()
    {
        $model = new DocumentoModel();
        $request = \Config\Services::request();


        $data = [
            "nombre" => $request->getPost('nombre'),
            "numero" => $request->getPost('numero'),
            "fecha_emision" => $request->getPost('fecha_emision'),
            "fecha_vencimiento" => $request->getPost('fecha_vencimiento'),
            "estado_documentacion" => 'Activo'
        ];
        try {
            // Insertar datos en la base de datos
            $model->insert($data);
            echo json_encode(["msg" => "creado"]);
            //tipo
            //usuario dueño
            //entidad emisora
        } catch (\Exception $e) {
            // Manejar el error, por ejemplo, loguearlo y mostrar un mensaje al usuario
            log_message('error', $e->getMessage());
            echo json_encode(["msg" => "Error al crear el registro"]);
        }
        
        return redirect()->to('/forms/formDocumentacion');
    }

    public function formularioDocumentacion() {
        return view('forms/formDocumentacion');
    }

    
}

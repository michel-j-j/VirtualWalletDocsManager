<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType     = 'App\Models\UserModel';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombre', 'apellido', 'email', 'contraseña', 'dni',
        'fecha_nacimiento', 'localidad', 'direccion', 'nacionalidad', 'id_rol'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

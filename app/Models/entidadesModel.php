<?php

namespace App\Models;

use CodeIgniter\Model;

class EntidadesModel extends Model
{
    protected $table = 'entidad';
    protected $primaryKey = 'id_entidad';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'localidad', 'direccion', 'telefono', 'email', 'id_encargado'];
}
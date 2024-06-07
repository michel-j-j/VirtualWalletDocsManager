<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'apellido', 'email', 'contraseña', 'dni', 'fecha_nacimiento', 'localidad', 'direccion', 'nacionalidad', 'id_usuario', 'id_rol', 'sobre_mi', 'telefono'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    /*User data information*/
    protected $nombre;
    protected $direccion;
    protected $localidad;
    protected $nacionalidad;
    protected $sobre;
    protected $apellido;
    protected $email;
    protected $telefono;
    protected $dni;
    protected $contra;
    protected $fecha;
    public static $roleUser = 2;

    private $dbUser;

    public function __construct(
        $nombre = null,
        $direccion = null,
        $localidad = null,
        $nacionalidad = null,
        $sobre = null,
        $apellido = null,
        $email = null,
        $telefono = null,
        $dni = null,
        $contra = null,
        $fecha = null
    ) {
        parent::__construct();
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->nacionalidad = $nacionalidad;
        $this->sobre = $sobre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->contra = $contra;
        $this->fecha = $fecha;
    }
    public function userInfoData()
    {
        $datos = [
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'direccion' => $this->direccion,
            'localidad' => $this->localidad,
            'nacionalidad' => $this->nacionalidad,
            'sobre_mi' => $this->sobre,
            'email' => $this->email,
            'dni' => $this->dni,
            'fecha_nacimiento' => $this->fecha,
            'telefono' => $this->telefono,
            'contraseña' => $this->contra,
            'id_rol' => $this->roleUser
        ];
        return $datos;
    }
    public static function createFromPostData(array $data): UserModel
    {
        return new self(
            $data['nombre'] ?? null,
            $data['direccion'] ?? null,
            $data['localidad'] ?? null,
            $data['nacionalidad'] ?? null,
            $data['sobre'] ?? null,
            $data['apellido'] ?? null,
            $data['email'] ?? null,
            $data['telefono'] ?? null,
            $data['dni'] ?? null,
            $data['contra'] ?? null,
            $data['fecha'] ?? null
        );
    }
    public function existeDni($dni)
    {
        //retorna verdadero si el dni existe
        return $this->where('dni', $dni)->countAllResults() > 0;
    }
    public function userPassCorrect()
    {
        if ($this->dbUser['contraseña'] != $this->contra) {
            return false;
        }
        return true;
    }
    public function userExist()
    {
        $dbUser = $this->where('email', $this->email)->first();
        if ($dbUser == null) {
            return false;
        }
        $this->dbUser = $dbUser;
        return true;
    }
    public function createUser()
    {
        if ($this->insert($this->userInfoData()))
            return true;
        return false;
    }
    public function urlDir()
    {
        return ($this->dbUser['id_rol'] == 1) ? 'dashboard/admin' : 'dashboard/user';
    }
    public function dataSession()
    {
        $tipoRol = ($this->dbUser['id_rol'] == 1) ? 'Administrador' : 'Ciudadano';

        $data = [
            'id' => $this->dbUser['id'],
            'nombre' => $this->dbUser['nombre'],
            'apellido' => $this->dbUser['apellido'],
            'tipo_rol' => $tipoRol,
            'rol' => $this->dbUser['id_rol'],
            'index' => $this->urlDir()
        ];
        session()->set($data);
    }
    public function recuperarIdPorEmail($email)
    {
        $idUsuario = $this->select('id')->getWhere(['email' => $email])->getRow();
        return $idUsuario->id;
    }
}
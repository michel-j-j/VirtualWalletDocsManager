<?php
namespace App\Exceptions;

use CodeIgniter\Exceptions\FrameworkException;

class InvalidCredentialsException extends FrameworkException
{
    protected $code = 401;
    protected $message = 'Invalid credentials provided.';
}
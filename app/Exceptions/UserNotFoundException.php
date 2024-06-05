<?php
namespace App\Exceptions;
use CodeIgniter\Exceptions\FrameworkException;


class UserNotFoundException extends FrameworkException
{
    protected $code = 404;
    protected $message = 'User not found.';
}
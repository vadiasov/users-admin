<?php
/**
 * Created by PhpStorm.
 * User:    vadiasov.volodymyr@gmail.com
 * Project: pack.com
 * Date:    16.02.18
 * Time:    8:57
 */

namespace Vadiasov\UsersAdmin;

use Illuminate\Support\Facades\Facade;

class UsersAdminFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'users-admin';
    }
    
}
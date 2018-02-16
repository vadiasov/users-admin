<?php
/**
 * Created by PhpStorm.
 * User:    vadiasov.volodymyr@gmail.com
 * Project: pack.com
 * Date:    16.02.18
 * Time:    8:52
 */

namespace Vadiasov\UsersAdmin;


use App\UserRole;
use Illuminate\Support\Facades\DB;

class UsersAdmin
{
    public function hasRole($userId, $roleId)
    {
//        $row = UserRole::whereUserId(intval($userId))->first();
        $row = DB::table('user_roles')->where('user_id', $userId)->first();
    
        if ($row !== null && $row->role_id == $roleId) {
            return true;
        }
    
        return false;
    }
    
    public function setRole($userId, $roleId)
    {
        return 'rewrite';
    }
}
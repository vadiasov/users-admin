<?php
/**
 * Created by PhpStorm.
 * User:    vadiasov.volodymyr@gmail.com
 * Project: pack.com
 * Date:    06.02.18
 * Time:    14:59
 */

namespace Vadiasov\UsersAdmin\Test2;

use PHPUnit\Framework\TestCase;
use Vadiasov\UsersAdmin\UsersAdmin;

class UsersAdminFunctionTest extends TestCase
{
    /**
     * Check that the multiply method returns correct result
     * @return void
     */
    public function testHasRoleReturnsCorrectValue()
    {
        $this->assertSame(UsersAdmin::hasRole(1, 1), false);
    }
}
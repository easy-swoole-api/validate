<?php
/**
 * Created by PhpStorm.
 * User: hlh XueSi <1592328848@qq.com>
 * Date: 2023/5/7
 * Time: 8:01 下午
 */
declare(strict_types=1);

namespace EasyApi\Validate;

use EasyApi\Validate\Tests\Validate\UserValidate;
use PHPUnit\Framework\TestCase;

class ValidateTest extends TestCase
{
    public function testSingleValidate()
    {
        $validate = new Validate([
            'name'  => 'require|max:25',
            'email' => 'email'
        ]);
        $data = [
            'name'  => 'easyapi',
            'email' => 'easyapi@qq.com'
        ];
        $validateResult = $validate->check($data);
        $this->assertSame(true, $validateResult, 'validate error');
        $this->assertSame([], $validate->getError(), 'validate error');

        $validate = new Validate([
            'name'  => 'require|max:25',
            'email' => 'email'
        ]);
        $data = [
            'name'  => 'easyapieasyapieasyapieasyapi',
            'email' => 'easyapi'
        ];
        $validateResult = $validate->check($data);
        $this->assertSame(false, $validateResult, 'validate error');
        $this->assertSame('max size of name must be 25', $validate->getError(), 'validate error');
    }

    public function testValidateByClass()
    {
        $data = [
            'name'  => 'easyapi',
            'email' => 'easyapi@qq.com'
        ];
        $validate = new UserValidate();
        $validateResult = $validate->check($data);
        $this->assertSame(true, $validateResult, 'validate error');
        $this->assertSame([], $validate->getError(), 'validate error');

        $data = [
            'name'  => 'easyapieasyapieasyapieasyapi',
            'email' => 'easyapi'
        ];
        $validate = new UserValidate();
        $validateResult = $validate->check($data);
        $this->assertSame(false, $validateResult, 'validate error');
        $this->assertSame('max size of name must be 25', $validate->getError(), 'validate error');
    }

    public function testValidate()
    {
        $validate = new Validate([
            'name' => 'isset'
        ]);
        $ret = $validate->check([]);
        $this->assertSame(false, $ret, 'validate error');
        $this->assertSame('name not set', $validate->getError(), 'validate error');

        $validate = new Validate([
            'name' => 'isset'
        ]);
        $ret = $validate->check(['name' => 'XueSi']);
        $this->assertSame(true, $ret, 'validate error');
        $this->assertSame([], $validate->getError(), 'validate error');
    }
}

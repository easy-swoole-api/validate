<?php
/**
 * Created by PhpStorm.
 * User: hlh XueSi <1592328848@qq.com>
 * Date: 2023/5/7
 * Time: 9:32 下午
 */
declare(strict_types=1);

namespace EasyApi\Validate;

use PHPUnit\Framework\TestCase;

class ValudateFuncTest extends TestCase
{
    public function testRequire()
    {
        $rule = 'require';

        $validate = new Validate();
        $value = 'one str';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 0;
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = null;
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testNumber()
    {
        $rule = 'number';

        $validate = new Validate();
        $value = '123';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'aaa';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testInteger()
    {
        $rule = FILTER_VALIDATE_INT;

        $validate = new Validate();
        $value = 123;
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '123';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'aaa';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testFloat()
    {
        $rule = FILTER_VALIDATE_FLOAT;

        $validate = new Validate();
        $value = 1.23;
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '1.23';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 123;
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'aaa';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testBool()
    {
        $allowValues = [true, false, 0, 1, '0', '1'];

        $value = true;
        $validateResult = in_array($value, $allowValues, true);
        $this->assertSame(true, $validateResult, 'validate error');

        $value = 'easyapi';
        $validateResult = in_array($value, $allowValues, true);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testEmail()
    {
        $rule = FILTER_VALIDATE_EMAIL;

        $validate = new Validate();
        $value = 'easyapi@qq.com';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'easyapi';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testArray()
    {
        $rule = 'array';

        $validate = new Validate();
        $value = [];
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 0;
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'one str';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testAccepted()
    {
        $rule = 'accepted';

        $validate = new Validate();
        $value = '1';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 1;
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'yes';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'on';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'invalid string';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testDate()
    {
        $rule = 'date';

        $validate = new Validate();
        $value = date('Ymd');
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = date('YmdHi');
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = date('YmdHis');
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = date('Y-m-d H:i');
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = date('Y-m-d H:i:s');
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = date('YmdH');
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = date('Y-m-d H');
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'not date str';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testAlpha()
    {
        $rule = 'alpha';

        $validate = new Validate();
        $value = 'abc';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '123';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 123;
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testAlphaNum()
    {
        $rule = 'alphaNum';

        $validate = new Validate();
        $value = 'abc';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '123';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '___';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 123;
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testAlphaDash()
    {
        $rule = 'alphaDash';

        $validate = new Validate();
        $value = 'abc';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 123;
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '123';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '_';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '-';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '???';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testChs()
    {
        $rule = 'chs';

        $validate = new Validate();
        $value = '简单';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'easyapi';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testChsAlpha()
    {
        $rule = 'chsAlpha';

        $validate = new Validate();
        $value = '简单';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'easyapi';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '123';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 123;
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testChsAlphaNum()
    {
        $rule = 'chsAlphaNum';

        $validate = new Validate();
        $value = '简单';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'easyapi';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 123;
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '123';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '-_';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testChsDash()
    {
        $rule = 'chsDash';

        $validate = new Validate();
        $value = '简单';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'easyapi';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 123;
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '123';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '-_';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '???';
        $validateResult = $validate->regex($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testActiveUrl()
    {
        $rule = 'activeUrl';

        $validate = new Validate();
        $value = 'www.easyswoole.com';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = '127.0.0.1';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'invalid host';
        $validateResult = $validate->is($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testUrl()
    {
        $rule = FILTER_VALIDATE_URL;

        $validate = new Validate();
        $value = 'http://www.easyswoole.com';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'abc';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testIp()
    {
        $rule = [FILTER_VALIDATE_IP, FILTER_FLAG_IPV4];

        $validate = new Validate();
        $value = '127.0.0.1';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'abc';
        $validateResult = $validate->filter($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testDateFormat()
    {
        $rule = 'y-m-d';

        $validate = new Validate();
        $value = date('y-m-d');
        $validateResult = $validate->dateFormat($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = date('Y-m-d');
        $validateResult = $validate->dateFormat($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }

    public function testIn()
    {
        $validate = new Validate();
        $value = 'easyapi';
        $rule = ['easyapi'];
        $validateResult = $validate->in($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'easyapi';
        $rule = 'easyapi,';
        $validateResult = $validate->in($value, $rule);
        $this->assertSame(true, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'easyapi';
        $rule = ['easyapi1'];
        $validateResult = $validate->in($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');

        $validate = new Validate();
        $value = 'easyapi';
        $rule = 'easyapi1,';
        $validateResult = $validate->in($value, $rule);
        $this->assertSame(false, $validateResult, 'validate error');
    }
}

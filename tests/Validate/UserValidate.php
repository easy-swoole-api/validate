<?php
/**
 * Created by PhpStorm.
 * User: hlh XueSi <1592328848@qq.com>
 * Date: 2023/5/7
 * Time: 8:16 下午
 */
declare(strict_types=1);

namespace EasyApi\Validate\Tests\Validate;

use EasyApi\Validate\Validate;

class UserValidate extends Validate
{
    protected $rule = [
        'name'  => 'require|max:25',
        'email' => 'email',
    ];
}

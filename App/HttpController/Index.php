<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 10:29
 */
namespace App\HttpController;
use EasySwoole\EasySwoole\Trigger;
use EasySwoole\Http\AbstractInterface\Controller;
class Index extends Controller
{
    function index()
    {
        $this->response()->withHeader('Content-type', 'text/html;charset=utf-8');
        $this->response()->write('<h1>大傻逼</h1>');
        // TODO: Implement index() method.
    }
    function user()
    {
        //记录输出错误
        Trigger::getInstance()->error('test error');
        $this->response()->write('user');
    }
}


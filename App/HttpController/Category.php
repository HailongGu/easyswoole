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
class Category extends Controller
{
    function index()
    {
        return $this->writeJson(1,'','操作成功');
//        $this->response()->withHeader('Content-type', 'text/html;charset=utf-8');
//        $this->response()->write('<h1>乃至你是大傻逼</h1>');
        // TODO: Implement index() method.
    }

}


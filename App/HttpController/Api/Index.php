<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 10:29
 */
namespace App\HttpController\Api;
use EasySwoole\Http\AbstractInterface\Controller;
class Index extends Controller
{
    function index()
    {

        return $this->writeJson(1,'','api模块操作成功');

        $this->response()->withHeader('Content-type', 'text/html;charset=utf-8');
        $this->response()->write('<h1>大傻逼</h1>');
        // TODO: Implement index() method.
    }

    /**
     *   输出 action名称  return fasle 不执行;
     */
    protected function onRequest(?string $action): ?bool
    {
        var_dump($action);
        return true;
    }


}


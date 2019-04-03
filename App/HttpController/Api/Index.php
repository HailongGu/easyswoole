<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 10:29
 */
namespace App\HttpController\Api;
use EasySwoole\EasySwoole\Config;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Mysqli\Mysqli;

class Index extends Controller
{
    function index()
    {

        $config = Config::getInstance()->getConf('MYSQL');
        $conf = new \EasySwoole\Mysqli\Config($config);
        $db = new Mysqli($conf);
        $data = $db->get('wufu_member');//获取一个表的数据

        return $this->writeJson(1,$data,'api模块操作成功');

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


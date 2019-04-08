<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 10:29
 */
namespace App\HttpController\Api;
use EasySwoole\Component\Di;
use EasySwoole\EasySwoole\Config;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Mysqli\Mysqli;

class Index extends Controller
{
    function index()
    {

        $db = Di::getInstance()->get('MYSQL');
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


    public function getRedis(){
//        $this->response()->write('1111');
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379','5');
        $redis->auth('vagrant');
        $redis->setex("guhl",60,date('Y-m-d H:i:s'));
        return $this->writeJson(1,$redis->get("guhl"),'api模块操作成功');

    }


}


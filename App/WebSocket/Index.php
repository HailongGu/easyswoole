<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 17:42
 */
namespace App\WebSocket;

use App\lib\Redis;
use EasySwoole\EasySwoole\ServerManager;
use EasySwoole\EasySwoole\Swoole\Task\TaskManager;
use EasySwoole\Socket\AbstractInterface\Controller;

/**
 * Class Index
 *
 * 此类是默认的 websocket 消息解析后访问的 控制器
 *
 * @package App\WebSocket
 */
class Index extends Controller
{

    function hello()
    {
        $this->response()->setMessage('call hello with arg:'. json_encode($this->caller()->getArgs()));
    }

    public function who(){
        $this->response()->setMessage('your fd is '. $this->caller()->getClient()->getFd());
    }

    function delay()
    {
        $this->response()->setMessage('this is delay action');
        $client = $this->caller()->getClient();

        // 异步推送, 这里直接 use fd也是可以的
        $arr = Redis::getInstance()->get("ws_key");
        $arr = json_decode($arr,true) ?? [];

        foreach ($arr as $fd){
            TaskManager::async(function () use ($client,$fd){
                $server = ServerManager::getInstance()->getSwooleServer();
                $server->push($fd,$client->getFd().':push in http at '. date('H:i:s'));
            });
        }

    }
}
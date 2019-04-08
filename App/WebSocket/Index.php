<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 17:42
 */
namespace App\WebSocket;

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
    static  $active = [];

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
        var_dump(self::$active);
        foreach (self::$active as $fd){
            TaskManager::async(function () use ($client,$fd){
                $server = ServerManager::getInstance()->getSwooleServer();
                $i = 0;
                while ($i < 5) {
                    sleep(1);
                    $server->push($fd,$fd.':push in http at '. date('H:i:s'));
                    $i++;
                }
            });
        }

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/8
 * Time: 13:28
 */

namespace App\lib;


use EasySwoole\Component\Singleton;

class  Redis
{
    use Singleton;
    private $redis = "";

    private function __construct()
    {
        if (!extension_loaded('redis')) {
            throw new \Exception("redis.so文件不存在");
        }
        try {
            $this->redis = new \Redis();
            $res = $this->redis->connect('127.0.0.1', 6379, 3);
            $res = $res && $this->redis->auth('vagrant');
        } catch (\Exception $e) {
            throw new \Exception("redis 服务器异常");
        }
        if (!$res) {
            throw new \Exception("redis 连接失败");
        }
    }


    public function get($key)
    {
        if (empty($key)) {
            return '';
        }
        return $this->redis->get(trim($key));
    }

    public function set($key, $value, $ttl = 0)
    {
        if (empty($key)) {
            return false;
        }
        if ($ttl) {
            $bool = $this->redis->setex($key, $ttl, $value);
        }else{
            $bool = $this->redis->set($key, $value);
        }
        return $bool;
    }

}
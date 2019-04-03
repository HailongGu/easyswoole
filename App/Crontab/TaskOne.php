<?php
namespace App\Crontab;


use EasySwoole\EasySwoole\Crontab\AbstractCronTask;
use EasySwoole\EasySwoole\Trigger;

class TaskOne extends AbstractCronTask
{

    public static function getRule(): string
    {
        // TODO: Implement getRule() method.
        // 定时周期 （每小时）
//        return '@hourly';
        #每分鐘
        return '*/1 * * * *';
    }

    public static function getTaskName(): string
    {
        // TODO: Implement getTaskName() method.
        // 定时任务名称
        return 'taskOne';
    }

    static function run(\swoole_server $server, int $taskId, int $fromWorkerId,$flags=null)
    {
        // TODO: Implement run() method.
        // 定时任务处理逻辑
        Trigger::getInstance()->error('test error');

        var_dump('run once per hour');
    }
}
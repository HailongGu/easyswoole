# easyswoole



### app未綁定解決
- composer.json  注册命名空间
```
{
    "autoload": {
        "psr-4": {
            "App\\": "App/"
        }
    },
    "require": {
        "easyswoole/easyswoole": "3.x-dev"
    }
}
```
- 执行 composer dumpautoload



### 安装mysql
- composer安装
``` 
#换源
sudo composer config -g repo.packagist composer https://packagist.phpcomposer.com
sudo composer require easyswoole/mysqli
```




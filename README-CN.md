## Laravel 5 第三方短信平台组件 [English Version](README.md)

### 支持的短信平台

- [亿美](http://www.emay.cn/)

### 安装

将`netjoint\laravel-sms`添加到`composer.json`文件

```
"require": {
  "netjoint/laravel-sms": "dev-master"
}
```

### 注册软件包

####  Laravel 5.1 注册方式

在`config/app.php`文件的`providers`数组添加laravel-sms的ServiceProvider

```
'providers' => array(
    // ...

    NetJoint\LaravelSms\LaravelSmsServiceProvider::class,
)
```

在`config/app.php`文件的`aliases`数组添加别名

```
'aliases' => array(
    // ...

    'Sms' => NetJoint\LaravelSms\Facades\Sms::class,
)
```

#### Laravel 5.0 注册方式

在`config/app.php`文件的`providers`数组添加laravel-sms的ServiceProvider

```
'providers' => array(
    // ...

    'NetJoint\LaravelSms\LaravelSmsServiceProvider',
)
```

在`config/app.php`文件的`aliases`数组添加别名

```
'aliases' => array(
    // ...

    'Sms' => 'NetJoint\LaravelSms\Facades\Sms',
)
```

### 配置

将laravel-sms的配置文件发布到`config/laravel-sms.php`

```
php artisan vendor:publish --provider="NetJoint\LaravelSms\LaravelSmsServiceProvider"
```

在`.env`文件中添加配置项

```
# 默认第三方短信平台名称，字母全部小写
SMS_PROVIDER=yimei
# 亿美序列号
SMS_YIMEI_CDKEY=2SDK-EMY-6688-AAAAA
# 亿美密码
SMS_YIMEI_PASSWORD=123456
```

### 用法

```
use NetJoint\LaravelSms\Facades\Sms;

// $mobile  手机号码
// $message 短信
// 发送成功返回True，失败返回False
Sms::send($mobile, $message);
```

### 贡献您的代码

在`Provider`文件夹和命名空间`NetJoint\LaravelSms\Provider`下实现`ProviderInterface`，然后发送pull request

### 许可

MIT
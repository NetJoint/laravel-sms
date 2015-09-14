## SMS Component for Laravel 5 [简体中文版](README-CN.md)

### Supported SMS Providers

- [Yimei](http://www.emay.cn/)

### Installation

Add laravel-sms to your `composer.json` file

```
"require": {
  "netjoint/laravel-sms": "dev-master"
}
```

### Registering the Package

####  For Laravel 5.1

Register the service provider within the `providers` array found in `config/app.php`

```
'providers' => array(
    // ...

    NetJoint\LaravelSms\LaravelSmsServiceProvider::class,
)
```

Add an alias within the `aliases` array found in `config/app.php`:

```
'aliases' => array(
    // ...

    'Sms' => NetJoint\LaravelSms\Facades\Sms::class,
)
```

#### For Laravel 5.0

Register the service provider within the `providers` array found in `config/app.php`

```
'providers' => array(
    // ...

    'NetJoint\LaravelSms\LaravelSmsServiceProvider',
)
```

Add an alias within the `aliases` array found in `config/app.php`:

```
'aliases' => array(
    // ...

    'Sms' => 'NetJoint\LaravelSms\Facades\Sms',
)
```

### Configuration

Publish the package's config file to `config/laravel-sms.php`

```
php artisan vendor:publish --provider="NetJoint\LaravelSms\LaravelSmsServiceProvider"
```

Add the following to your `.env` file

```
# Default SMS Provider（lowercase）
SMS_PROVIDER=yimei
# Serial key for SMS Provider Yimei
SMS_YIMEI_CDKEY=2SDK-EMY-6688-AAAAA
# Password for SMS Provider Yimei
SMS_YIMEI_PASSWORD=123456
```

### Usage

```
use NetJoint\LaravelSms\Facades\Sms;

// $mobile  mobile number
// $message SMS message
// return True if success and False if fail
Sms::send($mobile, $message);
```

### Make a Contribution

Place your implementation of `ProviderInterface` in `Provider` under the namespace `NetJoint\LaravelSms\Provider` and then send me pull request.

### Licence

MIT
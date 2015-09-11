<?php namespace NetJoint\LaravelSms\Provider;

use NetJoint\LaravelSms\ProviderInterface;
use GuzzleHttp\Client as HttpClient;

class Yimei implements ProviderInterface
{
    /**
     * @var string   the Yimei serial key.
     */
    private $cdkey;

    /**
     * @var string   the Yimei password.
     */
    private $password;

    protected $httpClient;

    /**
     * Constructor.
     *
     * Initialize the config.
     */
    public function __construct(HttpClient $httpClient)
    {
        $config = config('laravel-sms.providers.yimei');
        $this->cdkey = $config['cdkey'];
        $this->password = $config['password'];
        $this->httpClient = $httpClient;
    }

    /**
     * Send an SMS message.
     *
     * @param string $mobile   The mobile phone number to send a message to.
     * @param string $message  The SMS message.
     *
     * @return bool True on success, false on failure.
     */
    public function send($mobile, $message)
    {
        $res = $this->httpClient->request(
            'POST',
            'http://sdk4rptws.eucp.b2m.cn:8080/sdkproxy/sendsms.action',
            [
                'cdkey' => $this->cdkey,
                'password' => $this->password,
                'phone' => $mobile,
                'message' => $message
            ]
        );

        //@TODO 使用XML解析器解析返回数据
        if ('200' == $res->getStatusCode()) {
            return str_contains($res->getBody(), '<error>0</error>');
        }

        return false;
    }
}
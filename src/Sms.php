<?php namespace NetJoint\LaravelSms;

class Sms implements SmsInterface
{
    /**
     * @var ProviderInterface
     */
    protected $provider;

    /**
     * Constructor.
     *
     * @param ProviderInterface $provider
     */
    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
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
        return $this->provider->send($mobile, $message);
    }
}
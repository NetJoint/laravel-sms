<?php namespace NetJoint\LaravelSms;

interface SmsInterface
{
    /**
     * Send an SMS message.
     *
     * @param string $mobile   The mobile phone number to send a message to.
     * @param string $message  The SMS message.
     *
     * @return bool True on success, false on failure.
     */
    public function send($mobile, $message);
}
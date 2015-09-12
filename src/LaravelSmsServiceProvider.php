<?php namespace NetJoint\LaravelSms;

/**
 * Part of the laravel-sms package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * @package    laravel-sms
 * @author     NetJoint Ltd.
 * @license    MIT
 * @copyright  (c) 2015, NetJoint Ltd.
 * @link       http://netjoint.cn
 */

use Illuminate\Support\ServiceProvider;

class LaravelSmsServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function boot()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->prepareResources();
        $this->registerProvider();
        $this->registerSms();
    }

    /**
     * Prepare the package resources.
     *
     * @return void
     */
    protected function prepareResources()
    {
        // Publish config
        $config = realpath(__DIR__.'/config/sms.php');

        $this->mergeConfigFrom($config, 'laravel-sms');

        $this->publishes([
            $config => config_path('laravel-sms.php'),
        ], 'config');
    }

    /**
     * Registers the sms.
     *
     * @return void
     */
    protected function registerProvider()
    {
        $this->app->bind('NetJoint\LaravelSms\ProviderInterface', function ($app) {
            $provider = ucfirst($app['config']->get('laravel-sms.default'));
            $class = "NetJoint\\LaravelSms\\Provider\\$provider";

            return new $class();
        });
    }

    /**
     * Registers the sms.
     *
     * @return void
     */
    protected function registerSms()
    {
        $this->app->singleton('laravel-sms.sms', function ($app) {

            return new Sms($app->make('NetJoint\LaravelSms\ProviderInterface'));
        });
    }

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
    }
}

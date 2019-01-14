<?php

namespace App\Providers;


/**
 * Class DotenvProvider
 * @package App\Providers
 */
class DotenvProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'dotenv';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {

        $appPath = $this->di->getShared('bootstrap')->getApplicationPath();

        $dotenv = \Dotenv\Dotenv::create($appPath);

        $dotenv->load();

        $this->di->setShared($this->serviceName, $dotenv);
    }
}

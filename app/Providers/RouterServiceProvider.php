<?php

namespace App\Providers;


/**
 * \App\Providers\PhpTemplateEngineServiceProvider
 *
 * @package App\Providers
 */
class RouterServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'router';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->set($this->serviceName, "Phalcon\\Mvc\\Router", true);
    }


}

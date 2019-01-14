<?php

namespace App\Providers;

use Phalcon\Http\Request;

/**
 * Class RequestServiceProvider
 * @package App\Providers
 */
class RequestServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'request';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared($this->serviceName, Request::class);
    }
}

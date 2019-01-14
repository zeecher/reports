<?php

namespace App\Providers;

use Elasticsearch\ClientBuilder;

/**
 * Class ElasticsearchServiceProvider
 * @package App\Providers
 */
class ElasticsearchServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'client';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {

        $elastic = $this->di->getShared('config')->elastic;

        $host = [
            'host' => 'localhost',
            'port' => '9200'
        ];

        if($elastic->host) {

            $host['host'] = $elastic->host;
        }

        if($elastic->port) {

            $host['port'] = $elastic->port;
        }

        if($elastic->scheme) {

            $host['scheme'] = $elastic->scheme;
        }

        if($elastic->user) {

            $host['user'] = $elastic->user;
        }

        if($elastic->user) {

            $host['pass'] = $elastic->pass;
        }

        $es = ClientBuilder::create()
            ->setHosts([
                $host
             ])
            ->build();

        $this->di->setShared($this->serviceName, $es);
    }
}

<?php

namespace App;

use Phalcon\Di;
use Phalcon\DiInterface;
use Phalcon\Mvc\Micro as Application;
use App\Providers\ServiceProviderInterface;

/**
 * \App\Bootstrap
 *
 * @package App
 */
class Bootstrap
{
    /**
     * The Dependency Injector.
     * @var DiInterface
     */
    protected $di;

    /**
     * The Application path.
     * @var string
     */
    protected $applicationPath;

    /**
     * The Service Providers.
     * @var ServiceProviderInterface[]
     */
    protected $serviceProviders = [];

    /**
     * The Application.
     * @var Application
     */
    protected $app;

    /**
     * @return Application
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Bootstrap constructor.
     *
     * @param $applicationPath
     */
    public function __construct($applicationPath)
    {
        if (!is_dir($applicationPath)) {
            throw new \InvalidArgumentException('The $applicationPath must be a valid application path');
        }

        $this->di = new Di();
        $this->applicationPath = $applicationPath;

        $this->di->setShared('bootstrap', $this);
        Di::setDefault($this->di);

        $providers = include $applicationPath . '/config/providers.php';
        if (is_array($providers)) {
            $this->initializeServices($providers);
        }

        $this->app = new Application;
        $this->app->setEventsManager($this->di->getShared('eventsManager'));
        $this->app->setDI($this->di);

        $routes = require $applicationPath . '/app/Http/routes.php';

        foreach ($routes as $route) {

            $this->app->mount($route);
        }

        $app = $this->app;

        $this->app->notFound(function () use ($app) {
            $app->response->setStatusCode(404, "Not Found")->sendHeaders();
            echo 'This route is not found';
        });
    }

    /**
     * Gets the Dependency Injector.
     *
     * @return Di
     */
    public function getDi()
    {
        return $this->di;
    }

    /**
     * Gets the Application path.
     *
     * @return string
     */
    public function getApplicationPath()
    {
        return $this->applicationPath;
    }

    /**
     * Runs the Application
     *
     * @return string
     */
    public function run()
    {
        return $this->getOutput();
    }

    /**
     * Get application output.
     *
     * @return string
     */
    protected function getOutput()
    {
        try {

            return $this->app->handle();

        } catch (\Exception $e) {

            echo $e->getMessage();
            exit;
        }

    }

    /**
     * Initialize Services in the Dependency Injector Container.
     *
     * @param string[] $providers
     */
    protected function initializeServices(array $providers)
    {

        foreach ($providers as $name => $class) {
            $this->initializeService(new $class($this->di));
        }

    }

    /**
     * Initialize the Service in the Dependency Injector Container.
     *
     * @param ServiceProviderInterface $serviceProvider
     *
     * @return $this
     */
    protected function initializeService(ServiceProviderInterface $serviceProvider)
    {
        $serviceProvider->register();
        $this->serviceProviders[$serviceProvider->getName()] = $serviceProvider;

        return $this;
    }
}

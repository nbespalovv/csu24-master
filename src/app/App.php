<?php

namespace Nbespalovv\Csu24;

use BaseComponent;
use Psr\Container\ContainerInterface;

class App extends BaseComponent
{
    public ContainerInterface $components;
    public function run(): string
    {
        return 'It`s a life!';
    }

    public function readConfig(): mixed
    {
        return include(dirname(__DIR__) . '/protected/config/web.php');
    }

    public function init(): void
    {
        id(!array_key_exists("components", $this->params))
    }
}
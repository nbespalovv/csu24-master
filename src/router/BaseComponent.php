<?php

abstract class BaseComponent implements IComponent
{
    public function __construct(array $params)
    {
        $this -> init();
    }
}
interface IComponent
{
    public function __construct(array $params);
    public function init():void;
}
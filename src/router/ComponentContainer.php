<?php

use \Psr\Container\ContainerInterface;

class ComponentContainer extends BaseComponent implements ContainerInterface
{
    private array $components = [];
    private array $config;

    public function init(): void {}
    public function get(string $id) {
        if(array_key_exists($id, $this->components)){
            return $this->components[$id];
        }
        if(!isset($this->config[$id])){
            throw new ComponentNotFoundException();
        }
        if(!isset($this->config[$id]['class'])){
            throw new LogicalException();
        }
        $class=$this->$this->config[$id]['class'];
        if(!class_exists($class)){
            throw new LogicalException();
        }
        $params=$this->config[$id];
        unset($params['class']);
        $component = new $class($params);
        $this->component[$id]=$component;
        return $component;
    }
    public function has(string $id):bool{
        if(array_key_exists($id,$this->components))
        {
            return true;
        }
        if(array_key_exists($id,$this->config))
        {
            return true;
        }
        return false;
    }
    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->config=$params;
        $this->components=[];
    }
}
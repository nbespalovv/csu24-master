<?php

class Router extends BaseComponent
{
    public array $rules = [
        "index"=>fn($request)=>new TextResponse("");
    ];

    public function run(): string
    {
//        $path = $_SERVER["path"];
        $request = $this->requestFabric->createRequest();
        foreach ($this->rules as $rule => $handler) {
            if (preg_match($rule, $request->path) != 0) {
                $result = call_user_func($handler, $request);
                break;
            } //куда-то сюда вкрутить миддл вейр
        }
        if (empty($result)) {
            return "NotFoundResponse";
        }
        return $result;
    }
}
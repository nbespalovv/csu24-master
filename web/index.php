<?php

use Nbespalovv\Csu24\App;

require dirname(__DIR__) . '/vendor/autoload.php';


//$app = new App();
//echo $app->run();
//print_r($app->readConfig());
$router = new Router();

$router->addRoute('GET', '/hello', function (ServerRequestInterface $request) use ($router) {
    $response = $router->createResponse(200);
    $response->getBody()->write("Hello World!");
    return $response;
});

$request = $router->createServerRequest('GET', '/hello');
$response = $router->handle($request);

echo $response->getBody();
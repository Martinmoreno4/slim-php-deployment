<?php
// Error Handling
error_reporting(-1);
ini_set('display_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add parse body
$app->addBodyParsingMiddleware();

// Routes
$app->get('[/]', function (Request $request, Response $response) 
{    
    $payload = json_encode(array('method' => 'GET', 'msg' => "Bienvenido a SlimFramework 2023"));
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
}
);

$app->post('[/]', function (Request $request, Response $response) 
{    
    $payload = json_encode(array('method' => 'POST', 'msg' => "Bienvenido a SlimFramework 2023"));
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
}
);

$app->post('/test', function (Request $request, Response $response) 
{    
    $payload = json_encode(array('method' => 'POST', 'msg' => "Bienvenido a SlimFramework 2023"));
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
}
);


  $app->group('/Credenciales', function (RouteCollectorProxy $group) 
  {
    $group->get('[/]', function (Request $request, Response $response)
    {
        $payload = json_encode(array('mensaje' => "SlimFramework 2023"));
    }
    
);
    $group->post('[/]',  );
  }
  )->add(new SalidaMiddleWare())->add(new EntradaMiddleWare());

$app->run();

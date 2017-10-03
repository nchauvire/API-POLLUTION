<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Appel de la route racine ");


    // Render index view
    return $response->withJson("Merci de voir la documentation de l'api méteo",200);
});


$app->get('/pollutions[/{city}]', Src\Controllers\PollutionController::class.":getData");



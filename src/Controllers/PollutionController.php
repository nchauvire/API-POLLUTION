<?php
namespace Src\Controllers;

use GuzzleHttp\Client;
use Slim\Http\Request;
use Slim\Http\Response;
use function var_dump;

class PollutionController {

    public function getData(Request $request, Response $response, array $args){

        if (! $args['city']) {
            $args['city'] = 'nantes';
        }

        $client = new Client();
        $request = $client->request(
            'GET',
            "http://api.waqi.info/feed/{$args['city']}/?token=61d3602af69176305a80cefdc676225612d38d6a"
        );
        $iaqi = json_decode($request->getBody()->getContents(),true)['data']['iaqi'];
        $data = [];
        foreach ($iaqi as $key => $val){
            $data[$key] = $val['v'];
        }



        // Render index view
        return $response->withJson($data);

    }

}

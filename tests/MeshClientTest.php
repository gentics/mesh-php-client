<?php
declare (strict_types = 1);

use GenticsMeshRestApi\MeshClient;
use PHPUnit\Framework\TestCase;
use Rest\MeshRequest;
use Rest\Request;

final class MeshClientTest extends TestCase
{
    /*
    public function testClientConnect()
    {
        $client = new MeshClient();
        //$request = $client->findUserByUuid("123");
        $request = $client->me();
        $response = $client->send($request);
        print_f($response);
    }
    */

    public function testGuzzel() {
        $client = new GuzzleHttp\Client();

        $res = $client->request('GET', 'https://demo.getmesh.io/api/v1/auth/me');
        echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo "------------";
        echo $res->getBody();
        // {"type":"User"...'
        
            /*
        // Send an asynchronous request.
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
        */
    }
}

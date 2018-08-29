<?php
declare (strict_types = 1);

use GenticsMeshRestApi\MeshClient;
use PHPUnit\Framework\TestCase;

final class MeshClientTest extends TestCase
{

    public function testClientConnect()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $client->login("admin", "admin")->wait();

        // Sync variante
        /*
        $request = $client->me();
        $response = $request->send();
        echo $response->getBody();
         */

        $request = $client->findUsers(["perPage" => 1]);
        $response = $request->send();
        echo $response->getBody();

        // Async variante
        /*
    $promise = $request->sendAsync();
    $promise->then(function ($response) {
    echo 'I completed! ' . $response->getBody();
    });
    $promise->wait();
     */
    }

/*

public function testGuzzel() {
$client = new GuzzleHttp\Client();

$res = $client->request('GET', 'https://demo.getmesh.io/api/v1/auth/me', []);
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
    //}

}

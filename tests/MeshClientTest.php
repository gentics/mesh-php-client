<?php
declare (strict_types = 1);

namespace Gentics\Mesh\ClientTest;

use Gentics\Mesh\ClientTest\AbstractMeshTest;
use Gentics\Mesh\Client\MeshClient;
use PHPUnit\Framework\TestCase;

final class MeshClientTest extends AbstractMeshTest
{

    
    public function testClientConnect()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $client->login("admin", "admin")->wait();

        $request = $client->findUsers(["perPage" => 1]);
        $response = $request->send();
        $json = $response->toJson();
        $this->assertEquals(1, $json->_metainfo->perPage);
    }

    public function testSync()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $request = $client->me();
        $response = $request->send();
        $json = $response->toJson();
        $this->assertEquals("anonymous", $json->username);
    }

    public function testAsync()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $request = $client->me();
        $promise = $request->sendAsync();
        $promise->then(function ($resp) {
            $json = $response->toJson();
            $this->assertEquals("anonymous", $json->username);
        });
        $promise->wait();
    }

    public function testAPIKey()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $client->login("admin","admin")->wait();

        $name = "guzzle-" . microtime();
        $request = [
            "username" => $name,
            "password" => "geheim",
        ];
        
        $userResp = $client->createUser($request)->send()->toJson();
        $keyInfo = $client->issueAPIKey($userResp->uuid)->send()->toJson();
        
        $client->setAPIKey($keyInfo->token);
        $json = $client->me()->send()->toJson();
        $this->assertEquals($name, $json->username);
    }

}

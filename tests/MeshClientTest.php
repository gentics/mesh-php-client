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
        $client->setAPIKey("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyVXVpZCI6IjNmMDU2ZDQwZGZkYTQ5YjQ4NTZkNDBkZmRhOTliNGZhIiwianRpIjoieFE3eXA1eURaajlmIiwiaWF0IjoxNTM1NjM2NTI5fQ.VQRII_zZOVk36-OZYYJbD8HllF6XZT0xRTxr3i4b9PY");
        $request = $client->me();
        $response = $request->send();
        $json = $response->toJson();
        $this->assertEquals("test", $json->username);
    }

}

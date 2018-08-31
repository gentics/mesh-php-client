<?php
declare (strict_types = 1);

namespace Gentics\Mesh\ClientTest;

use Gentics\Mesh\ClientTest\AbstractMeshTest;
use Gentics\Mesh\Client\MeshClient;
use PHPUnit\Framework\TestCase;
use \GuzzleHttp\Exception\ClientException;

final class UserTest extends TestCase
{

    public function testCrudUser()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $client->login("admin", "admin")->wait();

        $uuid = "5725992507e748a1a5992507e7f8a115";
        try {
            $userResp = $client->findUserByUuid($uuid)->send();
            $client->deleteUser($uuid)->send();
        } catch (ClientException $e) {
            // Ignored
        }
        $request = [
            "username" => "guzzle",
            "password" => "geheim",
        ];
        try {
            $userResp = $client->createUserWithUuid($uuid, $request)->send()->toJson();
            $this->assertEquals("guzzle", $userResp->username);
            $user = $client->findUserByUuid($uuid)->send()->toJson();
            // Now update the user
            $user->username = "hugo";
            $updated = $client->updateUser($uuid, $user)->send()->toJson();
            $this->assertEquals("hugo", $updated->username);
        } catch (ClientException $e) {
            $response = $e->getResponse();
            echo $response->getBody()->getContents();
        }
    }
}

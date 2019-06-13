<?php
declare (strict_types = 1);

namespace Gentics\Mesh\ClientTest;

use Gentics\Mesh\ClientTest\AbstractMeshTest;
use Gentics\Mesh\Client\MeshClient;
use PHPUnit\Framework\TestCase;
use \GuzzleHttp\Exception\ClientException;

final class UserTest extends TestCase
{

    public function testCrudSchema()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $client->login("admin", "admin")->wait();
     
        $name = "guzzelTest" . time();
        $newName = "UpdatedSchema" . time();
        $request = [
            "name" => $name,
            "description" => "test"
        ];

        // 1. Create
        $schema = $client->createSchema($request)->send()->toJson();
        $this->assertEquals($name, $schema->name);
        $uuid = $schema->uuid;

        // 2. Reload
        $schema = $client->findSchemaByUuid($uuid)->send()->toJson();
        $this->assertEquals($name, $schema->name);

        // 3. Now update the Schema
        $schema->name = $newName;
        $msg = $client->updateSchema($uuid, $schema)->send()->toJson();
        
        sleep(2);

        $schema = $client->findSchemaByUuid($uuid)->send()->toJson();
        $this->assertEquals($newName, $schema->name);

        // 4. Now delete the schema
        $client->deleteSchema($uuid)->send();

        // 5. Check for deletion
        try {
            $schema = $client->findSchemaByUuid($uuid)->send()->toJson();
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $code = $response->getStatusCode();
            $this->assertEquals(404, $code);
        }

    }
}

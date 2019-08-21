<?php
declare (strict_types = 1);

namespace Gentics\Mesh\ClientTest;

use Gentics\Mesh\ClientTest\AbstractMeshTest;
use Gentics\Mesh\Client\MeshClient;
use PHPUnit\Framework\TestCase;
use \GuzzleHttp\Exception\ClientException;

final class SchemaTest extends TestCase
{

    public function testCrudSchema()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $client->login("admin", "admin")->wait();
     
        $name = "guzzelTest" . time();
        $newName = "UpdatedSchema" . time();
        $updatedFieldName = "Updated Test 2 - ". time();
        $newFieldData = new \stdClass();
        $newFieldData->name = "Test 4";
        $newFieldData->label = "Fourth Test field";
        $newFieldData->type = "boolean";
        $newFieldData->required = false;
        $request = [
            "name" => $name,
            "description" => "test",
            "fields" => [
                 [
                     "name"     => "Test 1 - " . time(),
                     "label"    => "First Test field",
                     "type"     => "string",
                     "required" => false,
                 ],
                 [
                     "name"     => "Test 2 - " . time(),
                     "label"    => "Second Test field",
                     "type"     => "string",
                     "required" => false,
                 ]
            ],
        ];

        // 1. Create
        $schema = $client->createSchema($request)->send()->toJson();
        $this->assertEquals($name, $schema->name);
        $uuid = $schema->uuid;

        // 2. Reload
        $schema = $client->findSchemaByUuid($uuid)->send()->toJson();
        $this->assertEquals($name, $schema->name);

        // 3. Now update the Schema Name
        $schema->name = $newName;
        $msg = $client->updateSchema($uuid, $schema)->send()->toJson();
        
        sleep(2);

        $schema = $client->findSchemaByUuid($uuid)->send()->toJson();
        $this->assertEquals($newName, $schema->name);

        // 4. Change one of the fields
        $schema->fields[1]->name = $updatedFieldName;
        $msg = $client->updateSchema($uuid, $schema)->send()->toJson();
        
        sleep(2);
    
        $schema = $client->findSchemaByUuid($uuid)->send()->toJson();
        $this->assertEquals($updatedFieldName, $schema->fields[1]->name);
        
        // 5. Add a new field
        $schema->fields[] = $newFieldData;
        $msg = $client->updateSchema($uuid, $schema)->send()->toJson();
        
        sleep(2);
    
        $schema = $client->findSchemaByUuid($uuid)->send()->toJson();
        $this->assertEquals($newFieldData, end($schema->fields));
        
        
        // 6. Now delete the schema
        $client->deleteSchema($uuid)->send();

        // 7. Check for deletion
        try {
            $schema = $client->findSchemaByUuid($uuid)->send()->toJson();
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $code = $response->getStatusCode();
            $this->assertEquals(404, $code);
        }
    }
}

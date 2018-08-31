<?php
declare (strict_types = 1);

namespace Gentics\Mesh\ClientTest;

use Gentics\Mesh\ClientTest\AbstractMeshTest;
use Gentics\Mesh\Client\MeshClient;
use PHPUnit\Framework\TestCase;

final class GraphQLTest extends AbstractMeshTest
{

    public function testQuery()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $query = [
            "query" => "{users{elements{uuid, username}}}"
        ];
        $request = $client->graphQL("demo", $query);
        $response = $request->send();
        $json = $response->toJson();
        $this->assertEquals("anonymous", $json->data->users->elements[0]->username);
    }

}
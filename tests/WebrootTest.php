<?php
declare (strict_types = 1);

namespace Gentics\Mesh\ClientTest;

use Gentics\Mesh\ClientTest\AbstractMeshTest;
use Gentics\Mesh\Client\MeshClient;
use PHPUnit\Framework\TestCase;

final class WebrootTest extends AbstractMeshTest
{

    public function testWebroot()
    {
        $client = new MeshClient("http://localhost:8080/api/v1");
        $request = $client->webroot("demo", "/automobiles");
        $response = $request->send();
        $this->assertTrue($response->isJson());
        //echo "StatusCode:" . $response->getStatusCode() . "\n";
        //echo "StatusCode:" . $response->getProtocolVersion() . "\n";
        //echo $response->getHeader("set-cookie")[0];
        //$cookieJar = $client->getConfig('cookies');
        //print_r($cookieJar->toArray());
        $json = $response->toJson();
        echo "\n" . $response->getHeader("content-type")[0] . "\n";
        $this->assertEquals("ca6c7df3f45b48d4ac7df3f45ba8d42f", $json->uuid);
        echo("\nJson: " . get_class($response->getBody()) . "\n");
    }

    public function testWebrootBinary() {
        $path = "/images/yacht-pelorus.jpg";
        $client = new MeshClient("http://localhost:8888/api/v1");
        $request = $client->webroot("demo", $path);
        // $request = $request->withAddedHeader('Accept', 'application/json');
        $response = $request->send();
        $this->assertFalse($response->isJson());
        echo("\nBinary: " . get_class($response->getBody()) . "\n");
    }

}

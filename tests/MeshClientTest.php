<?php
declare (strict_types = 1);

use GenticsMeshRestApi\MeshClient;
use PHPUnit\Framework\TestCase;
use Rest\MeshRequest;
use Rest\Request;

final class MeshClientTest extends TestCase
{
    public function testClientConnect()
    {
        $client = new MeshClient();
        $request = $client->findUserByUuid("123");
    
    }
}

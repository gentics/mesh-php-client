# Gentics Mesh PHP Client

> PHP Client implementation for [Gentics Mesh REST API](https://getmesh.io/docs/beta/raml).

## Installation

```sh
composer require gentics/mesh-php-client
```

## Basic usage

```php
use Gentics\Mesh\Client\MeshClient;

require_once __DIR__ . '/vendor/autoload.php';

$client = new MeshClient("http://localhost:8080/api/v1");

// Load user info (sync)
$request = $client->me();
$response = $request->send();
echo $response->getBody();

// Load user info (async)
$promise = $request->sendAsync();
$promise->then(function ($response) {
  echo 'I completed! ' . $response->getBody();
});
$promise->wait();

// Load users and apply paging
$request = $client->findUsers(["perPage" => 1]);
$response = $request->send();
echo $response->getBody(); 
```

## Authentication

```php
$client = new MeshClient("http://localhost:8080/api/v1");

// You can either login and use the build-in cookie handling
// Keep in mind that your cookie will not be automatically refreshed.
// Any authenticated request will refresh the cookie and keep you authenticated.
$client->login("admin", "admin")->wait();

// Or use a dedicated API key which will never expire
// You can use the mesh-cli to generate a key
// Setting the API key will invalidate any previously set login token information
$client->setAPIKey("eyJ0eXAiOiJKV1QiLC … ZYYJbD8HllF6XZT0xRTxr3i4b9PY");
```

## GraphQL Example

```php
$client = new MeshClient("http://localhost:8080/api/v1");
$query = [
    "query" => "{users{elements{uuid, username}}}"
];
$request = $client->graphQL("demo", $query);
$response = $request->send();
$json = $response->toJson();
$this->assertEquals("anonymous", $json->data->users->elements[0]->username);
```

## WebRoot Example

With webroot you can fetch any node which contains a `segment` field in the schema. 
The webroot endpoint is also able to directly return binary data.

```php
$client = new MeshClient("http://localhost:8888/api/v1");
$request = $client->webroot("demo", "/images/yacht-pelorus.jpg");
$response = $request->send();
// You can check whether the webroot response returns json or otherwise binary data (e.g. image data)
$response->isJson();
```


## CRUD Example

```php
$client = new MeshClient("http://localhost:8080/api/v1");
$client->login("admin", "admin")->wait();

// 1. Create User
$request = [
  "username" => "guzzle",
    "password" => "geheim",
];
$uuid = "5725992507e748a1a5992507e7f8a115";
$userResp = $client->createUserWithUuid($uuid, $request)->send()->toJson();

// 2. Read user
$user = $client->findUserByUuid($uuid)->send()->toJson();

// 3. Update user
$user->username = "hugo";
$updated = $client->updateUser($uuid, $user)->send()->toJson();

// 4. Delete user
$client->deleteUser($uuid)->send();
```

## Error Handling

By default exceptions will be thrown if the request fails (e.g. 4xx, 5xx error code).

```php
try {
  $uuid = "5725992507e748a1a5992507e7f8a115";
  $client->deleteUser($uuid)->send();
} catch (ClientException $e) {
    // Error could indicate a 404
    $response = $e->getResponse();
    echo $response->getBody()->getContents();
}
```

## Configuration

It is possible to configure the underlying Guzzle client:

```php
// Change the default error behaviour to not throw error exceptions
$config = ['http_errors' => false];
$client = new MeshClient("http://localhost:8080/api/v1", $config);
```

## Compatibility

* Gentics Mesh 1.8.x
* PHP 8.1+

# TODOs

* Implement full upload support
* Implement eventbus websocket support

## Release

**maintenance-0.10.x branch**
Versioning: 0.10.x - PHP 7.x, Guzzle 6

**master branch**
Versioning: 0.20.x - PHP 8.1+, Guzzle 7

## License

[Apache License Version 2.0](http://www.apache.org/licenses/)


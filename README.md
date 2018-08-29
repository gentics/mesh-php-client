# Gentics Mesh PHP Client

> PHP Client implementation for [Gentics Mesh REST API](https://getmesh.io/docs/beta/raml).

## Installation

```sh
composer require gentics/mesh-php-client
```

## Usage

```php
namespace GenticsMeshRestApi;

require_once __DIR__ . '/vendor/autoload.php';

$client = new MeshClient("http://localhost:8080/api/v1");
$client->login("admin", "admin")->wait();

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

## Compatibility

* Gentics Mesh 0.24.x
* PHP 7.0+

## License

[Apache License Version 2.0](http://www.apache.org/licenses/)
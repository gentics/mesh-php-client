# Gentics Mesh REST API

> Browser and node module for making API requests against [Gentics Mesh REST API](https://getmesh.io/docs/beta/raml).

## Installation

```sh
composer require gentics-mesh-rest-api/raml-php-sdk
```

## Usage

```php
namespace GenticsMeshRestApi;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client();
```


#### Base URI

You can override the base URI by setting the `baseUri` property, or initializing a request builder with a base URI. For example:

```php
$builder =  new RequestBuilder(['baseUri' => 'https://demo.getmesh.io/api/v1']);
```

### Methods

All methods return a HTTP request instance of Guzzle [PSR-7](https://github.com/guzzle/psr7).

#### `rawSearch->nodes->post($body = null, $options = [])`

Invoke a search query for nodes and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->nodes->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `rawSearch->projects->post($body = null, $options = [])`

Invoke a search query for projects and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->projects->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `rawSearch->roles->post($body = null, $options = [])`

Invoke a search query for roles and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->roles->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `rawSearch->schemas->post($body = null, $options = [])`

Invoke a search query for schemas and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->schemas->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `rawSearch->tagFamilies->post($body = null, $options = [])`

Invoke a search query for tagFamilies and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->tagFamilies->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `rawSearch->tags->post($body = null, $options = [])`

Invoke a search query for tags and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->tags->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `rawSearch->users->post($body = null, $options = [])`

Invoke a search query for users and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->users->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `rawSearch->microschemas->post($body = null, $options = [])`

Invoke a search query for microschemas and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->microschemas->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `rawSearch->groups->post($body = null, $options = [])`

Invoke a search query for groups and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->rawSearch->groups->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->microschemas->withMicroschemaUuid('microschemaUuid')->delete($body = null, $options = [])`

* **project** (type: `string`)
* **microschemaUuid** microschemaUuid (type: `string`)

Remove the microschema from the project.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->microschemas->withMicroschemaUuid('microschemaUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->microschemas->withMicroschemaUuid('microschemaUuid')->post($body = null, $options = [])`

* **project** (type: `string`)
* **microschemaUuid** microschemaUuid (type: `string`)

Add the microschema to the project.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->microschemas->withMicroschemaUuid('microschemaUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->microschemas->->get($query = null, $options = [])`

* **project** (type: `string`)

Read all microschemas which are assigned to the project.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->microschemas->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->->post($body = null, $options = [])`

* **project** (type: `string`)

Create a new node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->->get($query = null, $options = [])`

* **project** (type: `string`)

Read all nodes and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->get($query = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Load the node with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->post($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Update the node with the given uuid. It is mandatory to specify the version within the update request. Mesh will automatically check for version conflicts and return a 409 error if a conflict has been detected. Additional conflict checks for WebRoot path conflicts will also be performed. The node is created if no node with the specified uuid could be found.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->delete($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Delete the node with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->binary->withFieldName('fieldName')->post($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **fieldName** fieldName (type: `string`)

Update the binaryfield with the given name.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->binary->withFieldName('fieldName')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->binary->withFieldName('fieldName')->get($query = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **fieldName** fieldName (type: `string`)

Download the binary field with the given name. You can use image query parameters for crop and resize if the binary data represents an image.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->binary->withFieldName('fieldName')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->binaryTransform->withFieldName('fieldName')->post($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **fieldName** fieldName (type: `string`)

Transform the image with the given field name and overwrite the stored image with the transformation result.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->binaryTransform->withFieldName('fieldName')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->children->get($query = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Load all child nodes and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->children->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->languages->withLanguage('language')->delete($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **language** language (type: `string`)

Delete the language specific content of the node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->languages->withLanguage('language')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->languages->withLanguage('language')->published->get($query = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **language** language (type: `string`)

Return the publish status for the given language of the node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->languages->withLanguage('language')->published->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->languages->withLanguage('language')->published->post($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **language** language (type: `string`)

Publish the language of the node. This will automatically assign a new major version to the node and update the draft version to the published version.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->languages->withLanguage('language')->published->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->languages->withLanguage('language')->published->delete($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **language** language (type: `string`)

Take the language of the node offline.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->languages->withLanguage('language')->published->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->moveTo->withToUuid('toUuid')->post($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **toUuid** toUuid (type: `string`)

Move the node into the target node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->moveTo->withToUuid('toUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->navigation->get($query = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Returns a navigation object for the provided node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->navigation->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->published->get($query = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Return the published status of the node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->published->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->published->post($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Publish all language specific contents of the node with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->published->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->published->delete($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Unpublish the given node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->published->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->tags->get($query = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Return a list of all tags which tag the node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->tags->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->tags->post($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)

Update the list of assigned tags

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->tags->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->tags->withTagUuid('tagUuid')->post($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **tagUuid** tagUuid (type: `string`)

Assign the given tag to the node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->tags->withTagUuid('tagUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->nodes->withNodeUuid('nodeUuid')->tags->withTagUuid('tagUuid')->delete($body = null, $options = [])`

* **project** (type: `string`)
* **nodeUuid** nodeUuid (type: `string`)
* **tagUuid** tagUuid (type: `string`)

Remove the given tag from the node.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->nodes->withNodeUuid('nodeUuid')->tags->withTagUuid('tagUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->->get($query = null, $options = [])`

* **project** (type: `string`)

Load multiple tag families and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->->post($body = null, $options = [])`

* **project** (type: `string`)

Create a new tag family.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->get($query = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)

Read the tag family with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->post($body = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)

Update the tag family with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->delete($body = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)

Delete the tag family.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->post($body = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)

Create a new tag within the tag family.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->get($query = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)

Load tags which were assigned to this tag family and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->withTagUuid('tagUuid')->get($query = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)
* **tagUuid** tagUuid (type: `string`)

Read the specified tag from the tag family.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->withTagUuid('tagUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->withTagUuid('tagUuid')->post($body = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)
* **tagUuid** tagUuid (type: `string`)

Update the specified tag

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->withTagUuid('tagUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->withTagUuid('tagUuid')->delete($body = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)
* **tagUuid** tagUuid (type: `string`)

Remove the tag from the tag family.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->withTagUuid('tagUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->withTagUuid('tagUuid')->nodes->get($query = null, $options = [])`

* **project** (type: `string`)
* **tagFamilyUuid** tagFamilyUuid (type: `string`)
* **tagUuid** tagUuid (type: `string`)

Load all nodes that have been tagged with the tag and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->tagFamilies->withTagFamilyUuid('tagFamilyUuid')->tags->withTagUuid('tagUuid')->nodes->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->navroot->withPath('path')->get($query = null, $options = [])`

* **project** (type: `string`)
* **path** path (type: `string`)

Return a navigation for the node which is located using the given path.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->navroot->withPath('path')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->webroot->withPath('path')->get($query = null, $options = [])`

* **project** (type: `string`)
* **path** path (type: `string`)

Load the node or the node's binary data which is located using the provided path.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->webroot->withPath('path')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->->post($body = null, $options = [])`

* **project** (type: `string`)

Create a new release and automatically invoke a node migration.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->->get($query = null, $options = [])`

* **project** (type: `string`)

Load multiple releases and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->withReleaseUuid('releaseUuid')->get($query = null, $options = [])`

* **project** (type: `string`)
* **releaseUuid** releaseUuid (type: `string`)

Load the release with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->withReleaseUuid('releaseUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->withReleaseUuid('releaseUuid')->post($body = null, $options = [])`

* **project** (type: `string`)
* **releaseUuid** releaseUuid (type: `string`)

Update the release with the given uuid. The release is created if no release with the specified uuid could be found.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->withReleaseUuid('releaseUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->withReleaseUuid('releaseUuid')->microschemas->get($query = null, $options = [])`

* **project** (type: `string`)
* **releaseUuid** releaseUuid (type: `string`)

Load microschemas that are assigned to the release and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->withReleaseUuid('releaseUuid')->microschemas->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->withReleaseUuid('releaseUuid')->microschemas->post($body = null, $options = [])`

* **project** (type: `string`)
* **releaseUuid** releaseUuid (type: `string`)

Assign a microschema version to the release.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->withReleaseUuid('releaseUuid')->microschemas->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->withReleaseUuid('releaseUuid')->migrateMicroschemas->post($body = null, $options = [])`

* **project** (type: `string`)
* **releaseUuid** releaseUuid (type: `string`)

Invoked the micronode migration for not yet migrated micronodes of microschemas that are assigned to the release.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->withReleaseUuid('releaseUuid')->migrateMicroschemas->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->withReleaseUuid('releaseUuid')->migrateSchemas->post($body = null, $options = [])`

* **project** (type: `string`)
* **releaseUuid** releaseUuid (type: `string`)

Invoked the node migration for not yet migrated nodes of schemas that are assigned to the release.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->withReleaseUuid('releaseUuid')->migrateSchemas->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->withReleaseUuid('releaseUuid')->schemas->get($query = null, $options = [])`

* **project** (type: `string`)
* **releaseUuid** releaseUuid (type: `string`)

Load schemas that are assigned to the release and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->withReleaseUuid('releaseUuid')->schemas->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->releases->withReleaseUuid('releaseUuid')->schemas->post($body = null, $options = [])`

* **project** (type: `string`)
* **releaseUuid** releaseUuid (type: `string`)

Assign a schema version to the release.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->releases->withReleaseUuid('releaseUuid')->schemas->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->graphql->->post($body = null, $options = [])`

* **project** (type: `string`)

Endpoint which accepts GraphQL queries.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->graphql->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->search->nodes->post($body = null, $options = [])`

* **project** (type: `string`)

Invoke a search query for nodes and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->search->nodes->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->search->tagFamilies->post($body = null, $options = [])`

* **project** (type: `string`)

Invoke a search query for tagFamilies and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->search->tagFamilies->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->search->tags->post($body = null, $options = [])`

* **project** (type: `string`)

Invoke a search query for tags and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->search->tags->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->rawSearch->nodes->post($body = null, $options = [])`

* **project** (type: `string`)

Invoke a search query for nodes and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->rawSearch->nodes->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->rawSearch->tagFamilies->post($body = null, $options = [])`

* **project** (type: `string`)

Invoke a search query for tagFamilies and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->rawSearch->tagFamilies->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->rawSearch->tags->post($body = null, $options = [])`

* **project** (type: `string`)

Invoke a search query for tags and return the unmodified Elasticsearch response. Note that the query will be executed using the multi search API of Elasticsearch.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->rawSearch->tags->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->schemas->->get($query = null, $options = [])`

* **project** (type: `string`)

Read multiple schemas and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->schemas->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->schemas->withSchemaUuid('schemaUuid')->get($query = null, $options = [])`

* **project** (type: `string`)
* **schemaUuid** schemaUuid (type: `string`)

Load the schema with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->schemas->withSchemaUuid('schemaUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->schemas->withSchemaUuid('schemaUuid')->delete($body = null, $options = [])`

* **project** (type: `string`)
* **schemaUuid** schemaUuid (type: `string`)

Remove the schema with the given uuid from the project. This will automatically remove all schema versions of the given schema from all releases of the project.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->schemas->withSchemaUuid('schemaUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `withProject('project')->schemas->withSchemaUuid('schemaUuid')->post($body = null, $options = [])`

* **project** (type: `string`)
* **schemaUuid** schemaUuid (type: `string`)

Assign the schema to the project. This will automatically assign the latest schema version to all releases of the project.

```php
$builder =  new RequestBuilder();
$request = $builder->withProject('project')->schemas->withSchemaUuid('schemaUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `users->->post($body = null, $options = [])`

Create a new user.

```php
$builder =  new RequestBuilder();
$request = $builder->users->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `users->->get($query = null, $options = [])`

Load multiple users and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->users->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `users->withUserUuid('userUuid')->post($body = null, $options = [])`

* **userUuid** userUuid (type: `string`)

Update the user with the given uuid. The user is created if no user with the specified uuid could be found.

```php
$builder =  new RequestBuilder();
$request = $builder->users->withUserUuid('userUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `users->withUserUuid('userUuid')->delete($body = null, $options = [])`

* **userUuid** userUuid (type: `string`)

Deactivate the user with the given uuid. Please note that users can't be deleted since they are needed to construct creator/editor information.

```php
$builder =  new RequestBuilder();
$request = $builder->users->withUserUuid('userUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `users->withUserUuid('userUuid')->get($query = null, $options = [])`

* **userUuid** userUuid (type: `string`)

Read the user with the given uuid

```php
$builder =  new RequestBuilder();
$request = $builder->users->withUserUuid('userUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `users->withUserUuid('userUuid')->resetToken->post($body = null, $options = [])`

* **userUuid** userUuid (type: `string`)

Return a one time token which can be used by any user to update a user (e.g.: Reset the password)

```php
$builder =  new RequestBuilder();
$request = $builder->users->withUserUuid('userUuid')->resetToken->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `users->withUserUuid('userUuid')->token->delete($body = null, $options = [])`

* **userUuid** userUuid (type: `string`)

Invalidate the issued API token.

```php
$builder =  new RequestBuilder();
$request = $builder->users->withUserUuid('userUuid')->token->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `users->withUserUuid('userUuid')->token->post($body = null, $options = [])`

* **userUuid** userUuid (type: `string`)

Return API token which can be used to authenticate the user. Store the key somewhere save since you won't be able to retrieve it later on.

```php
$builder =  new RequestBuilder();
$request = $builder->users->withUserUuid('userUuid')->token->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `users->withUserUuid('userUuid')->permissions->withPath('path')->get($query = null, $options = [])`

* **userUuid** userUuid (type: `string`)
* **path** path (type: `string`)

Read the user permissions on the element that can be located by the specified path.

```php
$builder =  new RequestBuilder();
$request = $builder->users->withUserUuid('userUuid')->permissions->withPath('path')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `roles->->get($query = null, $options = [])`

Load multiple roles and return a paged list response

```php
$builder =  new RequestBuilder();
$request = $builder->roles->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `roles->->post($body = null, $options = [])`

Create a new role.

```php
$builder =  new RequestBuilder();
$request = $builder->roles->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `roles->withRoleUuid('roleUuid')->post($body = null, $options = [])`

* **roleUuid** roleUuid (type: `string`)

Update the role with the given uuid. The role is created if no role with the specified uuid could be found.

```php
$builder =  new RequestBuilder();
$request = $builder->roles->withRoleUuid('roleUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `roles->withRoleUuid('roleUuid')->get($query = null, $options = [])`

* **roleUuid** roleUuid (type: `string`)

Load the role with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->roles->withRoleUuid('roleUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `roles->withRoleUuid('roleUuid')->delete($body = null, $options = [])`

* **roleUuid** roleUuid (type: `string`)

Delete the role with the given uuid

```php
$builder =  new RequestBuilder();
$request = $builder->roles->withRoleUuid('roleUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `roles->withRoleUuid('roleUuid')->permissions->withPath('path')->post($body = null, $options = [])`

* **roleUuid** roleUuid (type: `string`)
* **path** path (type: `string`)

Set the permissions between role and the targeted element.

```php
$builder =  new RequestBuilder();
$request = $builder->roles->withRoleUuid('roleUuid')->permissions->withPath('path')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `roles->withRoleUuid('roleUuid')->permissions->withPath('path')->get($query = null, $options = [])`

* **roleUuid** roleUuid (type: `string`)
* **path** path (type: `string`)

Load the permissions between given role and the targeted element.

```php
$builder =  new RequestBuilder();
$request = $builder->roles->withRoleUuid('roleUuid')->permissions->withPath('path')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `utilities->linkResolver->post($body = null, $options = [])`

Return the posted text and resolve and replace all found mesh links. A mesh link must be in the format {{mesh.link("UUID","languageTag")}}

```php
$builder =  new RequestBuilder();
$request = $builder->utilities->linkResolver->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `utilities->validateMicroschema->post($body = null, $options = [])`

Validate the posted microschema and report errors.

```php
$builder =  new RequestBuilder();
$request = $builder->utilities->validateMicroschema->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `utilities->validateSchema->post($body = null, $options = [])`

Validate the posted schema and report errors.

```php
$builder =  new RequestBuilder();
$request = $builder->utilities->validateSchema->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->->post($body = null, $options = [])`

Create a new group.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->->get($query = null, $options = [])`

Read multiple groups and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->get($query = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)

Read the group with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->delete($body = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)

Delete the given group.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->post($body = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)

Update the group with the given uuid. The group is created if no group with the specified uuid could be found.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->roles->get($query = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)

Load multiple roles that are assigned to the group. Return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->roles->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->roles->withRoleUuid('roleUuid')->post($body = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)
* **roleUuid** roleUuid (type: `string`)

Add the specified role to the group.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->roles->withRoleUuid('roleUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->roles->withRoleUuid('roleUuid')->delete($body = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)
* **roleUuid** roleUuid (type: `string`)

Remove the given role from the group.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->roles->withRoleUuid('roleUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->users->get($query = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)

Load a list of users which have been assigned to the group.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->users->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->users->withUserUuid('userUuid')->delete($body = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)
* **userUuid** userUuid (type: `string`)

Remove the given user from the group.

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->users->withUserUuid('userUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `groups->withGroupUuid('groupUuid')->users->withUserUuid('userUuid')->post($body = null, $options = [])`

* **groupUuid** groupUuid (type: `string`)
* **userUuid** userUuid (type: `string`)

Add the given user to the group

```php
$builder =  new RequestBuilder();
$request = $builder->groups->withGroupUuid('groupUuid')->users->withUserUuid('userUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `auth->login->get($query = null, $options = [])`

Login via basic authentication.

```php
$builder =  new RequestBuilder();
$request = $builder->auth->login->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `auth->login->post($body = null, $options = [])`

Login via this dedicated login endpoint.

```php
$builder =  new RequestBuilder();
$request = $builder->auth->login->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `auth->logout->get($query = null, $options = [])`

Logout and delete the currently active session.

```php
$builder =  new RequestBuilder();
$request = $builder->auth->logout->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `auth->me->get($query = null, $options = [])`

Load your own user which is currently logged in.

```php
$builder =  new RequestBuilder();
$request = $builder->auth->me->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `projects->->get($query = null, $options = [])`

Load multiple projects and return a paged response.

```php
$builder =  new RequestBuilder();
$request = $builder->projects->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `projects->->post($body = null, $options = [])`

Create a new project.

```php
$builder =  new RequestBuilder();
$request = $builder->projects->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `projects->withProjectUuid('projectUuid')->post($body = null, $options = [])`

* **projectUuid** projectUuid (type: `string`)

Update the project with the given uuid. The project is created if no project with the specified uuid could be found.

```php
$builder =  new RequestBuilder();
$request = $builder->projects->withProjectUuid('projectUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `projects->withProjectUuid('projectUuid')->delete($body = null, $options = [])`

* **projectUuid** projectUuid (type: `string`)

Delete the project and all attached nodes.

```php
$builder =  new RequestBuilder();
$request = $builder->projects->withProjectUuid('projectUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `projects->withProjectUuid('projectUuid')->get($query = null, $options = [])`

* **projectUuid** projectUuid (type: `string`)

Load the project with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->projects->withProjectUuid('projectUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `schemas->->get($query = null, $options = [])`

Read multiple schemas and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->schemas->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `schemas->->post($body = null, $options = [])`

Create a new schema.

```php
$builder =  new RequestBuilder();
$request = $builder->schemas->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `schemas->withSchemaUuid('schemaUuid')->get($query = null, $options = [])`

* **schemaUuid** schemaUuid (type: `string`)

Load the schema with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->schemas->withSchemaUuid('schemaUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `schemas->withSchemaUuid('schemaUuid')->delete($body = null, $options = [])`

* **schemaUuid** schemaUuid (type: `string`)

Delete the schema with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->schemas->withSchemaUuid('schemaUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `schemas->withSchemaUuid('schemaUuid')->post($body = null, $options = [])`

* **schemaUuid** schemaUuid (type: `string`)

Update the schema.

```php
$builder =  new RequestBuilder();
$request = $builder->schemas->withSchemaUuid('schemaUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `schemas->withSchemaUuid('schemaUuid')->diff->post($body = null, $options = [])`

* **schemaUuid** schemaUuid (type: `string`)

Compare the given schema with the stored schema and create a changeset.

```php
$builder =  new RequestBuilder();
$request = $builder->schemas->withSchemaUuid('schemaUuid')->diff->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `schemas->withSchemaUuid('schemaUuid')->changes->post($body = null, $options = [])`

* **schemaUuid** schemaUuid (type: `string`)

Apply the posted changes to the schema. The schema migration will not automatically be started.

```php
$builder =  new RequestBuilder();
$request = $builder->schemas->withSchemaUuid('schemaUuid')->changes->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `microschemas->->get($query = null, $options = [])`

Read multiple microschemas and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->microschemas->->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `microschemas->->post($body = null, $options = [])`

Create a new microschema.

```php
$builder =  new RequestBuilder();
$request = $builder->microschemas->->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `microschemas->withMicroschemaUuid('microschemaUuid')->post($body = null, $options = [])`

* **microschemaUuid** microschemaUuid (type: `string`)

Update the microschema with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->microschemas->withMicroschemaUuid('microschemaUuid')->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `microschemas->withMicroschemaUuid('microschemaUuid')->delete($body = null, $options = [])`

* **microschemaUuid** microschemaUuid (type: `string`)

Delete the microschema with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->microschemas->withMicroschemaUuid('microschemaUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `microschemas->withMicroschemaUuid('microschemaUuid')->get($query = null, $options = [])`

* **microschemaUuid** microschemaUuid (type: `string`)

Read the microschema with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->microschemas->withMicroschemaUuid('microschemaUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `microschemas->withMicroschemaUuid('microschemaUuid')->changes->post($body = null, $options = [])`

* **microschemaUuid** microschemaUuid (type: `string`)

Apply the provided changes on the latest version of the schema and migrate all nodes which are based on the schema. Please note that this operation is non-blocking and will continue to run in the background.

```php
$builder =  new RequestBuilder();
$request = $builder->microschemas->withMicroschemaUuid('microschemaUuid')->changes->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `microschemas->withMicroschemaUuid('microschemaUuid')->diff->post($body = null, $options = [])`

* **microschemaUuid** microschemaUuid (type: `string`)

Compare the provided schema with the schema which is currently stored and generate a set of changes that have been detected.

```php
$builder =  new RequestBuilder();
$request = $builder->microschemas->withMicroschemaUuid('microschemaUuid')->diff->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->cluster->status->get($query = null, $options = [])`

Loads the cluster status information.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->cluster->status->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->consistency->repair->post($body = null, $options = [])`

Invokes a consistency check and repair of the graph database and returns a list of found issues and their state.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->consistency->repair->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->consistency->check->get($query = null, $options = [])`

Invokes a consistency check of the graph database without attempting to repairing the found issues. A list of found issues will be returned.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->consistency->check->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->graphdb->restore->post($body = null, $options = [])`

Invoke a graph database restore. The latest dump from the backup directory will be inserted. Please note that this operation will block all current operation and effectively destroy all previously stored data.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->graphdb->restore->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->graphdb->backup->post($body = null, $options = [])`

Invoke a graph database backup and dump the data to the configured backup location. Note that this operation will block all current operation.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->graphdb->backup->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->jobs->get($query = null, $options = [])`

List all currently queued jobs.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->jobs->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->jobs->withJobUuid('jobUuid')->get($query = null, $options = [])`

* **jobUuid** jobUuid (type: `string`)

Load a specific job.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->jobs->withJobUuid('jobUuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->jobs->withJobUuid('jobUuid')->delete($body = null, $options = [])`

* **jobUuid** jobUuid (type: `string`)

Deletes the job. Note that it is only possible to delete failed jobs

```php
$builder =  new RequestBuilder();
$request = $builder->admin->jobs->withJobUuid('jobUuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->jobs->withJobUuid('jobUuid')->error->delete($body = null, $options = [])`

* **jobUuid** jobUuid (type: `string`)

Deletes error state from the job. This will make it possible to execute the job once again.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->jobs->withJobUuid('jobUuid')->error->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->plugins->get($query = null, $options = [])`

Loads deployment information for all deployed plugins.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->plugins->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->plugins->post($body = null, $options = [])`

Deploys the plugin using the provided deployment information.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->plugins->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->plugins->withUuid('uuid')->get($query = null, $options = [])`

* **uuid** uuid (type: `string`)

Loads deployment information for the plugin with the given id.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->plugins->withUuid('uuid')->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->plugins->withUuid('uuid')->delete($body = null, $options = [])`

* **uuid** uuid (type: `string`)

Undeploys the plugin with the given uuid.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->plugins->withUuid('uuid')->delete($body = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->status->get($query = null, $options = [])`

Return the Gentics Mesh server status.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->status->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `admin->processJobs->post($body = null, $options = [])`

Invoke the processing of remaining jobs.

```php
$builder =  new RequestBuilder();
$request = $builder->admin->processJobs->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->groups->post($body = null, $options = [])`

Invoke a search query for groups and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->groups->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->nodes->post($body = null, $options = [])`

Invoke a search query for nodes and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->nodes->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->roles->post($body = null, $options = [])`

Invoke a search query for roles and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->roles->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->status->get($query = null, $options = [])`

Returns the search index status.

```php
$builder =  new RequestBuilder();
$request = $builder->search->status->get($query = null, $options = []);
$response = $client->send($request);
```
  
#### `search->tagFamilies->post($body = null, $options = [])`

Invoke a search query for tagFamilies and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->tagFamilies->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->users->post($body = null, $options = [])`

Invoke a search query for users and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->users->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->microschemas->post($body = null, $options = [])`

Invoke a search query for microschemas and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->microschemas->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->schemas->post($body = null, $options = [])`

Invoke a search query for schemas and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->schemas->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->tags->post($body = null, $options = [])`

Invoke a search query for tags and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->tags->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->projects->post($body = null, $options = [])`

Invoke a search query for projects and return a paged list response.

```php
$builder =  new RequestBuilder();
$request = $builder->search->projects->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->clear->post($body = null, $options = [])`

Drops all indices and recreates them. The index sync is not invoked automatically.

```php
$builder =  new RequestBuilder();
$request = $builder->search->clear->post($body = null, $options = []);
$response = $client->send($request);
```
  
#### `search->sync->post($body = null, $options = [])`

Invokes the manual synchronisation of the search indices. This operation may take some time to complete and is performed asynchronously. When clustering is enabled it will be executed on any free instance.

```php
$builder =  new RequestBuilder();
$request = $builder->search->sync->post($body = null, $options = []);
$response = $client->send($request);
```
  
## License

TBD
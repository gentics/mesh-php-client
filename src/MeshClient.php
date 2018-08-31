<?php

namespace Gentics\Mesh\Client;

use Gentics\Mesh\Client\Rest\MeshRequest;
use Gentics\Mesh\Client\Rest\Request;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Promise\Promise;

class MeshClient extends HttpClient implements
Methods\UsersMethodsInterface,
Methods\AdminMethodsInterface,
Methods\AdminPluginMethodsInterface,
Methods\APIInfoMethodsInterface,
Methods\AuthMethodsInterface,
Methods\BranchMethodsInterface,
Methods\GraphQLMethodsInterface,
Methods\GroupsMethodsInterface,
Methods\JobMethodsInterface,
Methods\NodeBinaryFieldMethodsInterface,
Methods\NodesMethodsInterface,
Methods\ProjectsMethodsInterface,
Methods\RolesMethodsInterface,
Methods\SchemaMethodsInterface,
Methods\MicroschemaMethodsInterface,
Methods\SearchMethodsInterface,
Methods\TagFamiliesMethodsInterface,
Methods\TagMethodsInterface,
Methods\UtilityMethodsInterface,
Methods\WebrootMethodsInterface
{

    private $baseUri;

    private $cookieJar;

    /**
     * JWT Token / API key to be used for authentication.
     */
    private $token;

    public function __construct(string $baseUri = "http://localhost:8080/api/v1", array $config = [])
    {
        $this->baseUri = $baseUri;
        $this->cookieJar = new CookieJar();
        $config["cookies"] = $this->cookieJar;
        parent::__construct($config);
    }

    /**
     * Build a new request handler.
     *
     * @param $method
     * @param $uri
     * @param mixed $body
     * @param array $options
     * @return RequestInterface
     */
    final protected function buildRequest($method, $uri, $body = null, array $parameters = [], $requestClass = 'MeshRequest')
    {
        $headers = isset($options['headers']) ? $options['headers'] : [];
        $requestClass = '\\Gentics\Mesh\Client\\Rest\\' . $requestClass;
        //$request = new $requestClass($method, $this->baseUri . $uri, $headers, $body);
        if (isset($this->token)) {
            $headers["Authorization"] = "Bearer " . $this->token;
        }
        $options["query"] = $parameters;
        $request = new \Gentics\Mesh\Client\Rest\MeshRequest($this, $method, $this->baseUri . $uri, $headers, $body, $options);

        return $request;
    }

    // Client API Methods

    public function setAPIKey($key)
    {
        $this->cookieJar->clear();
        $this->token = $key;
    }

    // Node Methods

    public function findNodeByUuid(string $projectName, string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/nodes/" . $uuid);
    }

    public function findNodes(string $projectName, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/nodes", null, $parameters);
    }

    public function findNodesForTag(string $projectName, string $tagFamilyUuid, string $tagUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $tagFamilyUuid . "/tags/" . $tagUuid . "/nodes", null, $parameters);
    }

    public function findNodeChildren(string $projectName, string $parentNodeUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/nodes/" . $parentNodeUuid . "/children", null, $parameters);
    }

    public function addTagToNode(string $projectName, string $nodeUuid, string $tagUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/tags/" . $tagUuid, null, $parameters);
    }

    public function findTagsForNode(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/tags", null, $parameters);
    }

    public function removeTagFromNode(string $projectName, string $nodeUuid, string $tagUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/tags/" . $tagUuid, $parameters);
    }

    public function updateTagsForNode(string $projectName, string $nodeUuid, $request, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/tags", $request, $parameters);
    }

    public function updateNode(string $projectName, string $uuid, $nodeUpdateRequest, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes/" . $uuid, $nodeUpdateRequest, $parameters);
    }

    public function moveNode(string $projectName, string $nodeUuid, string $targetFolderUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/moveTo/" . $targetFolderUuid, null, $parameters);
    }

    public function deleteNode(string $projectName, string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/nodes/" . $uuid, null, $parameters);
    }

    public function deleteNodeLanguage(string $projectName, string $uuid, string $language, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/nodes/" . $uuid . "/languages/" . $languageTag, null, $parameters);
    }

    public function createNode(string $projectName, $request, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes", $request, $parameters);
    }

    public function createNodeWithUuid(string $uuid, string $projectName, $request, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes/" . $uuid, $request, $parameters);
    }

    public function publishNode(string $projectName, string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/published", null, $parameters);
    }

    public function publishNodeLanguage(string $projectName, string $nodeUuid, string $languageTag, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/languages/" . $languageTag . "/published", null, $parameters);
    }

    public function takeNodeOffline(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/published", null, $parameters);
    }

    public function takeNodeLanguageOffline(string $projectName, string $nodeUuid, string $languageTag, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/languages/" . $languageTag . "/published", null, $parameters);
    }

    public function getNodePublishStatus(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/published", null, $parameters);
    }

    public function getNodeLanguagePublishStatus(string $projectName, string $nodeUuid, string $languageTag,
        array $parameters = []): MeshRequest {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/published", null, $parameters);
    }

    // Tag Methods

    public function createTag(string $projectName, string $tagFamilyUuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $tagFamilyUuid . "/tags", $request);
    }

    public function findTagByUuid(string $projectName, string $tagFamilyUuid, string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $tagFamilyUuid . "/tags/" . $uuid, null, $parameters);
    }

    public function updateTag(string $projectName, string $tagFamilyUuid, string $uuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $tagFamilyUuid . "/tags/" . $uuid, $request);
    }

    public function deleteTag(string $projectName, string $tagFamilyUuid, string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $tagFamilyUuid . "/tags/" . $uuid);
    }

    public function findTags(string $projectName, string $tagFamilyUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $tagFamilyUuid . "/tags", null, $parameters);
    }

    // Tag Family Methods

    public function findTagFamilyByUuid(string $projectName, string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $uuid, null, $parameters);
    }

    public function findTagFamilies(string $projectName, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/tagFamilies", null, $pagingInfo);
    }

    public function createTagFamily(string $projectName, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/tagFamilies", $request);
    }

    public function deleteTagFamily(string $projectName, string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $uuid);
    }

    public function updateTagFamily(string $projectName, string $tagFamilyUuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/tagFamilies/" . $tagFamilyUuid, $request);
    }

    // Admin Methods

    public function meshStatus(): MeshRequest
    {
        return $this->buildRequest("GET", "/admin/status");
    }

    public function clusterStatus(): MeshRequest
    {
        return $this->buildRequest("GET", "/admin/cluster/status");
    }

    public function invokeBackup(): MeshRequest
    {
        return $this->buildRequest("POST", "/admin/graphdb/backup");
    }

    public function invokeRestore(): MeshRequest
    {
        return $this->buildRequest("POST", "/admin/graphdb/restore");
    }

    public function checkConsistency(): MeshRequest
    {
        return $this->buildRequest("GET", "/admin/consistency/check");
    }

    public function repairConsistency(): MeshRequest
    {
        return $this->buildRequest("POST", "/admin/consistency/repair");
    }

    // User Methods

    public function findUserByUuid(string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/users/" . $uuid, null, $parameters);
    }

    public function findUsers(array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/users", null, $parameters);
    }

    public function createUser($request, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/users", $request, $parameters);
    }

    public function createUserWithUuid(string $uuid, $request, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/users/" . $uuid, $request, $parameters);
    }

    public function updateUser(string $uuid, $request, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/users/" . $uuid, $request, $parameters);
    }

    public function deleteUser(string $uuid)
    {
        return $this->buildRequest("DELETE", "/users/" . $uuid, null);
    }

    public function findUsersOfGroup(string $groupUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/groups/" . $groupUuid . "/users", null, $parameters);
    }

    public function readUserPermissions(string $uuid, string $pathToElement): MeshRequest
    {
        return $this->buildRequest("GET", "/users/" . $uuid . "/permissions/" . $pathToElement, null);
    }

    public function getUserResetToken(string $userUuid): MeshRequest
    {
        return $this->buildRequest("POST", "/users/" . $userUuid . "/reset_token");
    }

    public function issueAPIKey(string $userUuid): MeshRequest
    {
        return $this->buildRequest("POST", "/users/" . $userUuid . "/token");
    }

    public function invalidateAPIToken(string $userUuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/users/" . $userUuid . "/token");
    }

    // Group Methods

    public function findGroupByUuid(string $uuid): MeshRequest
    {
        return $this->buildRequest("GET", "/groups/" . $uuid, null, $parameters);
    }

    public function findGroups(array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/groups", null, $parameters);
    }

    public function createGroup($createRequest): MeshRequest
    {
        return $this->buildRequest("POST", "/groups", $createRequest);
    }

    public function createGroupWithUuid(string $uuid, $createRequest): MeshRequest
    {
        return $this->buildRequest("POST", "/groups/" . $uuid, $createRequest);
    }

    public function updateGroup(string $uuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/groups/" . $uuid, $request);
    }

    public function deleteGroup(string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/groups/" . $uuid);
    }

    public function addUserToGroup(string $groupUuid, string $userUuid): MeshRequest
    {
        return $this->buildRequest("POST", "/groups/" . $groupUuid . "/users/" . $userUuid);
    }

    public function removeUserFromGroup(string $groupUuid, string $userUuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/groups/" . $groupUuid . "/users/" . $userUuid);
    }

    public function addRoleToGroup(string $groupUuid, string $roleUuid)
    {
        return $this->buildRequest("POST", "/groups/" . $groupUuid . "/roles/" . $roleUuid);
    }

    public function removeRoleFromGroup(string $groupUuid, string $roleUuid)
    {
        return $this->buildRequest("DELETE", "/groups/" . $groupUuid . "/roles/" . $roleUuid);
    }

    // Search Methods

    public function searchNodes(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/nodes", $query, $parameters);
    }

    public function searchNodesRaw(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/nodes", $query, $parameters);
    }

    public function searchProjectNodes(string $project, string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/" . $this->encodeSegment($projectName) . "/search/nodes", $query, $parameters);
    }

    public function searchProjectNodesRaw(string $project, string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/" . $this->encodeSegment($projectName) . "/rawSearch/nodes", $query, $parameters);
    }

    public function searchUsers(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/users", $query, $parameters);
    }

    public function searchUsersRaw(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/users", $query, $parameters);
    }

    public function searchRoles(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/roles", $query, $parameters);
    }

    public function searchRolesRaw(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/roles", $query, $parameters);
    }

    public function searchGroups(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/groups", $query, $parameters);
    }

    public function searchGroupsRaw(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/groups", $query, $parameters);
    }

    public function searchTagFamilies(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/tagFamilies", $query, $parameters);
    }

    public function searchTagFamiliesRaw(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/tagFamilies", $query, $parameters);
    }

    public function searchProjectTagFamilies(string $projectName, string $json, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/" . $this->encodeSegment($projectName) . "/search/tagFamilies", $query, $parameters);
    }

    public function searchProjectTagFamiliesRaw(string $projectName, string $json): MeshRequest
    {
        return handleRequest("POST", "/" . $this->encodeSegment($projectName) . "/rawSearch/tagFamilies", $query, $parameters);
    }

    public function searchSchemas(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/schemas", $query, $parameters);
    }

    public function searchSchemasRaw(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/schemas", $query, $parameters);
    }

    public function searchProjects(string $json, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/projects", $query, $parameters);
    }

    public function searchProjectsRaw(string $json): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/projects", $query, $parameters);
    }

    public function searchTags(string $json, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/tags", $query, $parameters);
    }

    public function searchTagsRaw(string $json): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/tags", $query, $parameters);
    }

    public function searchProjectTags(string $projectName, string $json, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/" . $this->encodeSegment($projectName) . "/search/tags", $query, $parameters);
    }

    public function searchProjectTagsRaw(string $projectName, string $json): MeshRequest
    {
        return handleRequest("POST", "/" . $this->encodeSegment($projectName) . "/rawSearch/tags", $query, $parameters);
    }

    public function searchMicroschemas(string $query, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/search/microschemas", $query, $parameters);
    }

    public function searchMicroschemasRaw(string $query): MeshRequest
    {
        return handleRequest("POST", "/rawSearch/microschemas", $query, $parameters);
    }

    public function invokeIndexClear(): MeshRequest
    {
        return $this->buildRequest("POST", "/search/clear");
    }

    public function invokeIndexSync(): MeshRequest
    {
        return $this->buildRequest("POST", "/search/sync");
    }

    public function searchStatus(): MeshRequest
    {
        return $this->buildRequest("GET", "/search/status");
    }

    // Project methods

    public function findProjectByUuid(string $uuid, array $parameters = []): MeshRequest
    {
        return prepareRequest(GET, "/projects/" . $uuid, null, $parameters);
    }

    public function findProjectByName(string $name, array $parameters = []): MeshRequest
    {
        return prepareRequest(GET, "/" . $this->encodeSegment($name), null, $parameters);
    }

    public function findProjects(array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/projects", null, $parameters);
    }

    public function assignLanguageToProject(string $projectUuid, string $languageUuid): MeshRequest
    {
        return $this->buildRequest("POST", "/projects/" . $projectUuid . "/languages/" . $languageUuid);
    }

    public function unassignLanguageFromProject(string $projectUuid, string $languageUuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/projects/" . $projectUuid . "/languages/" . $languageUuid);
    }

    public function createProject($request): MeshRequest
    {
        return $this->buildRequest("POST", "/projects", $request);
    }

    public function createProjectWithUuid(string $uuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/projects/" . $uuid, $request);
    }

    public function updateProject(string $uuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/projects/" . $uuid, $request);
    }

    public function deleteProject(string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/projects/" . $uuid);
    }

    // GraphQL Methods

    public function graphQL(string $projectName, $query, array $parameters = []): MeshRequest
    {
        $path = "/" . $this->encodeSegment($projectName) . "/graphql";
        return $this->buildRequest("POST", $path, $query, $parameters);
    }

    // Role Methods

    public function findRoleByUuid(string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/roles/" . $uuid, null, $parameters);
    }

    public function findRoles(array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/roles", null, $parameters);
    }

    public function createRole($request): MeshRequest
    {
        return $this->buildRequest("POST", "/roles", $request);
    }

    public function createRoleWithUuid(string $uuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/roles/" . $uuid, $request);
    }

    public function deleteRole(string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/roles/" . $uuid);
    }

    public function findRolesForGroup(string $groupUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/groups/" . $groupUuid . "/roles", null, $parameters);
    }

    public function updateRolePermissions(string $roleUuid, string $pathToElement, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/roles/" . $roleUuid . "/permissions/" . $pathToElement, $request);
    }

    public function readRolePermissions(string $roleUuid, string $pathToElement): MeshRequest
    {
        return $this->buildRequest("GET", "/roles/" . $roleUuid . "/permissions/" . $pathToElement);
    }

    public function updateRole(string $uuid, $restRole): MeshRequest
    {
        return $this->buildRequest("POST", "/roles/" . $uuid, $restRole);
    }

    // Auth Methods

    public function login(string $username, string $password): Promise
    {
        $request = array(
            "username" => $username,
            "password" => $password,
        );

        return $this->buildRequest("POST", "/auth/login", $request)->sendAsync()->then(function ($r) {
            $json = json_decode($r->getBody(), true);
            $this->token = $json["token"];
        });
    }

    public function me(): MeshRequest
    {
        return $this->buildRequest("GET", "/auth/me");
    }

    // Branch Methods

    public function createBranch(string $projectName, $branchCreateRequest, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/branches", $branchCreateRequest, $parameters);
    }

    public function createBranchWithUuid(string $projectName, string $uuid, $branchCreateRequest, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/branches/" . $uuid, $branchCreateRequest, $parameters);
    }

    public function findBranchByUuid(string $projectName, string $branchUuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/branches/" . $branchUuid, null, $parameters);
    }

    public function findBranches(string $projectName, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/branches", null, $parameters);
    }

    public function updateBranch(string $projectName, string $branchUuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/branches/" . $branchUuid, $request);
    }

    public function getBranchSchemaVersions(string $projectName, string $branchUuid): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/branches/" . $branchUuid . "/schemas");
    }

    public function assignBranchSchemaVersions(string $projectName, string $branchUuid, $schemaVersionReferences): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/branches/" . $branchUuid . "/schemas", $schemaVersionReferences);
    }

    public function getBranchMicroschemaVersions(string $projectName, string $branchUuid): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/branches/" . $branchUuid . "/microschemas");
    }

    public function assignBranchMicroschemaVersions(string $projectName, string $branchUuid,
        $microschemaVersionReferences): MeshRequest {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/branches/" . $branchUuid . "/microschemas", $microschemaVersionReferences);
    }

    public function migrateBranchSchemas(string $projectName, string $branchUuid): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/branches/" . branchUuid . "/migrateSchemas", $microschemaVersionReferences);
    }

    public function migrateBranchMicroschemas(string $projectName, string $branchUuid): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/branches/" . branchUuid . "/migrateMicroschemas");
    }

    // API Info Methods

    public function getApiInfo(): MeshRequest
    {
        return $this->buildRequest("GET", "/");
    }

    public function getRAML(): MeshRequest
    {
        return $this->buildRequest("GET", "/raml");
    }

    // Job Methods

    public function findJobs(array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/admin/jobs", $parameters);
    }

    public function findJobByUuid(string $uuid): MeshRequest
    {
        return $this->buildRequest("GET", "/admin/jobs/" . $uuid);
    }

    public function deleteJob(string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/admin/jobs/" . $uuid);
    }

    public function resetJob(string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/admin/jobs/" . $uuid . "/error");
    }

    public function invokeJobProcessing(): MeshRequest
    {
        return $this->buildRequest("POST", "/admin/processJobs");
    }

    // Schema Methods

    public function createSchema($request): MeshRequest
    {
        return $this->buildRequest("POST", "/schemas", $request);
    }

    public function findSchemaByUuid(string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/schemas/" . $uuid, null, $parameters);
    }

    public function updateSchema(string $uuid, $request, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/schemas/" . $uuid, $request, $parameters);
    }

    public function diffSchema(string $uuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/schemas/" . $uuid . "/diff", $request);
    }

    public function deleteSchema(string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/schemas/" . $uuid);
    }

    public function findSchemas(array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/schemas", null, $parameters);
    }

    public function findProjectSchemas(string $projectName, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/schemas", null, $parameters);
    }

    public function findMicroschemas(array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/microschemas", null, $parameters);
    }

    public function applyChangesToSchema(string $uuid, $changes): MeshRequest
    {
        return $this->buildRequest("POST", "/schemas/" . $uuid . "/changes", $changes);
    }

    public function assignSchemaToProject(string $projectName, string $schemaUuid): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/schemas/" . $schemaUuid);
    }

    public function unassignSchemaFromProject(string $projectName, string $schemaUuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/schemas/" . $schemaUuid);
    }

    public function assignMicroschemaToProject(string $projectName, string $microschemaUuid): MeshRequest
    {
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/microschemas/" . $microschemaUuid);
    }

    public function unassignMicroschemaFromProject(string $projectName, string $microschemaUuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/" . $this->encodeSegment($projectName) . "/microschemas/" . $microschemaUuid);
    }

    public function findProjectMicroschemas(string $projectName, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/microschemas", null, $parameters);
    }

    // Microschema Methods

    public function createMicroschema($request): MeshRequest
    {
        return $this->buildRequest("POST", "/microschemas", $request);
    }

    public function findMicroschemaByUuid(string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/microschemas/" . $uuid, null, $parameters);
    }

    public function updateMicroschema(string $uuid, $request, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("POST", "/microschemas/" . $uuid, $request, $parameters);
    }

    public function deleteMicroschema(string $uuid): MeshRequest
    {
        return $this->buildRequest("DELETE", "/microschemas/" . $uuid);
    }

    public function applyChangesToMicroschema(string $uuid, $changes): MeshRequest
    {
        return $this->buildRequest("POST", "/microschemas/" . $uuid . "/changes", $changes);
    }

    public function diffMicroschema(string $uuid, $request): MeshRequest
    {
        return $this->buildRequest("POST", "/microschemas/" . $uuid . "/diff", $request);
    }

    // Binary Field Methods

    public function updateNodeBinaryField(string $projectName, string $nodeUuid, string $languageTag, string $nodeVersion,
        string $fieldKey, $fileData, string $fileName, string $contentType, array $parameters = []): MeshRequest {

        throw new Rest\NotImplementedException();

        return $client->request('POST', $this->baseUri . "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/binary/" . $fieldName, [
            'multipart' => [
                [
                    'name' => 'version',
                    'contents' => $version,
                ],
                [
                    'name' => 'language',
                    'contents' => $language,
                ],
                [
                    'name' => 'other_file',
                    'contents' => fopen('/path/to/file', 'r'),
                    'filename' => $fileName,
                    'headers' => [
                        'Content-Type' => $contentType,
                    ],
                ],
            ],
        ]);

    }

    public function downloadBinaryField(string $projectName, string $nodeUuid, string $languageTag, string $fieldKey,
        array $parameters = []): MeshRequest {
        throw new Rest\NotImplementedException();
        return $client->request('GET', $this->baseUri . "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/binary/" . $fieldKey);
    }

    public function transformNodeBinaryField(string $projectName, string $nodeUuid, string $languageTag, string $version,
        string $fieldKey, $imageManipulationParameter): MeshRequest {
        throw new Rest\NotImplementedException();
        // TODO prepare the request.
        $request = [];
        return $this->buildRequest("POST", "/" . $this->encodeSegment($projectName) . "/nodes/" . $nodeUuid . "/binaryTransform/" . $fieldKey, array($imageManipulationParameter),
            $request);
    }

    // Utility Methods

    public function resolveLinks(string $body, array $parameters = []): MeshRequest
    {
        return handleRequest("POST", "/utilities/linkResolver", $body, $parameters);
    }

    public function validateSchema($schema): MeshRequest
    {
        return $this->buildRequest("POST", "/utilities/validateSchema", $schema);
    }

    public function validateMicroschema($microschema): MeshRequest
    {
        return $this->buildRequest("POST", "/utilities/validateMicroschema", $schema);
    }

    // Webroot Methods

    public function webroot(string $projectName, string $path, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $this->encodeSegment($projectName) . "/webroot/" . $path, null, $parameters);
    }

    private function encodeSegment(string $segment)
    {
        // Encode segements RFC3986
        return rawurlencode($segment);
    }
}

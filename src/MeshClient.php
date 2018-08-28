<?php

namespace GenticsMeshRestApi;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use GenticsMeshRestApi\Rest\MeshRequest;
use GenticsMeshRestApi\Rest\Request;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use League\OAuth2\Client\Provider\AbstractProvider;
use Psr\Cache\CacheItemPoolInterface;

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

    private $baseUri = "/api/v1";

    public function __construct(array $config = [], AbstractProvider $oauthProvider = null, CacheItemPoolInterface $cache = null)
    {
        if (!isset($config['handler'])) {
            $config['handler'] = HandlerStack::create();
        }
        if (!isset($config['credentials'])) {
            $config['credentials'] = [];
        }
        if (is_null($cache)) {
            $filesystemAdapter = new Local(__DIR__ . '/../');
            $filesystem = new Filesystem($filesystemAdapter);
            $cache = new FilesystemCachePool($filesystem);
        }

        parent::__construct($config);
    }

    private function getHandler($name, $config, $accessTokenUrl, $authorizeUrl, CacheItemPoolInterface $cache, AbstractProvider $provider = null)
    {
        $credentials = isset($config['credentials'][$name]) ? $config['credentials'][$name] : $config['credentials'];
        if (isset($config['providers'][$name])) {
            $provider = $config['providers'][$name];
        }
        if (is_null($provider)) {
            $provider = new TokenProvider(
                array_merge(
                    [
                        'urlAccessToken' => $accessTokenUrl,
                        'urlAuthorize' => $authorizeUrl,
                    ],
                    $credentials
                )
            );
        }
        return new OAuth2Handler($name, $provider, $cache);
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
    final protected function buildRequest($method, $uri, $body = null, array $options = [], $requestClass = 'MeshRequest')
    {
        $headers = isset($options['headers']) ? $options['headers'] : [];
        $requestClass = '\\GenticsMeshRestApi\\Rest\\' . $requestClass;
        /**
         * @var RequestInterface $request
         */
        //$request = new $requestClass($method, $this->baseUri . $uri, $headers, $body);
        $request = new \GenticsMeshRestApi\Rest\MeshRequest($method, $this->baseUri . $uri, $headers, $body);

        if (isset($options['query'])) {
            ksort($options['query']);
            $uri = $request->getUri()->withQuery(Psr7\build_query($options['query']));
            $request = $request->withUri($uri);
        }

        return $request;
    }

    // Node Methods

    public function findNodeByUuid(string $projectName, string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $projectName . "/nodes/" . $uuid);
    }

    public function findNodes(string $projectName, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/" . $projectName . "/nodes");
    }

    public function findNodesForTag(string $projectName, string $tagFamilyUuid, string $tagUuid, array $parameters = [])
    {

    }

    public function findNodeChildren(string $projectName, string $parentNodeUuid, array $parameters = []): MeshRequest
    {

    }

    public function addTagToNode(string $projectName, string $nodeUuid, string $tagUuid, array $parameters = []): MeshRequest
    {

    }

    public function findTagsForNode(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest
    {

    }

    public function removeTagFromNode(string $projectName, string $nodeUuid, string $tagUuid, array $parameters = []): MeshRequest
    {

    }

    public function updateTagsForNode(string $projectName, string $nodeUuid, $request, array $parameters = []): MeshRequest
    {

    }

    public function updateNode(string $projectName, string $uuid, $nodeUpdateRequest, array $parameters = []): MeshRequest
    {

    }

    public function moveNode(string $projectName, string $nodeUuid, string $targetFolderUuid, array $parameters = []): MeshRequest
    {

    }

    public function deleteNode(string $projectName, string $uuid, array $parameters = []): MeshRequest
    {

    }

    public function deleteNodeLanguage(string $projectName, string $uuid, string $language, array $parameters = []): MeshRequest
    {

    }

    public function createNode(string $projectName, $request, array $parameters = []): MeshRequest
    {

    }

    public function createNodeWithUuid(string $uuid, string $projectName, $request, array $parameters = []): MeshRequest
    {

    }

    public function publishNode(string $projectName, string $uuid, array $parameters = []): MeshRequest
    {

    }

    public function publishNodeLanguage(string $projectName, string $nodeUuid, string $languageTag, array $parameters = []): MeshRequest
    {

    }

    public function takeNodeOffline(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest
    {

    }

    public function takeNodeLanguageOffline(string $projectName, string $nodeUuid, string $languageTag, array $parameters = []): MeshRequest
    {

    }

    public function getNodePublishStatus(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest
    {

    }

    public function getNodeLanguagePublishStatus(string $projectName, string $nodeUuid, string $languageTag,
        array $parameters = []): MeshRequest {

    }

    // Tag Methods

    public function createTag(string $projectName, string $tagFamilyUuid, $request): MeshRequest
    {

    }

    public function findTagByUuid(string $projectName, string $tagFamilyUuid, string $uuid, array $parameters = []): MeshRequest
    {

    }

    public function updateTag(string $projectName, string $tagFamilyUuid, string $uuid, $request): MeshRequest
    {

    }

    public function deleteTag(string $projectName, string $tagFamilyUuid, string $uuid): MeshRequest
    {

    }

    public function findTags(string $projectName, string $tagFamilyUuid, array $parameters = []): MeshRequest
    {

    }

    // Tag Family Methods

    public function findTagFamilyByUuid(string $projectName, string $uuid, array $parameters = []): MeshRequest
    {

    }

    public function findTagFamilies(string $projectName, array $parameters = []): MeshRequest
    {

    }

    public function createTagFamily(string $projectName, $request): MeshRequest
    {

    }

    public function deleteTagFamily(string $projectName, string $uuid): MeshRequest
    {

    }

    public function updateTagFamily(string $projectName, string $tagFamilyUuid, $request): MeshRequest
    {

    }

    // Admin Methods

    public function meshStatus(): MeshRequest
    {

    }

    public function clusterStatus(): MeshRequest
    {

    }

    public function invokeBackup(): MeshRequest
    {

    }

    public function invokeRestore(): MeshRequest
    {

    }

    public function checkConsistency(): MeshRequest
    {

    }

    public function repairConsistency(): MeshRequest
    {

    }

    // User Methods

    public function findUserByUuid(string $uuid, array $parameters = []): MeshRequest
    {
        return $this->buildRequest("GET", "/users");
    }

    public function findUsers(array $parameters = []): MeshRequest
    {

    }

    public function createUser($request, array $parameters = []): MeshRequest
    {

    }

    public function createUserWithUuid(string $uuid, $request, array $parameters = []): MeshRequest
    {

    }

    public function updateUser(string $uuid, $request, array $parameters = []): MeshRequest
    {

    }

    public function deleteUser(string $uuid)
    {

    }

    public function findUsersOfGroup(string $groupUuid, array $parameters = []): MeshRequest
    {

    }

    public function readUserPermissions(string $uuid, string $pathToElement): MeshRequest
    {

    }

    public function getUserResetToken(string $userUuid): MeshRequest
    {

    }
    public function issueAPIToken(string $userUuid): MeshRequest
    {

    }
    public function invalidateAPIToken(string $userUuid): MeshRequest
    {

    }

    // Group Methods

    public function findGroupByUuid(string $uuid): MeshRequest
    {

    }

    public function findGroups(array $parameters = []): MeshRequest
    {

    }

    public function createGroup($createRequest): MeshRequest
    {

    }

    public function createGroupWithUuid(string $uuid, $createRequest): MeshRequest
    {

    }

    public function updateGroup(string $uuid, $request): MeshRequest
    {

    }

    public function deleteGroup(string $uuid): MeshRequest
    {

    }

    public function addUserToGroup(string $groupUuid, string $userUuid): MeshRequest
    {

    }

    public function removeUserFromGroup(string $groupUuid, string $userUuid): MeshRequest
    {

    }

    public function addRoleToGroup(string $groupUuid, string $roleUuid)
    {

    }

    public function removeRoleFromGroup(string $groupUuid, string $roleUuid)
    {

    }

    // Search Methods

    public function searchNodes(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchNodesRaw(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchProjectNodes(string $project, string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchProjectNodesRaw(string $project, string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchUsers(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchUsersRaw(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchRoles(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchRolesRaw(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchGroups(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchGroupsRaw(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchTagFamilies(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchTagFamiliesRaw(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchProjectTagFamilies(string $projectName, string $json, array $parameters = []): MeshRequest
    {

    }

    public function searchProjectTagFamiliesRaw(string $projectName, string $json): MeshRequest
    {

    }

    public function searchSchemas(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchSchemasRaw(string $query, array $parameters = []): MeshRequest
    {

    }

    public function searchProjects(string $json, array $parameters = []): MeshRequest
    {

    }

    public function searchProjectsRaw(string $json): MeshRequest
    {

    }

    public function searchTags(string $json, array $parameters = []): MeshRequest
    {

    }

    public function searchTagsRaw(string $json): MeshRequest
    {

    }

    public function searchProjectTags(string $projectName, string $json, array $parameters = []): MeshRequest
    {

    }

    public function searchProjectTagsRaw(string $projectName, string $json): MeshRequest
    {

    }

    public function searchMicroschemas(string $json, array $parameters = []): MeshRequest
    {

    }

    public function searchMicroschemasRaw(string $json): MeshRequest
    {

    }

    public function invokeIndexClear(): MeshRequest
    {

    }

    public function invokeIndexSync(): MeshRequest
    {

    }

    public function searchStatus(): MeshRequest
    {

    }

    // Project methods

    public function findProjectByUuid(string $uuid, array $parameters = []): MeshRequest
    {

    }

    public function findProjectByName(string $name, array $parameters = []): MeshRequest
    {

    }

    public function findProjects(array $parameters = []): MeshRequest
    {

    }

    public function assignLanguageToProject(string $projectUuid, string $languageUuid): MeshRequest
    {

    }

    public function unassignLanguageFromProject(string $projectUuid, string $languageUuid): MeshRequest
    {

    }

    public function createProject($request): MeshRequest
    {

    }

    public function createProjectWithUuid(string $uuid, $request): MeshRequest
    {

    }

    public function updateProject(string $uuid, $request): MeshRequest
    {

    }

    public function deleteProject(string $uuid): MeshRequest
    {

    }

    // GraphQL Methods

    public function graphQL(string $project, string $query): MeshRequest
    {

    }

    // Role Mehotds

    public function findRoleByUuid(string $uuid, array $parameters = []): MeshRequest
    {

    }

    public function findRoles(array $parameters = []): MeshRequest
    {

    }

    public function createRole($request): MeshRequest
    {

    }

    public function createRoleWithUuid(string $uuid, $request): MeshRequest
    {

    }

    public function deleteRole(string $uuid): MeshRequest
    {

    }

    public function findRolesForGroup(string $groupUuid, array $parameters = []): MeshRequest
    {

    }

    public function updateRolePermissions(string $roleUuid, string $pathToElement, $request): MeshRequest
    {

    }

    public function readRolePermissions(string $roleUuid, string $pathToElement): MeshRequest
    {

    }

    public function updateRole(string $uuid, $restRole): MeshRequest
    {

    }

    // Auth Methods

    public function login(): MeshRequest
    {

    }

    public function logout(): MeshRequest
    {

    }

    public function me(): MeshRequest
    {
        return $this->buildRequest("GET", "/auth/me");
    }

    // Branch Methods

    public function createBranch(string $projectName, $branchCreateRequest, array $parameters = []): MeshRequest
    {

    }

    public function createBranchWithUuid(string $projectName, string $uuid, $branchCreateRequest, array $parameters = []): MeshRequest
    {

    }

    public function findBranchByUuid(string $projectName, string $branchUuid, array $parameters = []): MeshRequest
    {

    }

    public function findBranches(string $projectName, array $parameters = []): MeshRequest
    {

    }

    public function updateBranch(string $projectName, string $branchUuid, $request): MeshRequest
    {

    }

    public function getBranchSchemaVersions(string $projectName, string $branchUuid): MeshRequest
    {

    }

    public function assignBranchSchemaVersions(string $projectName, string $branchUuid, $schemaVersionReferences): MeshRequest
    {

    }

    public function getBranchMicroschemaVersions(string $projectName, string $branchUuid): MeshRequest
    {

    }

    public function assignBranchMicroschemaVersions(string $projectName, string $branchUuid,
        $microschemaVersionReferences): MeshRequest {

    }

    public function migrateBranchSchemas(string $projectName, string $branchUuid): MeshRequest
    {

    }

    public function migrateBranchMicroschemas(string $projectName, string $branchUuid): MeshRequest
    {

    }

    // API Info Methods

    public function getApiInfo(): MeshRequest
    {

    }

    public function getRAML(): MeshRequest
    {

    }

    // Job Methods

    public function findJobs(array $parameters = []): MeshRequest
    {

    }

    public function findJobByUuid(string $uuid): MeshRequest
    {

    }

    public function deleteJob(string $uuid): MeshRequest
    {

    }

    public function resetJob(string $uuid): MeshRequest
    {

    }

    public function invokeJobProcessing(): MeshRequest
    {

    }

    // Schema Methods

    public function createSchema($request): MeshRequest
    {

    }

    public function findSchemaByUuid(string $uuid, array $parameters = []): MeshRequest
    {

    }

    public function updateSchema(string $uuid, $request, array $parameters = []): MeshRequest
    {

    }

    public function diffSchema(string $uuid, $request): MeshRequest
    {

    }

    public function deleteSchema(string $uuid): MeshRequest
    {

    }

    public function findSchemas(array $parameters = []): MeshRequest
    {

    }

    public function findProjectSchemas(string $projectName, array $parameters = []): MeshRequest
    {

    }

    public function findMicroschemas(array $parameters = []): MeshRequest
    {

    }

    public function applyChangesToSchema(string $uuid, $changes): MeshRequest
    {

    }

    public function assignSchemaToProject(string $projectName, string $schemaUuid): MeshRequest
    {

    }

    public function unassignSchemaFromProject(string $projectName, string $schemaUuid): MeshRequest
    {

    }

    public function assignMicroschemaToProject(string $projectName, string $microschemaUuid): MeshRequest
    {

    }

    public function unassignMicroschemaFromProject(string $projectName, string $microschemaUuid): MeshRequest
    {

    }

    public function findProjectMicroschemas(string $projectName, array $parameters = []): MeshRequest
    {

    }

    // Microschema Methods

    public function createMicroschema($request): MeshRequest
    {

    }

    public function findMicroschemaByUuid(string $uuid, array $parameters = []): MeshRequest
    {

    }

    public function updateMicroschema(string $uuid, $request, array $parameters = []): MeshRequest
    {

    }

    public function deleteMicroschema(string $uuid): MeshRequest
    {

    }

    public function applyChangesToMicroschema(string $uuid, $changes): MeshRequest
    {

    }

    public function diffMicroschema(string $uuid, $request): MeshRequest
    {

    }

    // Binary Field Methods

    public function updateNodeBinaryField(string $projectName, string $nodeUuid, string $languageTag, string $nodeVersion,
        string $fieldKey, $fileData, string $fileName, string $contentType, array $parameters = []): MeshRequest {

    }

    public function downloadBinaryField(string $projectName, string $nodeUuid, string $languageTag, string $fieldKey,
        array $parameters = []): MeshRequest {

    }

    public function transformNodeBinaryField(string $projectName, string $nodeUuid, string $languageTag, string $version,
        string $fieldKey, $imageManipulationParameter): MeshRequest {

    }

    // Utility Methods

    public function resolveLinks(string $body, array $parameters = []): MeshRequest
    {

    }

    public function validateSchema($schema): MeshRequest
    {

    }

    public function validateMicroschema($microschema): MeshRequest
    {

    }

    // Webroot Methods

    public function webroot(string $project, string $path): MeshRequest
    {

    }

}

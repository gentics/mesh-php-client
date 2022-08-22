<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface UsersMethodsInterface
{
    /**
     * Load a specific user by uuid.
     *
     * @param uuid
     * @param parameters
     * @return
     */
    public function findUserByUuid(string $uuid, array $parameters = []): MeshRequest;

    /**
     * Load multiple users.
     *
     * @param parameters
     * @return
     */
    public function findUsers(array $parameters = []): MeshRequest;

    /**
     * Create a new user.
     *
     * @param request
     * @param parameters
     * @return
     */
    public function createUser($request, array $parameters = []): MeshRequest;

    /**
     * Create a new user using the provided uuid.
     *
     * @param uuid
     * @param request
     * @param parameters
     * @return
     */
    public function createUserWithUuid(string $uuid, $request, array $parameters = []): MeshRequest;

    /**
     * Update the user.
     *
     * @param uuid
     *            User uuid
     * @param request
     * @param parameters
     * @return
     */
    public function updateUser(string $uuid, $request, array $parameters = []): MeshRequest;

    /**
     * Delete the user.
     *
     * @param uuid
     *            User uuid
     * @return
     */
    public function deleteUser(string $uuid);

    /**
     * Find users that were assigned to a specific group.
     *
     * @param groupUuid
     * @param parameters
     * @return
     */
    public function findUsersOfGroup(string $groupUuid, array $parameters = []): MeshRequest;

    /**
     * Read the user permissions for the given path.
     *
     * @param uuid
     *            User uuid
     * @param pathToElement
     *            Path to the element
     * @return
     */
    public function readUserPermissions(string $uuid, string $pathToElement): MeshRequest;

    /**
     * Fetch a new user token for the user with the given uuid. Note that any previously fetched token for that particular user will be invalidated by this
     * action.
     *
     * @param userUuid
     *            User uuid
     * @return
     */
    public function getUserResetToken(string $userUuid): MeshRequest;

    /**
     * Generate a new API key for the user. The key is valid until a new key is generated. Generating a new key will invalidate the previously generated
     * one.
     *
     * @param userUuid
     *            User uuid
     * @return
     */
    public function issueAPIKey(string $userUuid): MeshRequest;

    /**
     * Invalidate the currently active API token.
     *
     * @param userUuid
     * @return
     */
    public function invalidateAPIToken(string $userUuid): MeshRequest;
}

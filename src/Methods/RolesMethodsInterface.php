<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface RolesMethodsInterface
{
    /**
     * Load the role.
     *
     * @param uuid
     *            Uuid of the role to be loaded
     * @param parameters
     * @return
     */
    public function findRoleByUuid(string $uuid, array $parameters = []): MeshRequest;

    /**
     * Load multiple roles.
     *
     * @param parameter
     * @return
     */
    public function findRoles(array $parameters = []): MeshRequest;

    /**
     * Create a new role.
     *
     * @param request
     * @return
     */
    public function createRole($request): MeshRequest;

    /**
     * Create a new role using the provided uuid.
     *
     * @param request
     * @param uuid
     * @return
     */
    public function createRoleWithUuid(string $uuid, $request): MeshRequest;

    /**
     * Delete the role.
     *
     * @param uuid
     * @return
     */
    public function deleteRole(string $uuid): MeshRequest;

    /**
     * Load multiple roles that were assigned to the given group.
     *
     * @param groupUuid
     *            Uuid of the group
     * @param parameter
     * @return
     */
    public function findRolesForGroup(string $groupUuid, array $parameters = []): MeshRequest;

    /**
     * Update the role permissions for the the given path.
     *
     * @param roleUuid
     *            Role to which the permissions should be updated
     * @param pathToElement
     *            Path to an element or an aggregation element. Example: projects/20f2af58befb4e64b2af58befbce64fd
     * @param request
     *            Request that defines how the permissions should be changed
     * @return
     */
    public function updateRolePermissions(string $roleUuid, string $pathToElement, $request): MeshRequest;

    /**
     * Read the role permissions for the given path.
     *
     * @param roleUuid
     * @param pathToElement
     * @return
     */
    public function readRolePermissions(string $roleUuid, string $pathToElement): MeshRequest;

    /**
     * Update the role using the given update request.
     *
     * @param uuid
     * @param restRole
     * @return
     */
    public function updateRole(string $uuid, $restRole): MeshRequest;
}

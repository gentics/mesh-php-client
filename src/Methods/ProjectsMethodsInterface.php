<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface ProjectsMethodsInterface
{
    /*
     * Load the given project.
     *
     * @param uuid
     * @param parameters
     * @return
     */
    public function findProjectByUuid(string $uuid, array $parameters = []): MeshRequest;

    /**
     * Find the project using the specified name.
     *
     * @param name
     * @param parameters
     * @return
     */
    public function findProjectByName(string $name, array $parameters = []): MeshRequest;

    /**
     * Load multiple projects.
     *
     * @param parameters
     * @return
     */
    public function findProjects(array $parameters = []): MeshRequest;

    /**
     * Assign language to the project.
     *
     * @param projectUuid
     * @param languageUuid
     * @return
     */
    public function assignLanguageToProject(string $projectUuid, string $languageUuid): MeshRequest;

    /**
     * Unassign the given language from the project.
     *
     * @param projectUuid
     * @param languageUuid
     * @return
     */
    public function unassignLanguageFromProject(string $projectUuid, string $languageUuid): MeshRequest;

    /**
     * Create a new project.
     *
     * @param request
     * @return
     */
    public function createProject($request): MeshRequest;

    /**
     * Create a new project using the provided uuid.
     *
     * @param uuid
     * @param request
     * @return
     */
    public function createProjectWithUuid(string $uuid, $request): MeshRequest;

    /**
     * Update the project.
     *
     * @param uuid
     *            Uuid of the project
     * @param request
     * @return
     */
    public function updateProject(string $uuid, $request): MeshRequest;

    /**
     * Delete the project.
     *
     * @param uuid
     *            Uuid of the project
     * @return
     */
    public function deleteProject(string $uuid): MeshRequest;
}

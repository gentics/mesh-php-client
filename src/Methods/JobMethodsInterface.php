<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface JobMethodsInterface
{

    /**
     * Load multiple jobs.
     *
     * @param parameters
     * @return
     */
    public function findJobs(array $parameters = []): MeshRequest;

    /**
     * Load a specific job.
     *
     * @param uuid
     *            Job uuid.
     * @return
     */
    public function findJobByUuid(string $uuid): MeshRequest;

    /**
     * Delete the specific job. Please note that only failed jobs can be deleted.
     *
     * @param uuid
     * @return
     */
    public function deleteJob(string $uuid): MeshRequest;

    /**
     * Reset the error state of the job. This will enable the job to be executed once again.
     *
     * @param uuid
     * @return
     */
    public function resetJob(string $uuid): MeshRequest;

    /**
     * Manually invoke the job processing.
     *
     * @return
     */
    public function invokeJobProcessing(): MeshRequest;
}

<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface AdminPluginMethodsInterface
{

    /**
     * Return the Gentics Mesh server status.
     *
     * @return
     */
    public function meshStatus(): MeshRequest;
    /**
     * Return the Gentics Mesh cluster status.
     *
     * @return
     */
    public function clusterStatus(): MeshRequest;

    /**
     * Invoke a graph database backup.
     *
     * @return
     */
    public function invokeBackup(): MeshRequest;

    /**
     * Invoke a graph database restore.
     *
     * @return
     */
    public function invokeRestore(): MeshRequest;

    /**
     * Invoke a consistency check of the graph database.
     *
     * @return
     */
    public function checkConsistency(): MeshRequest;

    /**
     * Invoke a consistency check and repair of the graph database.
     *
     * @return
     */
    public function repairConsistency(): MeshRequest;

}

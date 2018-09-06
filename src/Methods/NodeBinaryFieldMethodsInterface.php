<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface NodeBinaryFieldMethodsInterface
{

    /**
     * Update the binary field for the node with the given nodeUuid in the given project using the provided data buffer.
     *
     * @param projectName
     *            Name of the project which contains the node
     * @param nodeUuid
     *            Uuid of the node
     * @param languageTag
     *            Language tag of the node
     * @param nodeVersion
     *            Node version
     * @param fieldKey
     *            Key of the field which holds the binary data
     * @param fileData
     *            Buffer that serves the binary data
     * @param fileName
     * @param contentType
     * @return
     */
    public function updateNodeBinaryField(
        string $projectName,
        string $nodeUuid,
        string $languageTag,
        string $nodeVersion,
        string $fieldKey,
        $fileData,
        string $fileName,
        string $contentType,
        array $parameters = []
    ) : MeshRequest;

    /**
     * Download the binary field of the given node in the given project.
     *
     * @param projectName
     * @param nodeUuid
     * @param languageTag
     * @param fieldKey
     * @param parameters
     * @return Mesh request which provides a download response that contains a reference to the byte buffer with the binary data
     */
    public function downloadBinaryField(
        string $projectName,
        string $nodeUuid,
        string $languageTag,
        string $fieldKey,
        array $parameters = []
    ) : MeshRequest;

    /**
     * Transform the binary field of the given node in the given project
     *
     * @param projectName
     *            project name
     * @param nodeUuid
     *            UUID of the node
     * @param languageTag
     *            language tag
     * @param version
     *            Node version
     * @param fieldKey
     *            field key
     * @param imageManipulationParameter
     *            parameters for the image transformation
     * @return Mesh request
     */
    public function transformNodeBinaryField(
        string $projectName,
        string $nodeUuid,
        string $languageTag,
        string $version,
        string $fieldKey,
        $imageManipulationParameter
    ) : MeshRequest;
}

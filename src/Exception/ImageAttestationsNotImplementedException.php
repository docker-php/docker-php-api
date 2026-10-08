<?php

declare(strict_types=1);

namespace Docker\API\Exception;

class ImageAttestationsNotImplementedException extends NotImplementedException
{
    /**
     * @var \Docker\API\Model\ErrorResponse
     */
    private $errorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\Docker\API\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('The daemon\'s image backend does not support attestations. This
is returned by the legacy (graphdriver) image store, which does
not preserve OCI image indexes.
');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }

    public function getErrorResponse(): \Docker\API\Model\ErrorResponse
    {
        return $this->errorResponse;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}

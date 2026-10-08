<?php

declare(strict_types=1);

namespace Docker\API\Exception;

abstract class NotImplementedException extends \RuntimeException implements ServerException, WithResponseInterface
{
    public function __construct(string $message)
    {
        parent::__construct($message, 501);
    }
}

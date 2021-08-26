<?php

declare(strict_types=1);

namespace FluencePrototype\Validation;

use Exception;
use Throwable;

/**
 * Class InvalidPropertiesException
 * @package FluencePrototype\Validation
 */
class InvalidPropertiesException extends Exception
{

    private array $errors = [];

    /**
     * InvalidPropertiesException constructor.
     * @param string $message
     * @param array $errors
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', array $errors, Throwable $previous = null)
    {
        parent::__construct($message, 400, $previous);

        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

}
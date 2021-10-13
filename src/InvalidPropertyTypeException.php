<?php

declare(strict_types=1);

namespace FluencePrototype\Validation;

use Exception;
use JetBrains\PhpStorm\Pure;

/**
 * Class InvalidPropertyTypeException
 * @package FluencePrototype\Validation
 */
class InvalidPropertyTypeException extends Exception
{

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    #[Pure] public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
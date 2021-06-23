<?php

declare(strict_types=1);

namespace FluencePrototype\Validation;

use Attribute;

/**
 * Class ErrorMessage
 * @package FluencePrototype\Validation
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class ErrorMessage implements iErrorMessage
{

    /**
     * ErrorMessage constructor.
     * @param string $message
     */
    public function __construct(
        private string $message
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function getMessage(): string
    {
        return $this->message;
    }

}
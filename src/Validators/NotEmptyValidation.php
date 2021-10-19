<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\iValidate;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NotEmptyValidation implements iValidate
{

    public function __construct(
        private string $errorMessage
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function getMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @inheritDoc
     */
    public function validate(array|bool|float|int|null|object|string $value): bool
    {
        if (is_array($value)) {
            return !empty($value) && $value !== null;
        }

        if (is_string($value)) {
            return $value !== '' && $value !== null;
        }

        return $value !== null;
    }

}
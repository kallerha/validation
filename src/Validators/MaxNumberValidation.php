<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\InvalidPropertyTypeException;
use FluencePrototype\Validation\iValidate;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxNumberValidation implements iValidate
{

    public function __construct(
        private string $errorMessage,
        private int    $max
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
     * @throws InvalidPropertyTypeException
     */
    public function validate(array|bool|float|int|null|object|string $value): bool
    {
        if (!is_int($value)) {
            throw new InvalidPropertyTypeException('$value is not an int');
        }

        if ($value > $this->max) {
            return false;
        }

        return true;
    }

}
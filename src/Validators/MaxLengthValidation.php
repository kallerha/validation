<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\InvalidPropertyTypeException;
use FluencePrototype\Validation\iValidate;

/**
 *
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxLengthValidation implements iValidate
{

    /**
     * @param string $errorMessage
     * @param int $maxLength
     */
    public function __construct(
        private string $errorMessage,
        private int    $maxLength
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
        if (!is_string($value)) {
            throw new InvalidPropertyTypeException('$value is not a string');
        }

        if (mb_strlen($value) > $this->maxLength) {
            return false;
        }

        return true;
    }

}
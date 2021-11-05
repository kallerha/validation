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
class MinNumberValidation implements iValidate
{

    /**
     * @param string $errorMessage
     * @param int $min
     */
    public function __construct(
        private string $errorMessage,
        private int    $min
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

        if ($value < $this->min) {
            return false;
        }

        return true;
    }

}
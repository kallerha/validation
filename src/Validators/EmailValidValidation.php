<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\InvalidPropertyTypeException;
use FluencePrototype\Validation\iValidate;

/**
 * Class IsEmail
 * @package FluencePrototype\Validation\Validators
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class EmailValidValidation implements iValidate
{

    /**
     * @param string $errorMessage
     */
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
     * @throws InvalidPropertyTypeException
     */
    public function validate(array|bool|float|int|null|object|string $value): bool
    {
        if (!is_string($value)) {
            throw new InvalidPropertyTypeException('$value is not a string');
        }

        return filter_var(value: $value, filter: FILTER_VALIDATE_EMAIL, options: FILTER_FLAG_EMAIL_UNICODE);
    }

}
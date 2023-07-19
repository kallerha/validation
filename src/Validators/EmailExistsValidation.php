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
class EmailExistsValidation implements iValidate
{

    /**
     * @param string $errorMessage
     */
    public function __construct(
        private string $errorMessage
    )
    {
    }

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

        return checkdnsrr(hostname: substr(string: $value, offset: strpos(haystack: $value, needle: '@') + 1));
    }

}
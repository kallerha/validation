<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\InvalidPropertyTypeException;
use FluencePrototype\Validation\iValidate;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NameValidation implements iValidate
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
     * @throws InvalidPropertyTypeException
     */
    public function validate(array|bool|float|int|null|object|string $value): bool
    {
        if (!is_string($value)) {
            throw new InvalidPropertyTypeException('$value is not a string');
        }

        if (str_contains($value, '- ')) {
            return false;
        }

        if (str_contains($value, ' -')) {
            return false;
        }

        if (!ctype_alpha(str_replace([' ', '-', 'æ', 'ø', 'å', 'Æ', 'Ø', 'Å'], '', $value))) {
            return false;
        }

        return true;
    }

}
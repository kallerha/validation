<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\iValidate;

/**
 * Class IsEmail
 * @package FluencePrototype\Validation\Validators
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class EmailValidation implements iValidate
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
    public function validate(bool|float|int|null|string $value): bool
    {
        if (!filter_var(value: $value, filter: FILTER_VALIDATE_EMAIL, options: FILTER_FLAG_EMAIL_UNICODE)) {
            return false;
        }

        return checkdnsrr(hostname: substr(string: $value, offset: strpos(haystack: $value, needle: '@') + 1));
    }

}
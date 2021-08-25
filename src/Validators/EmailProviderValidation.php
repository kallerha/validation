<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\iValidate;

#[Attribute(Attribute::TARGET_PROPERTY)]
class EmailProviderValidation implements iValidate
{

    public function __construct(
        private string $errorMessage
    )
    {
    }

    public function getMessage(): string
    {
        return $this->errorMessage;
    }

    public function validate(float|bool|int|string|null $value): bool
    {
        return !checkdnsrr(substr($value, strpos($value, '@') + 1));
    }

}
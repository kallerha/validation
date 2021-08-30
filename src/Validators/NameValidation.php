<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\iValidate;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NameValidation implements iValidate
{

    /**
     * @inheritDoc
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

    public function validate(float|bool|int|string|null $value): bool
    {
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
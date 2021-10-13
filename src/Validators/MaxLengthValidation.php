<?php

declare(strict_types=1);

namespace FluencePrototype\Validation\Validators;

use Attribute;
use FluencePrototype\Validation\iValidate;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxLengthValidation implements iValidate
{

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
     */
    public function validate(float|bool|int|string|null $value): bool
    {
        if (mb_strlen($value) > $this->maxLength) {
            return true;
        }

        return false;
    }

}
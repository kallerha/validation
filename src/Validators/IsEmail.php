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
class IsEmail implements iValidate
{

    /**
     * @inheritDoc
     */
    public function validate(bool|float|int|null|string $value): bool
    {
        return (bool)filter_var(value: $value, filter: FILTER_VALIDATE_EMAIL);
    }

}
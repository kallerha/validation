<?php

declare(strict_types=1);

namespace FluencePrototype\Validation;

/**
 * Interface iValidate
 * @package FluencePrototype\Validation
 */
interface iValidate
{

    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @param bool|float|int|string|null $value
     * @return bool
     */
    public function validate(array|bool|float|int|null|object|string $value): bool;

}
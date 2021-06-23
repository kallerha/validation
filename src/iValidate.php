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
     * @param bool|float|int|string|null $value
     * @return bool
     */
    public function validate(bool|float|int|null|string $value): bool;

}
<?php

declare(strict_types=1);

namespace FluencePrototype\Validation;

use ReflectionObject;

/**
 * Class ValidationService
 * @package FluencePrototype\Validation
 */
class ValidationService
{

    /**
     * @param object $model
     * @return array
     */
    public function validate(object $model): array
    {
        $results = [];
        $reflectionModel = new ReflectionObject(object: $model);

        foreach ($reflectionModel->getProperties() as $property) {
            if (empty($property->getAttributes())) {
                continue;
            }

            $property->setAccessible(accessible: true);
            $value = $property->getValue(object: $model);
            $property->setAccessible(accessible: false);

            foreach ($property->getAttributes() as $validator) {
                /** @var iValidate $validation */
                $validation = $validator->newInstance();

                if (!$validation->validate(value: $value)) {
                    $results[basename($reflectionModel->getName())][$property->getName()][] = $validation->getMessage();
                }
            }
        }

        return $results;
    }

}
<?php

declare(strict_types=1);

namespace FluencePrototype\Validation;

use ReflectionException;
use ReflectionObject;

/**
 * Class ValidationService
 * @package FluencePrototype\Validation
 */
class ValidationService
{

    /**
     * @param object ...$models
     * @return array
     */
    public function validate(object...$models): array
    {
        $results = [];

        try {
            foreach ($models as $model) {
                $reflectionModel = new ReflectionObject(object: $model);

                foreach ($reflectionModel->getProperties() as $property) {
                    if (empty($property->getAttributes())) {
                        continue;
                    }

                    $property->setAccessible(accessible: true);
                    $value = $property->getValue(object: $model);
                    $property->setAccessible(accessible: false);

                    foreach ($property->getAttributes() as $attribute) {
                        $validate = $attribute->newInstance();

                        if ($validate instanceof iValidate &&
                            !$validate->validate(value: $value) &&
                            !isset($results[$property->getName()])) {
                            $results[$property->getName()] = $validate->getMessage();
                        }
                    }
                }
            }
        } catch (ReflectionException) {
        }

        return $results;
    }

}
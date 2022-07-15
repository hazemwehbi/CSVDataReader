<?php

namespace Hazem\CSVDataUploader\Validator;

interface ValidatorInterface
{
    public function getName(): string;

    /**
     * @param mixed $value
     * @param array $options
     * @return void
     * @throws InvalidValueException
     */
    public function validate($value, array $options): void;
}

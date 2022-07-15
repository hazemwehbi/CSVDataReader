<?php

namespace Hazem\CSVDataUploader\Validator;

interface ValidatorManagerInterface
{
    /**
     * @param mixed $value
     * @param array $validatorStack
     * @return void
     */
    public function validate($value, array $validatorStack): void;
    public function getValidator(string $name): ValidatorInterface;
}

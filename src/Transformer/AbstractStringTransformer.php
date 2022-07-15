<?php

namespace Hazem\CSVDataUploader\Transformer;

abstract class AbstractStringTransformer implements TransformerInterface
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function transform($value)
    {
        if (!\is_string($value)) {
            throw new \InvalidArgumentException('Expected string');
        }
        return $this->doTransform((string)$value);
    }
    // abstract function which return value depend on the called object
    abstract protected function doTransform(string $value): string;
}

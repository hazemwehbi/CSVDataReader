<?php

use Hazem\CSVDataUploader\Transformer\StringLowerTransformer;
use Hazem\CSVDataUploader\Transformer\StringUcfirstTransformer;
use Hazem\CSVDataUploader\Transformer\TransformerManager;
use Hazem\CSVDataUploader\Transformer\TransformerManagerInterface;
use PHPUnit\Framework\TestCase;

class TransformerTest extends TestCase
{
    private static TransformerManagerInterface $transformerManager;

    public static function setUpBeforeClass(): void
    {
        self::$transformerManager = new TransformerManager();
        self::$transformerManager->addTransformer(new StringLowerTransformer());
        self::$transformerManager->addTransformer(new StringUcfirstTransformer());
    }

    public function testLower(): void
    {
        $str = 'WEHBI';
        $transformed = self::$transformerManager->transform($str, ['lower']);
        self::assertEquals('wehbi', $transformed);
    }

    public function testUcfirst(): void
    {
        $str = 'hazem';
        $transformed = self::$transformerManager->transform($str, ['ucfirst']);
        self::assertEquals('Hazem', $transformed);
    }
}

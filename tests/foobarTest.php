<?php

use Hazem\CSVDataUploader\foobar;
use PHPUnit\Framework\TestCase;

class foobarTest extends TestCase
{

    public function testFoobar(): void
    {
    	$foobar = new foobar();
        $str = 5;
        $res = $foobar->foobarCall($str);
        self::assertEquals('1, 2, foo, 4, bar, ', $res);
    }

}

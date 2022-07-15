<?php
namespace Hazem\CSVDataUploader;
/*
 * Create a PHP script that is executed form the command line. The script should:
• Output the numbers from 1 to 100
• Where the number is divisible by three (3) output the word “foo”
• Where the number is divisible by five (5) output the word “bar”
• Where the number is divisible by three (3) and (5) output the word “foobar”
• Only be a single PHP file
 * */

final class foobar
{
    private string $output;

    public function __construct()
    {
        $this->output = "";
    }

    public function foobarCall(int $limit): string
    {
	for ($i = 1; $i <= $limit; $i++){

	    if ($i % 3 == 0){
		$this->output .= "foo";
		if ($i % 5 == 0){
		    $this->output .= "bar, ";
		}else{
		    $this->output .= ", ";
		}
	    } elseif ($i % 5 == 0){
		$this->output .= "bar, ";
	    }else {
		$this->output .= $i;
		$this->output .= ", ";
	    }

	}
       return $this->output;
    }
    

}

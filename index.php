<?php 


function print_error($err){ //print to file
		//Set Path for file output
		$Path =  __DIR__ .'\logs\access-error-log.txt' ; 
		
		// Create directory and file if neither exist disk.
		if(!file_exists(dirname($Path))) {
		  mkdir(dirname($Path), 0700, true);
		}
		
		//Open log file
		$error_log = fopen($Path, "a+"); //open error log from directory
		
		//Store new log content
		fwrite($error_log, $err); //log error to file
		fclose($error_log);//close file	access
}

print_error("hellol 123");
echo "done printing.";

?>
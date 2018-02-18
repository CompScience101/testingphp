<?php 
function print_error($err){ //print to file
	try{
		$status = "successfully printed to file.";
		//Set Path for file output
		$Path =  System.getenv("OPENSHIFT_DATA_DIR").'\logs\access-error-log.txt' ; 
		
		// Create directory and file if neither exist disk.
		if(!file_exists(dirname($Path))) {
		  mkdir(dirname($Path), 0700, true);
		}
		
		//Open log file
		$error_log = fopen($Path, "a+"); //open error log from directory
				
		//Store new log content
		fwrite($error_log, $err); //log error to file
		fclose($error_log);//close file	access
	 //catch exceptioncatch
	}catch(Exception $e) {
		$status = 'Error printing to file, Error Message: ' .$e->getMessage();
	}
	finally{
		echo $status;
	}
}

print_error("hellol 123");

?>

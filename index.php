<?php 
//Set Path for file output
define('PATH', __DIR__ .'\logs\access-error-log.txt');// WORKS!, authentication from commandline, includes refresh token.

//Print to file
print_error("hello world 123456");
//Open file 
open_file();	

	function print_error($err){ //print to file
		try{
			$status = "successfully printed to file."; 
			
			// Create directory and file if neither exist disk.
			if(!file_exists(dirname(PATH))) {
			  mkdir(dirname(PATH), 0700, true);
			}
			
			//Open log file
			$error_log = fopen(PATH, "a+"); //open error log from directory
					
			//Store new log content
			fwrite($error_log, $err); //log error to file
			fclose($error_log);//close file	access
		 //catch exception catch
		}catch(Exception $e) {
		  echo 'Error printing to file, Error Message: ' .$e->getMessage();
		}
		finally{
			echo $status;
		}
	}

	function open_file(){
		try{
			$myfile = fopen(PATH, "r"); 
			//or die("Unable to open file!");
			// Output one line until end-of-file
			while(!feof($myfile)) {
			  echo "<br>". fgets($myfile) . "<br>";
			}
			fclose($myfile);	
		}catch(Exception $e) {
		  echo 'Error opening file, Error Message: ' .$e->getMessage();
		}
		finally{
			echo $status;
		}
	}

?>

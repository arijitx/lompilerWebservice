

<?php 
header("Access-Control-Allow-Origin: *");
	//ini_set('display_startup_errors',1);
	//ini_set('display_errors',1);
	//error_reporting(-1);
	$outputA=array('status'=>'none','output'=>'none');
		$date=time();
		$input=$_POST['input'];
		
	 	
    	if(isset($_POST['code'])){//&&isset($_POST['lang'])) { //only do file operations when appropriate
    		
        	$code = $_POST['code'];
        	$lang = $_POST['lang'];
        	

        	$user="Admin";
        	$inputFileName=$user.$date.'.txt';
        	if($lang=='c')
        	$filename=$user.$date.'.c';
        	if($lang=='cpp')
        		$filename=$user.$date.'.cpp';
        	if($lang=='java')
        	{
        		$filename=$user.$date.'.java';
        		
        	}
        	
        	$myfile = fopen($filename, "w") or die("Unable to open file!");
        	$inputFile=fopen($inputFileName,"w");
        	fwrite($inputFile,$input);
        	fclose($inputFile);
        	if(strpos($code,"no"))
        	{
        		
        		$ouputA['status']='System Used In Code';
        		
        	}
        	
        	else
        	{
			fwrite($myfile, $code);

			fclose($myfile);
			if($lang=='c')
			exec('gcc '.$filename.' -o '.$user.$date.' 2>&1', $outputErr, $return_value);
			if($lang=='cpp')
				exec('g++ '.$filename.' -o '.$user.$date.' 2>&1', $outputErr, $return_value);
			if($lang=='java')
				exec('javac '.$filename.' 2>&1',$outputErr,$return_value);
			exec('chmod 777 '.$filename);
			
			$return_value == 0 ? $comp=1: $comp=0;
			if($return_value!=0){
			
			//Compilation err
			$outputA['status']='Compilation Err';
			$outputA['output']=$outputErr;
			//echo "<textarea rows='6' cols='80'>";
			//echo 'ERROR: ' . PHP_EOL . implode(PHP_EOL, $outputErr);
			//echo "</textarea>";
			}
			if($return_value==0){
				
				
    			exec('chmod 777 '.$user.$date);
    			
    			$inputFile=$user.$date.'.txt';
    			exec ('chmod 777 '.$inputFile);
    			$file = fopen($inputFile, "w") or die("Unable to open file!");
    			fwrite($file, $input);

				fclose($file);
    			if($lang=='java')
    				exec('java '.'Solution'.'<'.$inputFileName,$output, $return_value);
    			else
				exec('./'.$user.$date.'<'.$inputFileName, $output, $return_value);
				
				$outputA['status']='OK';
				$outputA['output']=PHP_EOL . implode(PHP_EOL, $output);
				//echo "<textarea rows='4' cols='80'>";
				//echo PHP_EOL . implode(PHP_EOL, $output);
				//echo "</textarea>";

			}

			unlink($filename);
			unlink($user.$date);
			unlink($inputFileName);
			unlink('Solution.class');

			}
		}
	header('Content-Type: application/json');
	echo json_encode($outputA);	
?>
	
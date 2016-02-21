<?php

   /* script name: convert
      description: Reads in a cSV file and outputs a tab-delimited file, the 
      CSV file must have a CSV extension
  
   */

    $myfile = "testing";
    function convert($filename) {
    	// @ operator, which suppress the erors with the commands.
    	if (@$fh_in = fopen("{$filename}.csv", "r")) { 
    		$fh_out = fopen("{$filename}.tsv", "a");
    		while (!feof($fh_in))
    		{
    			$line = fgetcsv($fh_in, 1024);
    			if ($line[0] == "") 
    			{
    				fwrite($fh_out, "\n");
    			}
    			else 
    			{
    				fwrite($fh_out, implode($line, "\t")."\n");
    			}
    		}

    		fclose($fh_in);
    		fclose($fh_out);
    	}
    	else 
    	{
    		echo "File does not exist!";
    		return false;
    	}

    	echo "Conversion completeted!\n";
    	return true;
	}

	convert($myfile);
?>
<?php
 $error = ""; //error holder   
$post = $_POST;   
      $file_folder = "../docs/";
       // folder to load files  
      if(extension_loaded('zip'))  
      {   
           // Checking ZIP extension is available  
           if(isset($post['files']) and count($post['files']) > 0)  
           {   
           	
           	

                // Checking files are selected  
                $zip = new ZipArchive(); // Load zip library   
                $zip_name = time().".zip"; 
                          // Zip name  

                if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)  
                {   
                	echo "zip error";
                     // Opening zip file to load files  
                     $error .= "* Sorry ZIP creation failed at this time";  
                }  
                foreach($post['files'] as $file)  
                {   
                     $zip->addFile($file_folder.$file); // Adding files into zip  
                }  
                $zip->close();  
                if(file_exists($zip_name))  
                {  
                	
                     // push to download the zip  
                     header('Content-type: application/zip');  
                     header('Content-Disposition: attachment; filename="'.$zip_name.'"');  
                     readfile($zip_name);  
                     // remove zip file is exists in temp path  
                     unlink($zip_name);  
                }  
           }  
           else  
           {  
                $error .= "* Please select file to zip ";  
           }  
      }  
      else  
      {  
           $error .= "* You dont have ZIP extension";  
      } 
echo $error;
 ?>
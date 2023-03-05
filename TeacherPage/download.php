<?php
	$file = './StudentPage/Homework/'.$_GET['user'];

   	$title=$_GET['user'];

    header("Pragma: public");
    header('Content-disposition: attachment; filename='.$title);
  
    
    header('Content-Transfer-Encoding: binary');
  
   
    ob_clean();
    flush();

   
        readfile($file);
    
	?>
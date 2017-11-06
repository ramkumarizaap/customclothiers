<?php
	if(isset($_FILES['file'])) 
	{

	  if(file_exists("../assets/carousel/".$_POST["filename"]))	
	  {
	  	unlink("../assets/carousel/".$_POST["filename"]);
	  }
		if(move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/carousel/".$_POST["filename"])) 
		{
			echo 'Upload Success';
		} 
		else 
		{
			echo '#Fail';
		}
	} 

?>
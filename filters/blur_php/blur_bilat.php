<?php
	session_start();
	$cmd='python ../blur_py/blur_bilat.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);
	if(!empty($cout))
	{
		if(!(strcasecmp($cout,'failed')==0))
		{
			//set session variables for use in display.php
			$_SESSION['title']='Image Smoothing';
			$_SESSION['filter']='After Bilateral Filtering';
			$_SESSION['outimg']='images/'.$cout;
			
			//call display.php
			header('Location: ../../display.php');
		}
	}
	else header('Location: ../../disp_fail.php');
?>
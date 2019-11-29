<?php
	session_start();
	$cmd='python ../noise_reduc_py/noise_reduc.py "'.$_SESSION['fname'].'" '.$_SESSION['fext'];
	$cout=shell_exec($cmd);

	if(!(strcasecmp($cout,'failed')==0))
	{
		//set session variables for use in display.php
		$_SESSION['title']='Noise Reduction';
		$_SESSION['filter']='After Noise Reduction';
		$_SESSION['outimg']='images/'.$cout;

		//call display.php
		header('Location: ../../display.php');
	}
?>
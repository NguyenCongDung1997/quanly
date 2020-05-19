<?php
// Kết nối DATABASE
	$db=new mysqli("localhost","root","","school1");
	if(!$db)
	{
		echo "failed";
	}
	
?>
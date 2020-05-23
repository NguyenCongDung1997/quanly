<?php
// Kết nối DATABASE
	$db=new mysqli("localhost","root","","school1");
	
	mb_language('uni');
	mb_internal_encoding('UTF-8');
	if(!$db)
	{
		echo "failed";
	}
	
?>
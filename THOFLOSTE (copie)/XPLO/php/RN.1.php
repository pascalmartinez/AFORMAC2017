<?php
	$oriname=$_POST['oriname'];
	$newname=$_POST['newname'];

	$newnamefull=$oriname.$newname;

	$cmdrename='mv '.$oriname.' '.$newnamefull;

	shell_exec($cmdrename);

	echo "$cmdrename";
?>

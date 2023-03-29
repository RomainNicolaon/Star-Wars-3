<?php
    $host = "145.14.156.192";
	$dbUsername = "u944545200_grp3";
	$dbPassword = "Grp3cefim";
	$dbName = "u944545200_cefim";
    $con = mysqli_connect($host, $dbUsername, $dbPassword, $dbName) or die("Connection failed: %s\n". $con -> error);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>

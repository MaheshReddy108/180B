<?php

if(isset($_POST['submit'])){
	
	include_once 'dbh.inc.php';
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
	
	
	$sql="SELECT * FROM users WHERE user_uid='$uid'";
	$result=mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	
	if($resultCheck > 0){
		
		header("Location: ../signup.php?signup=usertaken");
		exit();
	}
	else{
		
		$hashedPwd =password_hash($pwd,PASSWORD_DEFAULT);
		
		 $sql="INSERT INTO users(user_uid,user_pwd) VALUES ('$uid','$hashedPwd');";
		 
		 mysqli_query($conn,$sql);
		 header("Location: ../signup.php?signup=success");
		exit();
		 
	}
	
	
}
else {
	header("Location: ../signup.php");
	exit();
}
	
<?php
	$name="";
	$mail="";
	$date="";
	$people="";
	$time="";
	$phone="";
	$message="";
	$db=mysql_connect('localhost' , 'root' , '' , 'boooking');

	if(isset($_POST['book'])){
		$name=mysql_real_escape_string($_POST['name']);
		$mail=mysql_real_escape_string($_POST['email']);
		$date=mysql_real_escape_string($_POST['ddate']);
		$people=mysql_real_escape_string($_POST['people']);
		$time=mysql_real_escape_string($_POST['dtime']);
		$phone=mysql_real_escape_string($_POST['phone']);
		$message=mysql_real_escape_string($_POST['message']);
		$sql="INSERT INTO bookinginfo (name,email,bookdate,booktime,phone,people,message) VALUES ('$name','$mail','$date','$time','$phone','$people','$message')";
		mysqli_query($db,$sql);
	}
	else if(isset($_POST['cancel'])){
		$name=mysql_real_escape_string($_POST['name']);
		$mail=mysql_real_escape_string($_POST['email']);
		$date=mysql_real_escape_string($_POST['ddate']);
		$people=mysql_real_escape_string($_POST['people']);
		$time=mysql_real_escape_string($_POST['dtime']);
		$phone=mysql_real_escape_string($_POST['phone']);
		$message=mysql_real_escape_string($_POST['message']);

		$result=mysql_query("select * from bookinginfo where name=$name and phone=$phone")
			or die("Failed to query database".mysql_error());

		$row=mysql_fetch_array($result);
		$sql="DELETE FROM bookinginfo WHERE name='$row['name']' AND phone='$row['phone']'";
		mysqli_query($db,$sql);
	}
	
?>
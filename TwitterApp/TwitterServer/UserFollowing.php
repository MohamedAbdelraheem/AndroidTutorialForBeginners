<?php
 // 1- connect to db
$host="127.0.0.1";
$user="root";
$password="12345";
$database="twitter";
$connect=  mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno())
{ die("cannot connect to database field:". mysqli_connect_error());   }
 // define quesry 
if($_GET['op']==1) //op=1 add, op=2 delete
// add folllowing
{$query="insert into following(user_id,following_user_id) values (" . $_GET['user_id']. ","  . $_GET['following_user_id'] . ")";  // $usename=$_GET['username'];
}
else{ // remove following
$query="delete from following where user_id=" . $_GET['user_id']. " and following_user_id="  . $_GET['following_user_id']  ; 	
}
$result=  mysqli_query($connect, $query);
if(! $result)
{$output ="{'msg':'fail'}";
}
else {
$output ="{'msg':'following is updated'}";
}
 
print( $output);// this will print the output in json
 
//5- close connection
mysqli_close($connect);
?>
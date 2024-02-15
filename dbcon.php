
<?php
$dbservername="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sms";
$conn=mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);

if($conn){
 // echo "connected";
}

  else{ echo "db connection not done";}

?>
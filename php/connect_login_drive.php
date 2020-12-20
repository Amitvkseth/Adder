<?php

$youremail = filter_input(INPUT_POST,'youremail');
$yourpassword = filterinput(INPUT_POST,'yourpassword');
if (!empty($youremail)) {
  if (!empty($yourpassword)) {
    $host="localhost";
    $dbyouremail="root";
    $dbpassword="";
    $dbname="bootstrap";

    $conn = new mysqli($host,$dbyouremail,$dbpassword,$dbname);

    if (mysqli_connect_error()) {
      die('Connect Error ('. mysqli_connect_error() .')'. mysqli_connect_error());
    }
    else {
      $sql = "INSERT INTO login_drive (youremail, yourpassword)
      values('$youremail','$yourpassword')";
      if ($conn->query($sql)) {
        echo "New record is inserted sucessfully";
      }
      else {
        echo "Error:".$sql."<br>".$conn->error;
      }
      $conn->close();
    }
  }
  else {
    echo "Password should not be empty";
    die();
  }
}
else {
  echo"Username should not be empty";
  die();
}
 ?>

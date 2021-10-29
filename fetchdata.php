<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'country_state_city';
$db_port = 8889;

$conn = new mysqli($db_host,$db_user,$db_password,$db_db);
// print_r($_POST);



if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM states WHERE country_id='$id' ");
    while($row=mysqli_fetch_array($query)){
        $id=$row['id'];
        $state = $row['name'];
        echo "<option value='$id'>$state</option>";
    }
  }
  if(isset($_POST['stateid'])){
    $stateid = $_POST['stateid'];
    $query= mysqli_query($conn, "SELECT * FROM cities WHERE state_id='$stateid' ");
    while($row=mysqli_fetch_array($query)){
        $stateid=$row['id'];
        $city = $row['name'];
        echo "<option value='$stateid'>$city</option>";
    }
  }

?>
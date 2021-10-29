<?php
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'country_state_city';
  $db_port = 8889;

  $conn = new mysqli($db_host,$db_user,$db_password,$db_db);
	
  if($conn->connect_error) {
    echo 'Errno: '.$conn->connect_errno;
    echo '<br>';
    echo 'Error: '.$conn->connect_error;
    exit();
  }

  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';
  echo 'Host information: '.$conn->host_info;
  echo '<br>';
  echo 'Protocol version: '.$conn->protocol_version;

  $conn->close();
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="form-group">
            <label for="country">country</label>
                <select name="country" id="country" class="form-control">
                    <option>select country</option>
                   <?php
                    $conn = new mysqli($db_host,$db_user,$db_password,$db_db);
                   $query = mysqli_query($conn,"SELECT * FROM countries");
                   
                   while($row=mysqli_fetch_array($query)){?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                   <?php

                   }

                   ?>
               
                </select>
        </div>

        <div class="form-group">
            <label for="state">state</label>
                <select name="state" id="state" class="form-control">
                    <option>select state</option>
                    
                </select>
        </div>

        <div class="form-group">
            <label for="city">city</label>
                <select name="city" id="city" class="form-control">
                    <option>select city</option>
                </select>
        </div>

    </div>


    <script type="text/javascript">
    $(document).ready(function(){
    $("#country").on('change',function(){
        var countryId = $(this).val();
            $.ajax({
            type:'POST',
            url:'fetchdata.php',
            data: {id:countryId},
            dateType:"html",
            success:function(data){
            //    alert(data);
                $('#state').html(data);
            }
        });
    });

    $("#state").on('change',function(){
        var stateId = $(this).val();
            $.ajax({
            type:'POST',
            url:'fetchdata.php',
            data: {stateid:stateId},
            dateType:"html",
            success:function(data){
            //    alert(data);
                $('#city').html(data);
            }
        });
    });

});

    </script>
</body>
</html>
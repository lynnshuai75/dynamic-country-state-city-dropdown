<?php 
/*
===source == https://www.youtube.com/watch?v=5X0jNVjwuzc
===name == Dynamic Dependent Select Box using jQuery, Ajax, PHP and MySQL  by CodexWorld

*/
include('dbConfig.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dependent Dropdown list</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br /> <br />
    <div class="container" style="width:600px;">
    <h2 align="center">   Dynamic Dependent Country, State, City Dropdown List using Jquery and Ajax</h2> <br /> <br />
       <?php  
        $query   = "SELECT * FROM country ORDER BY country_name ASC";
        $result = $dbconnect->query($query);
       ?>
        <select name="country" id="country" class="form-control input-lg">
            <option value=""> Select Country</option>
            <?php 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    echo '<option value="'.$row['country_id'] .'">'. $row['country_name']. ' </option>';
                }
            }else {
                echo '<option value="">Country not Available </option>';
            }

            ?>
        </select> <br />

        <select name="state" id="state" class="form-control input-lg">
            <option value="">Select Country first </option>
        
        </select> <br />

        <select name="city" id="city" class="form-control input-lg">
            <option value=""> Select State first</option>
        
        </select>
   
    </div>
    
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
 
    $('#country').on('change', function(){
        var countryID   = $(this).val();

        if(countryID) {
            $.ajax({
                type: "POST",
                url: "ajaxData.php",
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                }
            });

        }else {
            $('#state').html('<option value=""> Select Country first </option>')
            $('#city').html('<option value=""> Select State first</option>')

        }
    });

    $('#state').on('change', function(){
        var stateID    = $(this).val();
        if(stateID){
            $.ajax( {   
            type: "POST",
            url: "ajaxData.php",
            data: 'state_id='+stateID,
            success:function(html){
                $('#city').html(html);
              
            }

        });

        }else {
            $('#city').html('<option value=""> Select State first </option>');
        }
    });
});


</script>
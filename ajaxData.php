<?php 
include('dbConfig.php');
if(!empty($_POST["country_id"])) {
    //** fetch state data based on the specific country id */
    $query    = "SELECT * FROM state WHERE country_id = ".$_POST['country_id']." ORDER BY state_name ASC";
    $result  = $dbconnect->query($query);

//generate HTML of state option list
if($result->num_rows > 0){
    echo '<option value=""> Select State </option>';
    while($row = $result->fetch_assoc()){ 
        echo '<option value="'. $row["state_id"]. '">' .$row["state_name"] .' </option>';
    }

} else {
    echo '<option value=""> State Not Available</option>';
}
}elseif(!empty($_POST["state_id"])){
    //** fetch city data based on the specific state */
    $query   = "SELECT * FROM city WHERE state_id =".$_POST['state_id'] ." ORDER BY city_name ASC";
    $result  = $dbconnect->query($query);

    //** generate HTML for city option list */ 
    if($result->num_rows > 0){
        echo '<option value="">Select City </option>';
        while($row = $result->fetch_assoc()){ 
            echo '<option value="'.$row['city_id'].'">'. $row['city_name'].' </option>';
        }
    }else{
        echo '<option value=""> City not available</option>';
    }

}



?>

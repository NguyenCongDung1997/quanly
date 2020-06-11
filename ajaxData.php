<?php
include('database.php');
 
if(isset($_POST["HID"])){
    //Get all state data
    $query = $db->query("SELECT * FROM student WHERE HID = ".$_POST['HID']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Chọn học sinh</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['StudentID'].'">'.$row['StudentName'].'</option>';
        }
    }else{
        echo '<option value="">Lớp trống</option>';
    }
}

?>
<?php 

    $con= new mysqli("localhost","root","","crudoperation");

    if($con){
        // echo "Connecation Succefull";
    }
    else{
        die(mysqli_error($con));
    }
?>
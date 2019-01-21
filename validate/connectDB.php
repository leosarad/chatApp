<?php
 $connect=mysqli_connect('localhost','root',"",'ChatApp');
    if($connect==false){
        die("ERROR: Could not connect. " . mysqli_connect_error()); //For Error type message
    } else{
       // echo "<script>console.log('Databse Connected')</script>";
    }
?>

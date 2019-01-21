
<?php
session_start();
if(empty($_SESSION['loggedid'])){
    header('location: index.php');    
} 
?>
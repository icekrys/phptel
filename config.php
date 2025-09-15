<?php
   $con = mysqli_connect("localhost", "root", "", "questel"); 
   if(!$con){
       die("Connection failed: " . mysqli_connect_error());
   }
?>
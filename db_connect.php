<?php

$conn = mysqli_connect('localhost','ale','test1234','produse');
//check connection
if(!$conn)
{
    echo 'Connection error: ' . mysqli_connect_error();
}

?>
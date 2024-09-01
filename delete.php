<?php
include 'connect.php';

if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];

    $sql="delete from pet_care where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {

        header('Location: display.php');

    }
    else{

        die(mysqli_error($con));

    }
}
?>
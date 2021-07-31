<?php
    include "connect.php";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $tanggal = date("Y-m-d");

    $query = "INSERT INTO comments(links_id,namec,email,comment,tanggal) VALUES ('$id','$name','$email','$comment','$tanggal')";

    if($connect->query($query) === TRUE){
        echo '<script type="text/javascript">'; 
        echo 'alert("Success Comment");'; 
        echo 'window.location.href = "detail.php?id='.$id.'&link=0&status=0";';
        echo '</script>';
        // header('location:detail.php?id='.$id.'&link=0&status=0');
    } else {
        echo '<script type="text/javascript">'; 
        echo 'alert("Failed Comment");'; 
        echo 'window.location.href = "detail.php?id='.$id.'&link=0&status=0";';
        echo '</script>';
        // header('location:detail.php?id='.$id.'&link=0&status=0');
    }
?>
<?php
    include "connect.php";
    $id = $_GET['id'];
    $idl = $_GET['idlink'];

    $query = "INSERT INTO downvote(comment_id) VALUE ('$id')";

    if($connect->query($query) === TRUE){
        echo '<script type="text/javascript">'; 
        echo 'alert("Success Dislike Comment");'; 
        echo 'window.location.href = "detail.php?id='.$idl.'&link=0&status=0";';
        echo '</script>';
        // header('location:detail.php?id='.$id.'&link=0&status=0');
    } else {
        echo '<script type="text/javascript">'; 
        echo 'alert("Failed Dislike Comment");'; 
        echo 'window.location.href = "detail.php?id='.$idl.'&link=0&status=0";';
        echo '</script>';
        // header('location:detail.php?id='.$id.'&link=0&status=0');
    }
?>
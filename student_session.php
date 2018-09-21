<?php
    session_start();
    $_SESSION['rno']=$user;
    $_SESSION['class']=$row['class'];
    header("location: student_all.php");
?>
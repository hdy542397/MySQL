<?php 
    
    $dbc = mysqli_connect('localhost', 'root', 'УмТы', 'stdu')
      or die('Error connecting to MySQL server.');
    $id = $_REQUEST["id"];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $student_number =$_POST['student_number'];
    $hobby = $_POST['hobby'];
    $scores = $_POST['scores'];
    $query = "UPDATE student_list SET username='$username',password='$password',name='$name',sex='$sex',age='$age',student_number='$student_number',hobby='$hobby',scores='$scores' WHERE id=$id";
    echo $query;
    mysqli_query($dbc,$query)
     or die('error_mysqli');
    echo ' student modify.';

    mysqli_close($dbc);
?>
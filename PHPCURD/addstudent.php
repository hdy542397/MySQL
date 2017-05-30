<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>登记学生信息</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php
  $dbc = mysqli_connect('localhost', 'root', '密码', 'stdu')
    or die('Error connecting to MySQL server.');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $student_number =$_POST['student_number'];
  $hobby = $_POST['hobby'];
  $scores = $_POST['scores'];

  $query = "INSERT INTO student_list (username, password, name,sex,age,student_number,hobby,scores)  VALUES ('$username', '$password', '$name','$sex','$age','$student_number','$hobby','$scores')";
  mysqli_query($dbc, $query)
    or die('error_mysqli');

  echo 'Customer added.';

  mysqli_close($dbc);
?>

</body>
</html>

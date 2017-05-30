<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>修改学生信息</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<?php
    $dbc = mysqli_connect('localhost', 'root', '密码', 'stdu')
      or die('Error connecting to MySQL server.');
    $id = $_REQUEST["id"];
    $result = mysqli_query($dbc, "SELECT * FROM student_list WHERE id= '$id'")or die('error'); 
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
?>
<body>
  <p>修改学生信息</p>
  <form method="post" action="modifystudentvalue.php?id=<?php echo $id; ?>">
    <label for="username">username:</label>
    <input type="text" id="username" name="username" value='<?php echo $row[1] ?>'/><br />
    <label for="password">password:</label>
    <input type="text" id="password" name="password" value='<?php echo $row[2] ?>' /><br />
    <label for="name">name:</label>
    <input type="text" id="name" name="name" value='<?php echo $row[3] ?>' /><br />
    <label for="sex">sex:</label>
    <input type="text" id="sex" name="sex" value='<?php echo $row[4] ?>' /><br />
    <label for="age">age:</label>
    <input type="text" id="age" name="age" value='<?php echo $row[5] ?>' /><br />
    <label for="student_number">student_number:</label>
    <input type="text" id="student_number" name="student_number" value='<?php echo $row[6] ?>' /><br />
    <label for="hobby">hobby:</label>
    <input type="text" id="hobby" name="hobby" value='<?php echo $row[7] ?>' /><br />
    <label for="scores">scores:</label>
    <input type="text" id="scores" name="scores" value='<?php echo $row[8] ?>' /><br />
    <input type="submit" name="Submit" value="Submit" />
  </form>
</body>
</html>

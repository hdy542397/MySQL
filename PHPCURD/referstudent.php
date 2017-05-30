<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>查询学生信息</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php
  $dbc = mysqli_connect('localhost', 'root', '密码', 'stdu')
    or die('Error connecting to MySQL server.');

  $sex = $_REQUEST['sex'];
  $scores =$_REQUEST['scores'];
 $result = mysqli_query($dbc, "SELECT * FROM student_list WHERE sex = '$sex' && scores >= '$scores'")or die('error');?>
 <table border="1"><tr><td>id</td><td>username</td><td>password</td><td>name</td><td>sex</td><td>age</td><td>student_nubmer</td><td>hobby</td><td>scores</td></tr>
  <?php while($row=mysqli_fetch_array($result,MYSQLI_NUM)){ ?>
         <tr>
                  <td><?php echo $row[0] ?></td>
                  <td><?php echo $row[1] ?></td>
                  <td><?php echo $row[2] ?></td>
                  <td><?php echo $row[3] ?></td>
                  <td><?php echo $row[4] ?></td>
                  <td><?php echo $row[5] ?></td>
                  <td><?php echo $row[6] ?></td>
                  <td><?php echo $row[7] ?></td>
                  <td><a href="<?php echo 'modifystudent.php?id='.$row[0] ?>" ><?php echo $row[8] ?> </a></td>
          </tr>
   <?php } ?>
   </table>
   <?php
   mysqli_close($dbc);
?>

</body>
</html>
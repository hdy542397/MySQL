# MySQL




1  如何创建数据库？
  CREATE DATABASE 数据库名

2  如何创建数据表？什么是主键？什么是外键？
 1.先打开数据库：use 数据库
 2.然后创建数据表：`create table 数据库名(s_name varchar(10) not null,age int(3),sex char(1),height int,s_no varchar(20) not null,primary key(s_no)设置s_No为主键);`
 
  主键：表中的**每一行都应该具有可以唯一标识自己的一列(或一组列)**。而这个承担标识作用的列称为主键。如果**没有主键，数据的管理将会十分混乱**。 比如会存在多条一模一样的记录，删除和修改特定行十分困难。
  满足做主键的条件：
 1. 任何两行都不具有相同的主键值。就是说这列的值都是互不相同的。
 2. 每个行都必须具有一个主键值。主键列不允许设置为NULL。
 3. 主键列的值不允许进行修改和更新

什么是外键
 外键：是另一表的主键, 外键可以有重复的, 可以是空值，用来和其他表建立联系用的。所以说，如果谈到了外键，一定是至少涉及到两张表。例如下面这两张表：
 ![此处输入图片的描述][1]
  部门表（dept）、员工表(emp)。Id=Dept_id，而Dept_id就是员工表中的外键：因为员工表中的员工需要知道自己属于哪个部门，就可以通过外键Dept_id找到对应的部门，然后才能找到部门表里的各种字段信息，从而让二者相关联。所以说，外键一定是在从表中创建，从而找到与主表之间的联系；从表负责维护二者之间的关系。
 创建外键代码：

    [CONSTRAINT symbol] FOREIGN KEY [id] (从表的字段1) REFERENCES tbl_name (主表的字段2) [ON DELETE {RESTRICT | CASCADE | SET NULL | NO ACTION}] [ON UPDATE {RESTRICT | CASCADE | SET NULL | NO ACTION}

 解释如下：

CONSTRAINT symbol：可以给这个外键约束起一个名字，有了名字，以后找到它就很方便了。如果不加此参数的话，系统会自动分配一个名字。
FOREIGN KEY：将从表中的字段1作为外键的字段。
REFERENCES：映射到主表的字段2。
ON DELETE后面的四个参数：代表的是当删除主表的记录时，所做的约定。
RESTRICT(限制)：如果你想删除的那个主表，它的下面有对应从表的记录，此主表将无法删除。
CASCADE（级联）：如果主表的记录删掉，则从表中相关联的记录都将被删掉。
SET NULL：将外键设置为空。
NO ACTION：什么都不做。
注：一般是RESTRICT和CASCADE用的最多。

3  php如何链接数据库？如何关闭数据库链接？
链接：
 mysql_connect(连接的服务器（本地：localhost），用户名，密码，需要链接的数据库名称)
 关闭：
 mysql_close()函数
 代码：

    <?php
        $con = mysql_connect("localhost","peter","abc123");
        if (!$con)
          {
          die('Could not connect: ' . mysql_error());
          }
        // some code
        mysql_close($con);
        ?>

4  php如何执行数据库增删改查操作。
   增加列 `$query = "INSERT INTO student_list (username, password)  VALUES ('$username', '$password')";`
   删除列  `$query = "DELETE FROM student_list WHERE username = '$username'";`
   修改列`$query = "UPDATE student_list SET username='$username',password='$password' WHERE id=$id"; `
   查询列 `$result = mysqli_query($dbc, "SELECT * FROM student_list WHERE id= '$id'")or die('error');` 

5  如何获取数据库的单条信息，并输出在页面

        <?php
    $con = mysql_connect("localhost","peter","abc123");
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }
    mysql_select_db("my_db", $con);
    $result = mysql_query("SELECT * FROM Persons");
    echo "<table border='1'>
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
    </tr>";
    while($row = mysql_fetch_array($result))
      {
      echo "<tr>";
      echo "<td>" . $row['FirstName'] . "</td>";
      echo "<td>" . $row['LastName'] . "</td>";
      echo "</tr>";
      }
    echo "</table>";
    mysql_close($con);
    ?>

6  如果从数据库查询出来多条信息，如何在页面输出

    <form method="post" action="referstudent.php">
            <label for="sex ">sex:</label><br />
            <input id="sex" name="sex" type="text" size="30" /><br />
            <label for="scores">scores:</label><br />
            <input id="scores" name="scores" type="text" size="30"><br />
            <input type="submit" name="refer" value="refer" />
            </form>
    
    html页面提交表单给php处理 

    <?php
    $dbc = mysqli_connect('localhost', 'root', '3edc$RFV542397', 'stdu')or die('Error connecting to MySQL server.');
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
        <td><?php echo $row[8] ?></td>
    </tr>
    <?php } ?>
     </table>
    <?php
        mysqli_close($dbc);
    ?>
7 从前端页面传递参数到后端有get和post两种方式，这两种方式有什么不一样，请说明。
1. get是从服务器上获取数据，
   post是向服务器传送数据。
2. get是把参数数据队列加到提交表单的ACTION属性所指的URL中，值和表单内各个字段一一对应，在URL中可以看到。post是通过HTTP post机制，将表单内各个字段与其内容放置在HTML HEADER内一起传送到ACTION属性所指的URL地址。用户看不到这个过程。
3. 对于get方式，服务器端用Request.QueryString获取变量的值，对于post方式，服务器端用Request.Form获取提交的数据。
4. get传送的数据量较小，不能大于2KB。post传送的数据量较大，一般被默认为不受限制。但理论上，IIS4中最大量为80KB，IIS5中为100KB。
5. get安全性非常低，post安全性较高。但是执行效率却比Post方法好。
 
8 php中get 和post的参数如何获取
    传统方式获取变量
    $id = $_GET['id']; // 获取get变量
    $name = $_POST['name']; // 获取post变量
    $value = $_SESSION['var']; // 获取session变量
    $name = $_COOKIE['name']; // 获取cookie变量
    $file = $_SERVER['PHP_SELF']; // 获取server变量
  
$_GET变量

$_GET变量是一个包含名称[name]和值[value]的数组（这些名称和值是通过HTTP GET方法发送的，且都可以利用）。
$_GET变量使用“method=get”来获取表单信息。通过GET方法发送的信息是可见的（它将显示在浏览器的地址栏里），并且它有长度限制（信息的总长度不能超过100个字符[character]）。

要点：当使用“$_GET”变量时，所有的变量名和变量值都会显示在URL地址栏内；所以，当你发送的信息包含密码或是其他一些敏感信息时，就不可以再使用这种方法。因为所有的信息会在URL地址栏内显示，所以我们可以把它作为标签放入收藏夹内。这在很多情况下非常有用。

注意：如果需要发送的变量值过大，HTTP GET方法便不适用。发送的信息量不能超过100个字符。

$_POST变量
$_POST变量是一个包含名称[name]何值[value]的数组（这些名称和值是通过HTTP POST方法发送的，且都可以利用）

$_POST变量使用“method=POST”来获取表单信息。通过POST方法发送的信息是不可见的，并且它没有关于信息长度的限制。
$_REQUEST变量
PHP $_REQUEST变量包含$_GET, $_POST, and $_COOKIE的内容。

PHP $_REQUEST变量可以用来获取通过“GET”和“POST”这两种方法发送的表单数据。


9  如何通过URL传递参数
    page01.php

     <?php 
    $var = 'I love you !';
    ?>
    <a href="http://www.111cn.net <?php echo "page02.php?new=".$var ?>">get</a>
    
    定义一个变量$var。
    超链接a的href属性里写明要跳转到page02页面。后面加一个问号，一个自己定义的变量new【此名称在page02页面要使用】，new的值就是 我们想传递的$var。
    page02.php

    <?php
         echo   $_GET['new'];
        ?>
    
    使用$_GET[]获取new的值，然后就可以输出或做其他用途。
    
    
    

  [1]: http://static.oschina.net/uploads/img/201412/15112246_KWiu.png
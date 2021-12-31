<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css"/>
    <title>Welcome to our todolist app</title>
</head>
<body>
    <header>
<h1> TODO LIST APP  </h1>        
        
</header>

<section class="input-section">

<form method="POST" action="/projects/todo/index.php">
<input type="text" class="todo-input" name="title" placeholder="What do want to do today?"/>
<input type="submit" name="submit" class="submit-btn" value="Add New Todo"/>

</form>

</section>
<section class="items">
      <h1>My Todo Items</h1>

</section>
<?php

$databaseName = "todo_list";
$username = "root";
$password = "";
$address= "localhost";


$conn = new mysqli($address,
 $username, $password, $databaseName);


 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "CREATE TABLE IF NOT EXISTS `todo_table` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    status ENUM('pending','done'),
    created_at TIMESTAMP
)";

$conn->query($sql);

 

//if submit btn clicked
if (isset($_POST['submit'])){

    //echo $_POST['title'];
    $sql = "INSERT INTO `todo_table` ( `title`,`status`)
     VALUES ('".$_POST['title']."','pending');";

 ($conn->query($sql));


}



?>



 <footer> @Copyright 2021   </footer> 
</body>
</html>
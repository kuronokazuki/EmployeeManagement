<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pw = password_hash($_POST["pw"], PASSWORD_DEFAULT);
  $name = $_POST["name"];
  $rating = $_POST["rating"];
  $admin_id = $_POST["admin_id"];

  $sql = "INSERT INTO Employees (pw, 名前, 評価, 管理者id)
  VALUES ('$pw', '$name', '$rating', '$admin_id')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>従業員情報追加</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">TOP</a></li>
            <li><a href="add_employee.php">従業員情報追加</a></li>
            <li><a href="update_employee.php">従業員情報更新</a></li>
            <li><a href="delete_employee.php">従業員情報削除</a></li>
        </ul>
    </nav>
    <div class="form-container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            PW: <input type="password" name="pw"><br>
            名前: <input type="text" name="name"><br>
            評価: <input type="text" name="rating"><br>
            管理者ID: <input type="text" name="admin_id"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
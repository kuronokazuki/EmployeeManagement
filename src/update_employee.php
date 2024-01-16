<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $pw = password_hash($_POST["pw"], PASSWORD_DEFAULT);
  $name = $_POST["name"];
  $rating = $_POST["rating"];
  $admin_id = $_POST["admin_id"];

  $sql = "UPDATE Employees SET pw='$pw', 名前='$name', 評価='$rating', 管理者id='$admin_id' WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>従業員情報更新</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
            ID: <input type="text" name="id"><br>
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

<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];

  $sql = "DELETE FROM Employees WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>従業員情報削除</title>
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
            ID: <input type="text" name="id"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>

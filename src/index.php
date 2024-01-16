<!DOCTYPE html>
<html>
<head>
    <title>従業員管理システム</title>
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
    <?php
include 'db_connect.php';

$sql = "SELECT id, 名前, 評価, 管理者id FROM Employees"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>名前</th><th>評価</th><th>管理者名</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $admin_id = $row["管理者id"];
    if($admin_id !== null){
        $admin_sql = "SELECT 名前 FROM Employees WHERE id = $admin_id";
        $admin_result = $conn->query($admin_sql);
        $admin_row = $admin_result->fetch_assoc();
        if($admin_row !== null){
            $admin_name = $admin_row["名前"];
        }else{
            $admin_name = "管理者無し";
        }
    }else{
        $admin_name = "管理者無し";
    }
    echo "<tr><td>".$row["id"]."</td><td>".$row["名前"]."</td><td>".$row["評価"]."</td><td>".$admin_name."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>
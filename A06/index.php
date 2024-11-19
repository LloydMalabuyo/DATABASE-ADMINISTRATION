<?php
include("connect.php"); 

if (isset($_GET['deleteID'])) {
    $deleteID = $_GET['deleteID'];

    $query = "DELETE FROM users WHERE UserID = '$deleteID'";
    if (executeQuery($query)) {
        echo "Data deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$query = "SELECT * FROM users"; 
$result = executeQuery($query);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Delete Data - School Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid shadow mb-5 p-3">
    <h1>Users List with Delete Option</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Message ID</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['UserID'] . "</td>";
          echo "<td>" . $row['messageID'] . "</td>";
          echo "<td><a href='?deleteID=" . $row['UserID'] . "' class='btn btn-danger'>Delete</a></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

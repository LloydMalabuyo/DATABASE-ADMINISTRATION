<?php
include("connect.php");


if (isset($_GET['deleteID'])) {
    $deleteID = $_GET['deleteID'];

   
    $stmt = $conn->prepare("DELETE FROM users WHERE UserID = ?");
    $stmt->bind_param("i", $deleteID);

    if ($stmt->execute()) {
        $message = "Data deleted successfully.";
    } else {
        $message = "Error: " . $conn->error;
    }

    $stmt->close();
}


$query = "SELECT * FROM users";
$result = $conn->query($query);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Data - School Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid shadow mb-5 p-3">
    <h1 class="mb-4">Users List with Edit and Delete Options</h1>

    <?php if(isset($message)): ?>
      <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-responsive">
      <thead class="table-dark">
        <tr>
          <th>User ID</th>
          <th>Message ID</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if($result && $result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($row['UserID']); ?></td>
              <td><?php echo htmlspecialchars($row['messageID']); ?></td>
              <td>
                <a href="edit.php?editID=<?php echo $row['UserID']; ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="?deleteID=<?php echo $row['UserID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center">No users found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

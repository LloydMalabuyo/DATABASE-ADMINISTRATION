<?php
include("connect.php");


$editID = isset($_GET['editID']) ? intval($_GET['editID']) : 0;
$userData = ['UserID' => '', 'messageID' => ''];
$message = '';


if ($editID > 0) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE UserID = ?");
    $stmt->bind_param("i", $editID);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $userData = $result->fetch_assoc();
    } else {
        die("User not found.");
    }

    $stmt->close();
} else {
    die("Invalid User ID.");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = intval($_POST['UserID']);
    $messageID = intval($_POST['messageID']);

   
    $stmt = $conn->prepare("UPDATE users SET messageID = ? WHERE UserID = ?");
    $stmt->bind_param("ii", $messageID, $userID);

    if ($stmt->execute()) {
        $message = "User updated successfully.";
        
        header("refresh:2;url=index.php");
    } else {
        $message = "Error: " . $conn->error;
    }

    $stmt->close();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit User - School Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid shadow mb-5 p-3">
    <h1 class="mb-4">Edit User</h1>

    <?php if($message): ?>
      <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form method="POST" action="edit.php?editID=<?php echo $userData['UserID']; ?>">
      <div class="mb-3">
        <label for="UserID" class="form-label">User ID</label>
        <input type="text" class="form-control" id="UserID" name="UserID" value="<?php echo htmlspecialchars($userData['UserID']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="messageID" class="form-label">Message ID</label>
        <input type="number" class="form-control" id="messageID" name="messageID" value="<?php echo htmlspecialchars($userData['messageID']); ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Save Changes</button>
      <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

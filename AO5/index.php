<?php
include("connect.php");

$query = "SELECT * FROM users";
$result = executeQuery($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Activity 5 - User Records</title>
</head>
<body>
  <h1>User Records</h1>

  <table border="1" cellspacing="0" cellpadding="10">
    <thead>
      <tr>
        <th>UserID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['UserID']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Age']; ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="4">No records found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>

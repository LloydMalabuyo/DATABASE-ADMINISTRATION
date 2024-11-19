<?php
if (isset($_POST['delete_user'])) {
    $userID = $_POST['userID'];  

    $query = "DELETE FROM users WHERE UserID = $userID";
    
    if (executeQuery($query)) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>

<form method="POST" action="Index.php">
  <label for="userID">Enter User ID to Delete:</label>
  <input type="number" name="userID" id="userID" required>
  <button type="submit" name="delete_user" class="btn btn-danger">Delete User</button>
</form>

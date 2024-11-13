<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];
    $content = $_POST['content'];
    $datetime = date("Y-m-d H:i:s");
    $privacy = $_POST['privacy'];
    $isDeleted = 'no';  // Default value
    $attachment = $_POST['attachment'];
    $cityID = $_POST['cityID'];
    $provinceID = $_POST['provinceID'];

    $sql = "INSERT INTO posts (userID, Content, datetime, privacy, `is deleted`, attachment, cityID, provinceID) 
            VALUES ('$userID', '$content', '$datetime', '$privacy', '$isDeleted', '$attachment', '$cityID', '$provinceID')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activity 6 - Data Insertion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid shadow mb-5 p-3">
        <h1>Data Insertion Form</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="userID" class="form-label">User ID</label>
                <input type="number" class="form-control" id="userID" name="userID" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="privacy" class="form-label">Privacy</label>
                <input type="text" class="form-control" id="privacy" name="privacy" required>
            </div>
            <div class="mb-3">
                <label for="attachment" class="form-label">Attachment</label>
                <input type="text" class="form-control" id="attachment" name="attachment" required>
            </div>
            <div class="mb-3">
                <label for="cityID" class="form-label">City ID</label>
                <input type="number" class="form-control" id="cityID" name="cityID" required>
            </div>
            <div class="mb-3">
                <label for="provinceID" class="form-label">Province ID</label>
                <input type="number" class="form-control" id="provinceID" name="provinceID" required>
            </div>
            <button type="submit" class="btn btn-primary">Insert Data</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>



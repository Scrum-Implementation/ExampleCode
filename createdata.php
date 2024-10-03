<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Create Data</title>
</head>
<body>
    <header>
        <h1 class="heading">Book Inventory System</h1>
    </header>

    <main>
    <h1>Add New Book</h1>
    <form method="post">
        <div>
            <label for="title">Book Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div class="form-group">
            <div>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>
        </div>
        <div>
            <label for="publishDate">Publish Date:</label>
            <input type="date" id="publishDate" name="publishDate" required>
        </div>
        <div>
            <input type="submit" value="Add Book">
            <a href="index.php" class="btn-cancel">Cancel</a>
        </div>
        
    </form> 
    </main>
</body>
</html>

<?php

include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["title"]) && isset($_POST["author"]) && isset($_POST["quantity"]) && isset($_POST["publishDate"])){
        $title = $_POST["title"];
        $author = $_POST["author"]; 
        $quantity = $_POST["quantity"];
        $publishDate = $_POST["publishDate"];

        $stmt = $conn->prepare("INSERT INTO books (book, author, pubdate, quantity) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $title, $author, $publishDate, $quantity);
        $stmt->execute();
        $result = $conn->query($sql);

        if($result) {
            header("Location: index.php?add_msg=You have successfully added a book.");
            exit;
        }
    }
}

?>
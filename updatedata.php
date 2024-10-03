<?php
    include 'connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM books WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $book = $row['book'];
        $author = $row['author'];
        $pubdate = $row['pubdate'];
        $quantity = $row['quantity'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Data</title>
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
            <input type="text" id="title" name="title" value="<?php echo $book; ?>" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo $author; ?>" required>
        </div>
            <div>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>
            </div>
        <div>
            <label for="publishDate">Publish Date:</label>
            <input type="date" id="publishDate" name="publishDate" value="<?php echo $pubdate; ?>" required>
        </div>
        <div>
            <input type="submit" value="Update Book">
            <a href="index.php" class="btn-cancel">Cancel</a>
        </div>
        
        
    </form> 
    </main>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["title"]) && isset($_POST["author"]) && isset($_POST["quantity"]) && isset($_POST["publishDate"])){
        $title = $_POST["title"];
        $author = $_POST["author"];
        $quantity = $_POST["quantity"];
        $publishDate = $_POST["publishDate"];

        $sql = "UPDATE books SET book = ?, author = ?, pubdate = ?, quantity = ? WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $author, $publishDate, $quantity);
        $result = $stmt->execute();

        if($result) {
            header("Location: index.php?update_msg=You have successfully updated a book.");
            exit;
        }

    }
}
?>
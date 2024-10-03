<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Book Inventory System</title>
</head>
<body>

<header>
    <h1 class="heading">Book Inventory System</h1>
</header>

<main>
    <div>
        <h1>Books</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publish Date</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include 'connect.php';

                $sql = "SELECT * FROM books";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["book"] . "</td><td>" . $row["author"] . 
                        "</td><td>" . $row["pubdate"] . "</td><td>" . $row["quantity"] . "</td><td><a class='btn-delete' href='deletedata.php?id=" . $row['id'] . "'>Delete</a>  <a class='btn-update' href='updatedata.php?id=" . $row['id'] . "'>Update</a></td></tr>";
                        
                    }   
                } else {
                    echo "<tr><td colspan='5'>No results found</td></tr>";
                }

                ?>
            </tbody>
        </table>

        <div class="form-container">
            <form action="createdata.php" method="post" class="addbutton">
                <input type="submit" value="Add">
            </form>
        </div>
    </div>
</main>

</body>
</html>

<script>
    const deleteButtons = document.querySelectorAll('.btn-delete');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const result = confirm("Are you sure you want to delete this item?");
            
            if (result) {
                window.location.href = this.getAttribute('href');
            }
        });
    });
</script>
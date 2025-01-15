<!DOCTYPE html>
<html>

<head>
    <title>Library System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Library Management System</h1>

    <!-- Form to Add Book -->
    <form method="POST">
        <h3>Add Book</h3>
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="authors" placeholder="Authors" required><br>
        <input type="text" name="edition" placeholder="Edition"><br>
        <input type="text" name="publisher" placeholder="Publisher"><br>
        <button type="submit" name="addBook">Add Book</button>
    </form>

    <!-- Form to Search for Book -->
    <form method="GET">
        <h3>Search Book</h3>
        <input type="text" name="searchTitle" placeholder="Book Title" required><br>
        <button type="submit" name="searchBook">Search</button>
    </form>

    <?php
    $conn = new mysqli("localhost", "root", "", "LibraryDB");
    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);

    // Add Book
    if (isset($_POST['addBook'])) {
        $title = $conn->real_escape_string($_POST['title']);
        $authors = $conn->real_escape_string($_POST['authors']);
        $edition = $conn->real_escape_string($_POST['edition']);
        $publisher = $conn->real_escape_string($_POST['publisher']);
        $sql = "INSERT INTO books (title, authors, edition, publisher) VALUES ('$title', '$authors', '$edition', '$publisher')";
        echo $conn->query($sql) ? "<p>Book added!</p>" : "<p>Error: $conn->error</p>";
    }

    // Search Book
    if (isset($_GET['searchBook'])) {
        $searchTitle = $conn->real_escape_string($_GET['searchTitle']);
        $result = $conn->query("SELECT * FROM books WHERE title LIKE '%$searchTitle%'");
        if ($result->num_rows > 0) {
            echo "<h3>Search Results</h3><table><tr><th>Accession #</th><th>Title</th><th>Authors</th><th>Edition</th><th>Publisher</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['accession_number']}</td><td>{$row['title']}</td><td>{$row['authors']}</td><td>{$row['edition']}</td><td>{$row['publisher']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No books found with the title '$searchTitle'.</p>";
        }
    }

    $conn->close();
    ?>
</body>

</html>
<?php
)
$bookInfo = [
    "Harry Potter" => [
        "author" => "J.K. Rowling",
        "year" => 1997,
        "genre" => "Fantasy"
    ],
    "The Hobbit" => [
        "author" => "J.R.R. Tolkien",
        "year" => 1937,
        "genre" => "Fantasy"
    ],
    "Gone Girl" => [
        "author" => "Gillian Flynn",
        "year" => 2012,
        "genre" => "Mystery"
    ],
    "A Brief History of Time" => [
        "author" => "Stephen Hawking",
        "year" => 1988,
        "genre" => "Science"
    ]
];

// ---------------------------------------------
// Function to get book information
// ---------------------------------------------
function getBookInfo($title, $bookInfo) {
    if (array_key_exists($title, $bookInfo)) {
        return "
            <div class='book-info'>
                <h5 class='fw-semibold text-emerald mb-2'>Title: {$title}</h5>
                <p class='mb-1'><strong>Author:</strong> {$bookInfo[$title]['author']}</p>
                <p class='mb-1'><strong>Year:</strong> {$bookInfo[$title]['year']}</p>
                <p class='mb-0'><strong>Genre:</strong> {$bookInfo[$title]['genre']}</p>
            </div>
        ";
    } else {
        return "<p class='text-danger'>Book not found.</p>";
    }
}

// ---------------------------------------------
// Choose which book to display
// ---------------------------------------------
$result = getBookInfo("Harry Potter", $bookInfo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details — Digital Library</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f4ec; /* soft emerald background */
            font-family: "Inter", sans-serif;
        }
        .library-container {
            max-width: 600px;
            margin: 60px auto;
            background: #ffffff;
            border-radius: 14px;
            padding: 40px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border-top: 6px solid #10b981; /* emerald top border */
        }
        h3 {
            font-weight: 600;
            font-size: 1.5rem;
            color: #065f46; /* dark emerald */
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .text-emerald {
            color: #059669;
        }
        .book-info {
            background-color: #f0fdf4;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            padding: 15px 20px;
        }
    </style>
</head>
<body>

<div class="library-container">
    <h3>📘 Book Information</h3>
    <?php echo $result; ?>
</div>

</body>
</html>

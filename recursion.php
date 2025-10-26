<?php
// =============================================
// RECURSIVE DIRECTORY DISPLAY — Emerald Minimal Design
// =============================================

// Library structure
$library = [
    "Fiction" => [
        "Fantasy" => ["Harry Potter", "The Hobbit"],
        "Mystery" => ["Sherlock Holmes", "Gone Girl"]
    ],
    "Non-Fiction" => [
        "Science" => ["A Brief History of Time", "The Selfish Gene"],
        "Biography" => ["Steve Jobs", "Becoming"]
    ]
];

// Recursive function
function displayLibrary($library) {
    echo '<ul class="list-unstyled mb-2">';
    foreach ($library as $key => $value) {
        if (is_array($value)) {
            echo '<li class="fw-semibold text-emerald mt-2">' . $key . '</li>';
            echo '<div class="ms-3">';
            displayLibrary($value);
            echo '</div>';
        } else {
            echo '<li class="text-muted ms-3">' . $value . '</li>';
        }
    }
    echo '</ul>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library Organizer</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f4ec; /* soft emerald background */
            font-family: "Inter", sans-serif;
            color: #1f2937;
        }
        .library-container {
            max-width: 600px;
            margin: 60px auto;
            background: #ffffff;
            border-radius: 14px;
            padding: 30px 40px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border-top: 6px solid #10b981; /* emerald top border */
        }
        h3 {
            font-weight: 600;
            font-size: 1.5rem;
            color: #065f46; /* dark emerald */
            margin-bottom: 1.5rem;
        }
        .text-emerald {
            color: #059669; /* emerald accent */
        }
        li {
            line-height: 1.6;
        }
        li.text-muted {
            color: #6b7280 !important;
        }
    </style>
</head>
<body>

<div class="library-container">
    <h3>📚 Digital Library Organizer</h3>
    <?php displayLibrary($library); ?>
</div>

</body>
</html>

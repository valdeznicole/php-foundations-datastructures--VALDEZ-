<?php

class Node {
    public $data;
    public $left;
    public $right;

    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}


class BinarySearchTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    // Insert new data into BST
    public function insert($data) {
        $this->root = $this->insertRec($this->root, $data);
    }

    private function insertRec($node, $data) {
        if ($node === null) {
            return new Node($data);
        }

        if (strcasecmp($data, $node->data) < 0) {
            $node->left = $this->insertRec($node->left, $data);
        } elseif (strcasecmp($data, $node->data) > 0) {
            $node->right = $this->insertRec($node->right, $data);
        }

        return $node;
    }

    // Search for a title
    public function search($data) {
        return $this->searchRec($this->root, $data);
    }

    private function searchRec($node, $data) {
        if ($node === null) {
            return false;
        }

        if (strcasecmp($data, $node->data) === 0) {
            return true;
        }

        if (strcasecmp($data, $node->data) < 0) {
            return $this->searchRec($node->left, $data);
        } else {
            return $this->searchRec($node->right, $data);
        }
    }

    // Inorder Traversal (Alphabetical Order)
    public function inorderTraversal($node) {
        if ($node !== null) {
            $this->inorderTraversal($node->left);
            echo $node->data . "<br>";
            $this->inorderTraversal($node->right);
        }
    }
}

// ---------------------------------------------
// 3. Demonstration
// ---------------------------------------------
$bst = new BinarySearchTree();

// Insert book titles
$books = [
    "Harry Potter",
    "The Hobbit",
    "Gone Girl",
    "A Brief History of Time",
    "Sherlock Holmes",
    "Becoming"
];

foreach ($books as $title) {
    $bst->insert($title);
}

// Store outputs for display in HTML
ob_start();
echo "<strong>Inorder Traversal (Alphabetical):</strong><br>";
$bst->inorderTraversal($bst->root);

echo "<br>Searching for 'The Hobbit': " . ($bst->search("The Hobbit") ? "Found!" : "Not Found.") . "<br>";
echo "Searching for 'Inferno': " . ($bst->search("Inferno") ? "Found!" : "Not Found.") . "<br>";
$output = ob_get_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Search Tree — Digital Library</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f4ec;
            font-family: "Inter", sans-serif;
            color: #1f2937;
        }
        .container {
            max-width: 650px;
            margin: 60px auto;
            background: #ffffff;
            border-radius: 14px;
            padding: 40px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border-top: 6px solid #10b981; /* emerald accent */
        }
        h3 {
            font-weight: 600;
            color: #065f46;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .result-box {
            background-color: #f0fdf4;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            padding: 20px;
            font-size: 0.95rem;
        }
        strong {
            color: #059669;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>📚 Binary Search Tree — Book Titles</h3>
    <div class="result-box">
        <?php echo $output; ?>
    </div>
</div>

</body>
</html>

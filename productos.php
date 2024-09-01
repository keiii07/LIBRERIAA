<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros - Librería Dinela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <h1>Nuestros Libros</h1>
        <div class="row">
            <?php
            // Conectar a la base de datos
            include 'conexion.php';

            $sql = "SELECT * FROM books";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-4 mb-3'>";
                    echo "<div class='card'>";
                    echo "<img src='" . $row['cover_image'] . "' class='card-img-top' alt='" . $row['title'] . "'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['title'] . "</h5>";
                    echo "<p class='card-text'>" . $row['author'] . "</p>";
                    echo "<p class='card-text'>" . $row['description'] . "</p>";
                    echo "<p class='card-text'><strong>$" . $row['price'] . "</strong></p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay libros disponibles en este momento.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
    // Ejemplo de datos de productos (puedes reemplazarlo por tus datos reales)
    $articulos = [
        ['nombre' => 'Whisky', 'imagen' => 'whisky.jpg', 'precio' => 15000],
        ['nombre' => 'Ron', 'imagen' => 'ron.jpg', 'precio' => 12000],
        ['nombre' => 'Vodka', 'imagen' => 'vodka.jpg', 'precio' => 10000],
        ['nombre' => 'Tequila', 'imagen' => 'tequila.jpg', 'precio' => 18000],
        ['nombre' => 'Pisco', 'imagen' => 'pisco.jpg', 'precio' => 9000],
        ['nombre' => 'Gin', 'imagen' => 'gin.jpg', 'precio' => 14000],
        ['nombre' => 'Cerveza', 'imagen' => 'cerveza.jpg', 'precio' => 2500],
        ['nombre' => 'Vino', 'imagen' => 'vino.jpg', 'precio' => 7000],
        // Agrega más productos hasta 32 si lo deseas
    ];
    ?>

    <link rel="stylesheet" href="css/catalogo.css">

    <div class="catalogo-grid">
    <?php foreach ($articulos as $articulo): ?>
        <div class="catalogo-card">
            <img class="catalogo-card-img" src="img/<?php echo htmlspecialchars($articulo['imagen']); ?>" alt="<?php echo htmlspecialchars($articulo['nombre']); ?>">
            <div class="catalogo-card-nombre"><?php echo htmlspecialchars($articulo['nombre']); ?></div>
            <div class="catalogo-card-precio">$<?php echo number_format($articulo['precio'], 0, ',', '.'); ?></div>
        </div>
    <?php endforeach; ?>
    </div>
    
</body>
</html>
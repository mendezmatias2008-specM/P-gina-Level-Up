<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo | Level Up Games</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <a href="index.html" class="logo-container">
            <img src="imagenes/logo.png" alt="Logo Level Up Games" class="logo-img">
            <span class="logo-text">LEVEL UP GAMES</span>
        </a>
        <ul class="nav-links">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="contacto.html">Contacto</a></li>
        </ul>
    </nav>

    <header class="hero-header">
        <h1>¡SUBE DE NIVEL TU INVENTARIO! 🚀</h1>
        <p>Descubre las mejores ofertas en títulos AAA, indies y hardware de alto rendimiento. Precios competitivos y soporte local en Cuenca.</p>
    </header>

    <div class="container">
        <div class="grid-productos">
            <div class="card">
                <img src="imagenes/Juegos (Modificado).png" alt="Juegos Switch">
                <h3>Videojuegos de Nintendo Switch</h3>
                <p>Juegos Incluidos en Paquete:<br>- Super Mario Odyssey<br>- Super Mario 3D All-Stars<br>- Breath of the Wild</p>
                <div class="precio">$159.99</div>
                <a href="https://wa.me/593990000000?text=Hola!%20Estoy%20interesado%20en%20el%20paquete%20de%20videojuegos%20de%20Nintendo%20Switch" target="_blank" class="btn-neon">COMPRAR</a>
            </div>
            
            <div class="card">
                <img src="imagenes/PS3 (Retocado).png" alt="Consola PS3">
                <h3>Consola Play Station 3 (Con Juegos Incluidos)</h3>
                <p>Consola Play Station 3 Chipeada con Juegos Incluidos (Instalado en Disco Duro 1TB).</p>
                <div class="precio">$199.99</div>
                <a href="https://wa.me/593990000000?text=Hola!%20Estoy%20interesado%20en%20la%20consola%20PlayStation%203%20chipeada" target="_blank" class="btn-neon">COMPRAR</a>
            </div>
            
            <div class="card">
                <img src="imagenes/Nintendo Switch (Retocado).png" alt="Nintendo Switch">
                <h3>Consola Nintendo Switch</h3>
                <p>Consola Nintendo Switch (1er Modelo), incluye cargador, Micro SD.</p>
                <div class="precio">$299.99</div>
                <a href="https://wa.me/593990000000?text=Hola!%20Estoy%20interesado%20en%20la%20consola%20Nintendo%20Switch%20V1" target="_blank" class="btn-neon">COMPRAR</a>
            </div>
        </div>

        <h2 style="margin-top: 60px; margin-bottom: 20px;">INVENTARIO ACTUALIZADO (DB)</h2>
        <div class="db-table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE DEL JUEGO</th>
                        <th>PRECIO (USD)</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Configuración de la conexión
                    $servidor = "localhost:33065";
                    $usuario = "root";
                    $password = "";
                    $base_datos = "level_updb";

                    $conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

                    if (!$conexion) {
                        echo "<tr><td colspan='4'>Error de conexión: " . mysqli_connect_error() . "</td></tr>";
                    } else {
                        $sql = "SELECT * FROM productos";
                        $resultado = mysqli_query($conexion, $sql);

                        if (mysqli_num_rows($resultado) > 0) {
                            while($fila = mysqli_fetch_assoc($resultado)) {
                                $nombre_url = urlencode($fila['nombre_juego']); // Codifica el nombre para el link
                                echo "<tr>";
                                echo "<td>" . $fila['id_juego'] . "</td>";
                                echo "<td>" . $fila['nombre_juego'] . "</td>";
                                echo "<td>$" . $fila['precio'] . "</td>";
                                // Botón dinámico para los productos de la base de datos
                                echo "<td><a href='https://wa.me/593990000000?text=Hola!%20Quiero%20comprar%20" . $nombre_url . "' target='_blank' style='color:#1a73e8; text-decoration:none; font-size:8px;'>PEDIR</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay datos disponibles.</td></tr>";
                        }
                        mysqli_close($conexion);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>Hecho por: Matias Méndez<br>
        Curso: 3ro de Bachillerato "E2"<br>
        Proyecto Individual</p>
    </footer>

</body>
</html>
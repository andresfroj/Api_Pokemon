<?php
session_start();

if (!isset($_SESSION['user'])) {
    //echo "<p><a href='register.php'>Registrarse</a></p>";
    //echo "<p><a href='login.php'>Iniciar sesión</a></p>";
    include "layout.php";
} else {
    // Aquí iría el contenido anterior de index.php
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Lista de Pokémones</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

            <style>

                .boton{
                    width: 100%;
                    height: 100px;
                    font-size: 115%;
                }
                
                body{
                    background-image: url("./fondo.jpg");
                    background-size: cover; /* Opciones: cover, contain, auto, etc. */
                    background-repeat: no-repeat; /* Evita que se repita la imagen */
                }
                .lista{
                    color: #ffffff;
                }
            </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Pokemon API</a> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php 
                                if (isset($_SESSION['user'])) {
                                    echo "
                                        <li class='nav-item'>
                                           
                                            <a class='nav-link active' aria-current='page'>Bienvenido, {$_SESSION['user']}!</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='nav-link active' aria-current='page' href='logout.php'>Cerrar sesión</a>
                                        </li>
                                    "; 
                                } else {
                                    echo "<p><a href='login.php'>Iniciar sesión</a></p>";
                                }
                            ?>  
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <h1 class="display-3 lista">Lista de Pokémones</h1>
            </div>

            <div class="row">
                <?php
                 
                    $url = "https://pokeapi.co/api/v2/pokemon/";
                    $response = file_get_contents($url);
                    $data = json_decode($response, true);

                    if (isset($data['results'])) {
                        echo '<div class="container">'; // Agregamos un contenedor Bootstrap
                        echo '<table class="table  rounded-top"">
                            <thead class = ""<text-center>
                            <tr>
                                <td colspan="5"><strong>Tabla:</strong> Resultados por nombre de pokemon</td>
                            </tr>
                        </thead>
                        
                        <tbody class = "table-group-divider">'; // Agregamos una tabla Bootstrap
                        $count = 0; // Variable para contar los pokémones en la fila actual
                        foreach ($data['results'] as $pokemon) {
                            $name = $pokemon['name'];

                            if ($count == 0) {
                                echo '<tr>'; // Comenzamos una nueva fila en la tabla
                            }

                            echo '<td><a href="pokemon.php?name=' . $name . '"><button class="boton btn btn-outline-success">' . $name . '</button></a></td>';

                            $count++;
                            if ($count >= 5) {
                                echo '</tr>'; // Cerramos la fila actual en la tabla
                                $count = 0; // Reiniciamos el contador
                            }
                        }

                        // Si quedan botones en la última fila incompleta, cerramos la fila
                        if ($count > 0) {
                            echo '</tr>';
                        }

                        echo '</tbody></table>'; // Cerramos la tabla y el contenedor
                        echo '</div>';
                    } else {
                        echo "No se pudieron cargar los Pokémones.";
                    }

                ?>
            </div>  

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
    </body>

    </html>

<?php
}

?>



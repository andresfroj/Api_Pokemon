<!DOCTYPE html>
<html>

<head>
    <title>Detalles del Pokémon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <style>
            body{
                background-image: url("./fondo.jpg");
                background-size: cover; /* Opciones: cover, contain, auto, etc. */
                background-repeat: no-repeat; /* Evita que se repita la imagen */
            }
            img{
                height: 50%;
            }

            .card{
                margin-top: 25px;
            }
            .lista{
                margin-top: 25px;
            }
        </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Pokemon API</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='logout.php'>Cerrar sesión</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
  
    <?php
        if (isset($_GET['name'])) {
            $pokemon_name = $_GET['name'];
            $url = "https://pokeapi.co/api/v2/pokemon/$pokemon_name/";
            $response = file_get_contents($url);
            $pokemon_data = json_decode($response, true);
            
        } else {
            echo "No se encontró información para el Pokémon $pokemon_name.";
        }
    ?>

<div class="container">

<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
            <div class="card-header">
                <h5 class = "display-5">Detalles del Pokemon</h5>
            </div>
        <div class="card-body">
            <h6 class="card-title display-6"><strong><?php echo "{$pokemon_data['name']}"; ?></strong></h6>
            <h5 class="card-title">Habilidades</h5>
            <?php
            echo "<ul>";
            foreach ($pokemon_data['abilities'] as $ability) {
                echo "<li>{$ability['ability']['name']}</li>";
            }
            echo "</ul>";
            ?>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-center">
            <div class="card-header">
                <h5 class="display-5">Imagen</h5>
            </div>
        <div class="card-body">
            <?php echo "<img style = 'height: 150px;' src='{$pokemon_data['sprites']['front_default']}' alt='{$pokemon_data['name']}'><br>"; ?>
        </div>
        </div>
    </div>
  </div>


  <div class="row">
    <div class="col">
        <a href="./index.php" class="btn btn-success lista">Lista de Pokemones</a>
    </div>
</div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
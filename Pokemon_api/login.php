<?php include "layout.php";?>
<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
</head>
<style>
.center-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    /* Ajusta la altura como desees */
}

.login {
    padding: 50px;
    background: linear-gradient(to bottom, #3FA63C, #00C04F);
    /* Cambia los colores según desees */
}

body{
    background-image: url("./fondo.jpg");
    background-size: cover; /* Opciones: cover, contain, auto, etc. */
    background-repeat: no-repeat; /* Evita que se repita la imagen */
}

.btn {
    background: linear-gradient(to bottom, #ffffff, #ffffff);
}

h1, label{
    color: #ffffff;
}

</style>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <?php
                    session_start(); // Inicia la sesión o reanuda la sesión existente

                    // Verifica si hay un mensaje de sesión y luego lo muestra
                    if(isset($_SESSION['mensaje'])) {
                        //echo $_SESSION['mensaje'];
                        echo " 
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>BIENVENIDO..! </strong> {$_SESSION['mensaje']}
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        ";
                        // Una vez mostrado el mensaje, puedes borrarlo para que no se muestre nuevamente
                        
                    }

                    if(isset($_SESSION['Mensaje_pw'])){
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                               {$_SESSION['Mensaje_pw']}
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                        ";
                        unset($_SESSION['Mensaje_pw']);
                    }

                    if(isset($_SESSION['user_error'])){
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                               {$_SESSION['user_error']}
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                        ";
                        unset($_SESSION['user_error']);
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="container center-content">
        <div class="row">
            <div class="col login border border-primary-subtle rounded">
                <h1 class="display-6" style = "color: #ffffff">Iniciar sesión</h1>
                <form method="post" action="login_process.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" id="username"
                            name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn text-center">iniciar Sesión</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
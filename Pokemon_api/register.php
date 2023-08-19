<?php include "layout.php";?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>

<style>
    .center-content {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh; /* Ajusta la altura como desees */
    }
    .col{
        padding: 50px;
        background: linear-gradient(to bottom, #3FA63C, #00C04F);
    }

    body{
        background-image: url("./fondo.jpg");
        background-size: cover; /* Opciones: cover, contain, auto, etc. */
        background-repeat: no-repeat; /* Evita que se repita la imagen */
    }

    .btn{
        background: linear-gradient(to bottom, #ffffff, #ffffff);
    }

    h1, label{
    color: #ffffff;
}
  </style>
<body>
    
    <div class="container center-content"> 
       
        <div class="row">
            <div class="col border border-primary-subtle rounded">
            <h1 class="display-6">Registro</h1>
            <form method="post" action="register_process.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn text-center">Registrar</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>

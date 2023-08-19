# Api_Pokemon
En este repositorio se encuentra una implementación de la api de pokemon: https://pokeapi.co/api/v2/pokemon/

En esta implementación se muestra la lista de 20 pokemones. 
Para cada pokemon selecionado se muestra la lista de sus habilidades junto con su respectiva imagen.

Esta implentación fue hecha adoptando las siguientes tecnologias: 
- Php: Para el backend
- Bootstrap: Para el frontend
- Mysql: Como motor de base de datos
- Mysql Workbench: Como gestor de base de datos.

Se creo una base datos cuyo nombre es: pokemon_db
Se creo una tabla en la base de datos que contiene tres campos:
- id: Primary key
- username: Usuario
- password: Contraseña

- El script con los codigos sql se dispone en el repostorio.

#Para ejecutar
En los archivos: 
- login_register.php: en la linea 8, se deben colocar los datos de conexión a la respectiva base de datos descrita en el punto anterior. 
- register_process.php: en la linea 8, se deben colocar los datos de conexión a la respectiva base de datos descrita en el punto anterior.

Luego disponga los archivos en la ruta del servidor web de php. 
- Por ejemplo: Si utiliza como servidor web, xampp: ruta: C:\xampp\htdocs\, esta sujento tambien a la ruta donde apunta el servidor.

Una vez creada la base de datos, disponer los archivos en la ruta del servidor y configurar los archivos login_process.php y register.process.php, debe acceder a su navegador de preferencia 
y colocar: http://localhost/Pokemon_api/

Habiendo hecho todos estos pasos prodrá revisar la implementación desarrollada. 
Bendiciones. 

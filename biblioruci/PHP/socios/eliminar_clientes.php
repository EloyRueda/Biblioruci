<?php
/*
    Este archivo forma parte biblioruci.org.
    @author: Eloy Rueda Ciezar - eloyruci28@gmail.com - Desarrollador web

    BiblioRuCi es freeware: cualquier persona puede modificar esta web y redistribuir su versión.

    INFORMACIÓN GENERAL:

        · Objetivo: Gestión de los libros, socios, préstamos, citas y preguntas de la biblioteca a través de esta web.

        · Contenidos de la web:
            - Biblioteca virtual
            - Gestión de bases de datos con diferentes tablas relacionadas entre sí
        
        · Correos electrónicos del dominio:
            - Administradores
                _ eloyruci28@gmail.com
                _ admin@biblioteca.com
            - Bibliotecarios
                _ b_1@biblioteca.com
            - Clientes
                _ cliente1@biblioteca.com
                _ prueba@gmail.com
                _ prueba2@gmail.com
                _ prueba3@biblioteca.com
                _ prueba4@gmail.com
                _ prueba5@gmail.com
                
    DISEÑO WEB:

        · Tecnologías utilizadas: 
            - HTML5*, creado por: Tim Berners-Lee
            - CSS3*, creado por: Håkon Wium Lie
            - JavaScript*, creado por: Brendan Eich
                - Librería* jQuery*, creado por: John Resig
            - PHP*, creado por: Rasmus Lerdorf
            - SQL*, creado por: Donald Chamberlin
            - MySQL*, creado por: Michael Widenius, David Axmark y Allan Larsson

        · Palabras clave:
            - Biblioteca
            - Libros
            - Socios

    MONETIZACIÓN:

        · biblioruci.org. es una organización sin ánimo de lucro, por lo que no recibe ingresos.  

    RECURSOS:

        · Herramientas software:

            - IDE*: Visual Studio Code - https://code.visualstudio.com/
            - Software de servidor web*: XAMPP - https://www.apachefriends.org/download.html

        · Bibliografías y Webgrafías:

            - Manual Imprescindible de HTML4
                _ autores: Germán Galeano, Pablo Díaz y José Carlos Sánchez 
                _ Editorial - ANAYA Multimedia
                _ ISBN: 84-415-1024-5

            - SQL Unleashed - autores:
                _ autores: Sakr Youness, Pierre Boutquin y Hans Ladanyl
                _ Editorial - SAMS
                _ ISBN: 0-672-31709-5

            - https://w3schools.com 
                _ empresa autora: Refsnes Data
            
            - https://github.com/Airgold3/Securesystem/tree/master/admin
                _ autor: Santiago Fernández López, Airgold3
            
            - https://www.lawebdelprogramador.com/foros/SQL/718157-Actualizar-campos-vacios.html
                _ empresa autora: Interactive Programmers Community

    CONCLUSIONES:

        · Facilidades:

            - Crear la estructura y organización de la web

        · Dificultades:

            - Programar la tecnología back-end* (PHP y MySQL) para solicitar el carné, aceptar las solicitudes
              del carné, iniciar sesión, solicitar préstamos y citas, añadir y retirar libros, 

        · Aspectos a mejorar:

            - Crear nuevas secciones
            - Cambiar los estilos*
            - Testeo en la navegación de la web para comprobar cómo interactúan los usuarios con ésta

    GLOSARIO:

        * HTML5 - Lenguaje de marcado (manera de codificar un documento que, junto al texto, se añade etiquetas o 
                  anotaciones con información relativa al texto) para estructurar páginas web.

        * CSS3 - Lenguaje de diseño gráfico para decorar HTML5.

        * JavaScript - Lenguaje de programación que permite hacer contenido dinámico en una página web.

        * Librería - Conjunto de archivos importables que se utilizan para desarrollar programas. Amplían las
                     funcionalidades de un lenguaje de programación.
        
        * jQuery - Librería de JavaScript que permite mostrar animaciones al interactuar con el contenido
                   de una página web.

        * back-end o backend - Tecnología que se ejecuta en el servidor web y se encarga de la lógica de una página web.

        * PHP - Lenguaje de programación back-end que permite la comunicación entre el cliente y el servidor.

        * SQL - Lenguaje de programación back-end que permite gestionar y consultar bases de datos. En esta página web ha
                sido utilizado para crear la base de datos.

        * MySQL - Lenguaje de programación back-end que permite gestionar y consultar bases de datos. En esta página web
                  ha sido utilizado para gestionar (modificar y visualizar) la base de datos.
        
        * IDE o Entorno de Desarrollo Integrado - Programa que proporciona al desarrollador servicios para facilitarle
                                                  la programación

        * Software para servidor web - Programas que permiten a casi cualquier ordenador ser un servidor web.
        
        * Estilos - Mecanismos que describe cómo se va a mostrar un documento en la pantalla. En esta página web los 
                    estilos han sido definidos con CSS3.
*/
?>
<?php
    require("../config.php");
    session_start();
    $error = ""; //variable para recoger los mensajes de error
    
    $servidor = "localhost";
    $usuario_servidor = "root";
    $contrasena_servidor = "";
    $base_datos = "biblioteca";
    $tabla = "socios";
    $charset = "utf8mb4";
    $conectar = mysqli_connect($servidor, $usuario_servidor, $contrasena_servidor, $base_datos);

    //comprobar si se quiere iniciar sesión
    $fichero_iniciar_sesion = fopen("../iniciar_sesion.php", "r");
    $fichero_sesion_bibliotecario = fopen("../sesion_bibliotecario.php", "r");
    $fichero_sesion_administrador = fopen("../sesion_administrador.php", "r");
    //comprobar si el usuario es bibliotecario o administrador
    $consulta_bibliotecario = "SELECT * FROM socios WHERE categoria = 'bibliotecario' AND correo_electronico = '$_SESSION[correo_electronico]'";
    $consulta_administrador = "SELECT * FROM socios WHERE categoria = 'administrador' AND correo_electronico = '$_SESSION[correo_electronico]'";
    //si consulta_categoria no está vacío, el usuario es bibliotecario o administrador
    if(!$consulta_bibliotecario & !$consulta_administrador){
        session_abort();
        header("Location: ../../index.html");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilos_biblioteca.css">
    <title>Retirar socios | Biblioteca</title>
</head>

<body>
    <header id="cabecera">
        <h1>Biblioteca</h1>
        <hr>
        <table id="tabla_cabecera" align="center">
            <tr>
                <div class="enlaces">
                    <td padding-left = "10px"><a href="../../index.html">Inicio</a></td>
                    <td padding-left = "10px"><a href="../../servicios.html">Servicios</a></td>
                    <td padding-left = "10px"><a href="../libros/buscar_libros.php">Catálogos</a></td>
                    <td padding-left = "10px"><a href="../../contacto.html">Contacto</a></td>
                    <td padding-left = "10px"><a href="../hacerse_socio.php">Hacerse socio</a></td>
                    <td padding-left = "10px"><a href="../cerrar_sesion.php">Cerrar sesión</a></td>
                </div>
            </tr>
        </table>
    </header>

    <div class="buscar">
        <input type="search" id="entrada_buscar">
        <button type="submit" id="boton_buscar">Buscar</button>
    </div>

    <?php
        $seleccionar2 = "SELECT * FROM socios WHERE categoria = 'bibliotecario' AND correo_electronico = '$_SESSION[correo_electronico]'";
        $seleccionsql2 = mysqli_query($conectar, $seleccionar2);
        $contador2 = mysqli_num_rows($seleccionsql2);

        $seleccionar3 = "SELECT * FROM socios WHERE categoria = 'administrador' AND correo_electronico = '$_SESSION[correo_electronico]'";
        $seleccionsql3 = mysqli_query($conectar, $seleccionar3);
        $contador3 = mysqli_num_rows($seleccionsql3);

        if($contador2 == 1){
            echo "<a href='../sesion_bibliotecario.php'>Volver</a>";
        }
        else if($contador3 == 1){
            echo "<a href='../sesion_administrador.php'>Volver</a>";
        }
        else{
            header("Location: ../../index.html"); //expulsar al usuario si no tiene una categoría válida
        }
    ?>

    <form action="#" method="POST" class="retirar_socios" id="retirar_socios">
        <input type="text" class="entrada_formulario" name="id_socio" id="id_socio" placeholder="ID socio" size="30%" required>
        <br>
        <input type="submit" class="entrada_formulario" name="retirar" value="Eliminar socio">
    </form>

    <table border="1" align="center" id="tabla_socios">
            <tr style='font-size:1.5em;'>
                <th><u>ID</u></th>
                <th><u>Nombre</u></th>
                <th><u>Apellidos</u></th>
                <th><u>Correo electrónico</u></th>
                <th><u>Nº teléfono</u></th>
                <th><u>Categoría</u></th>
                <th><u>Aceptado</u></th>
            </tr>

            <?php
                $socios = "SELECT * FROM socios ORDER BY aceptado, categoria, apellidos, nombre";
                $resultados_socios = mysqli_query($conectar, $socios);

                //código para mostrar los socios
                while($fila_socios = mysqli_fetch_array($resultados_socios)){
                    echo "<tr style='font-size:1.2em;'>"
                        ."<td>".$fila_socios["id"]."</td>"
                        ."<td>".$fila_socios["nombre"]."</td>"
                        ."<td>".$fila_socios["apellidos"]."</td>"
                        ."<td>".$fila_socios["correo_electronico"]."</td>"
                        ."<td>".$fila_socios["numero_telefono"]."</td>"
                        ."<td><b>".$fila_socios["categoria"]."</b></td>"
                        ."<td><b>".$fila_socios["aceptado"]."</b></td>"
                        ."</tr>"
                    ; //fin echo
                } //fin while  
            ?>
    </table>

    <?php      
        //variable con el valor introducido por el bibliotecario o administrador
        $id_socio = mysqli_real_escape_string($conectar, $_POST['id_socio']);

        //definir variable para consultar
        $correo_electronico = $_POST['correo_electronico'];
        //proteger el valor introducido de inyecciones SQL
        $correo_electronico = mysqli_real_escape_string($conectar,(strip_tags($correo_electronico,ENT_QUOTES)));
        //definir consulta para comprobar si el correo electrónico existe en la base de datos
        $sql = "SELECT * FROM $tabla WHERE id='$id_socio' AND categoria='cliente'";
        //realizar consulta
        $consulta = mysqli_query($conectar,$sql); 
        //contar cuantas líneas tiene la consulta.
        $lineas = mysqli_num_rows($consulta); 
        //resultado de la consulta
        $resultado = $conectar->query($sql);

        if ($lineas > 0){
            // Iniciar la sesion
            $_SESSION["login_user_sys"]=$correo_electronico;
        }

        //definir consulta para borrar los datos
        $retirar = sprintf("DELETE FROM socios WHERE id = $id_socio");
        //realizar la consulta anterior
        $sql = mysqli_query($conectar, $retirar);

        $seleccionar2 = "SELECT * FROM socios WHERE categoria = 'bibliotecario' AND correo_electronico = '$correo_electronico'";
        $seleccionsql2 = mysqli_query($conectar, $seleccionar2);
        $contador2 = mysqli_num_rows($seleccionsql2);

        $seleccionar3 = "SELECT * FROM socios WHERE categoria = 'administrador' AND correo_electronico = '$correo_electronico'";
        $seleccionsql3 = mysqli_query($conectar, $seleccionar3);
        $contador3 = mysqli_num_rows($seleccionsql3);

        //comprobar que el usuario que quiere retirar el socio es bibliotecario o administrador
        if($contador2 == 1 or $contador3 == 1){
            //definir consulta para eliminar una nueva fila a la tabla socios
            //$borrar = sprintf("DELETE FROM socios WHERE id = $id_socio");
            //realizar la consulta anterior
            $sql = mysqli_query($conectar, $retirar);

            //retirar socios
            if($sql){
                echo "Se ha retirado el socio de la base de datos";
            }
            else{
                echo "ERROR. No se ha podido retirar el socio de la base de datos.";
            }
        }
        else{
            die();
        }
    ?>
    
</body>
</html>
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
    require_once("../config.php");
    $error = ""; //variable para recoger los mensajes de error
    session_start();

    $servidor = "localhost";
    $usuario_servidor = "root";
    $contrasena_servidor = "";
    $base_datos = "biblioteca";
    $tabla = "socios";
    $charset = "utf8mb4";
    $conectar = mysqli_connect($servidor, $usuario_servidor, $contrasena_servidor, $base_datos);

    //comprobar si se quiere iniciar sesión
    $fichero_iniciar_sesion = fopen("../iniciar_sesion.php", "r");
    fclose($fichero_iniciar_sesion);
    $fichero_sesion_administrador = header("../sesion_administrador.php", "r");
    $fichero_sesion_bibliotecario = header("../sesion_bibliotecario.php", "r");
    $fichero_sesion_cliente = header("../sesion_cliente.php", "r");

    $correo_electronico = $_SESSION["correo_electronico"];
    $consulta_categoria = "SELECT * FROM socios WHERE categoria = 'administrador' AND correo_electronico = '$correo_electronico'";

    $seleccionar1 = "SELECT * FROM socios WHERE categoria = 'cliente' AND correo_electronico = '$_SESSION[correo_electronico]'";
    $seleccionsql1 = mysqli_query($conectar, $seleccionar1);
    $contador1 = mysqli_num_rows($seleccionsql1);

    $seleccionar2 = "SELECT * FROM socios WHERE categoria = 'bibliotecario' AND correo_electronico = '$_SESSION[correo_electronico]'";
    $seleccionsql2 = mysqli_query($conectar, $seleccionar2);
    $contador2 = mysqli_num_rows($seleccionsql2);

    $seleccionar3 = "SELECT * FROM socios WHERE categoria = 'administrador' AND correo_electronico = '$_SESSION[correo_electronico]'";
    $seleccionsql3 = mysqli_query($conectar, $seleccionar3);
    $contador3 = mysqli_num_rows($seleccionsql3);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilos_biblioteca.css">
    <title>Cita previa | Biblioteca</title>
</head>

<body>
    <header id="cabecera_sesion">
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
                    <td padding-left = "10px"><a href="/rrar_sesion.php">Cerrar sesión</a></td>
                </div>
            </tr>
        </table>
    </header>
    
    <div class="buscar">
        <input type="search" id="entrada_buscar">
        <button type="submit" id="boton_buscar">Buscar</button>
    </div>

    <?php
        if($contador1 == 1){
            echo "<a href='../sesion_cliente.php'>Volver</a>";
        }
        else if($contador2 == 1){
            echo "<a href='../sesion_bibliotecario.php'>Volver</a>";
        }
        else if($contador3 == 1){
            echo "<a href='../sesion_administrador.php'>Volver</a>";
        }
        else{
            header("Location: ../../index.html"); //expulsar al usuario si no tiene una categoría válida
        }
    ?>

    <h1 class="titulo">Solicitar cita previa</h1>

    <form action="#" method="POST" class="iniciar_sesion" id="iniciar_sesion" style="margin-top: 20px" >
        <input type="date" class="entrada_formulario" name="entrada_fecha" id='entrada_fecha' size="50%" required>
        <br>
        <input type="time" class="entrada_formulario" name="entrada_hora" id='entrada_hora' size="50%" required>        
        <br>
        <input type="submit" name="enviar_solicitud" value="Enviar solicitud">
    </form>    
    
    <?php
        if($correo_electronico != "" && !empty($_POST['entrada_fecha'] && !empty($_POST['entrada_hora']))){
            //Recoger los valores introducidos en el formulario
            $fecha = mysqli_real_escape_string($conectar, $_POST['entrada_fecha']);
            $hora = mysqli_real_escape_string($conectar, $_POST['entrada_hora']);
            //concatenar los dos valores anteriores
            $fecha_hora = $fecha . " " . $hora;

            if ($fecha != NULL & $hora != NULL){
                //Definir consulta para insertar en la base de datos el correo electrónico, la fecha y la hora
                $consulta_fecha_hora = sprintf("INSERT INTO citas (correo_cita, fecha_hora_cita) VALUES ('$correo_electronico', '$fecha_hora')");
                //Ejecutar la consulta anterior
                $insertar_fecha_hora = mysqli_query($conectar, $consulta_fecha_hora);

                if($insertar_fecha_hora){
                    echo "<h2>La cita ha sido solicitada correcamente</h2>";
                }
                else{
                    echo "<h2>ERROR: No se ha podido solicitar la cita</h2>";
                }

            }//fin if ($fecha != NULL & $hora != NULL)
        } //fin if($correo_electronico != "" && (!empty($_POST['entrada_solicitud'])))
    ?>

</body>
</html>
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos_biblioteca.css">
    <title>Iniciar sesión | Biblioteca</title>
</head>

<body id="cuerpo_iniciar_sesion">
    <header id="cabecera">
        <h1>Biblioteca</h1>
        <hr>
        <table id="tabla_cabecera" align="center">
            <tr>
                <div class="enlaces">
                    <td padding-left = "10px"><a href="../index.html">Inicio</a></td>
                    <td padding-left = "10px"><a href="../servicios.html">Servicios</a></td>
                    <td padding-left = "10px"><a href="libros/buscar_libros.php">Catálogos</a></td>
                    <td padding-left = "10px"><a href="../contacto.html">Contacto</a></td>
                    <td padding-left = "10px"><a href="hacerse_socio.php">Hacerse socio</a></td>
                    <td padding-left = "10px"><a href="iniciar_sesion.php">Iniciar sesión</a></td>
                </div>
            </tr>
        </table>
    </header>

    <div class="buscar">
        <input type="search" id="entrada_buscar">
        <button type="submit" id="boton_buscar">Buscar</button>
    </div>
    
    <div class="titulo">
        <h1>Iniciar sesión</h1>
    </div>

    <form action="#" method="POST" class="iniciar_sesion" id="iniciar_sesion">
        <section>
            <div class="entrada_iniciar_sesion">
                <input type="email" class="entrada_formulario" name="correo_electronico" id='correo_electronico' placeholder="Introduzca su dirección de correo electrónico" size="36%" required>
                <br>
                <input type="password" class="entrada_formulario" name="clave" id='clave' placeholder="Introduzca su clave de acceso" size="36%" required>
            </div>
            <div class="boton_iniciar_sesion">
                <input type="submit" name="iniciar_sesion" value="Iniciar sesión">
            </div>

            <div class="boton_borrar">
                <input type="reset" name="Borrar" value="Borrar">
            </div>
        </section>
    </form>

    <div class="enlace_hacerse_socio" style='text-align:center;'>
        <p>¿Todavía no es un socio? <a href="./hacerse_socio.php">Hágase socio</a></p>
    </div>

    <?php
        require_once("config.php");
        session_start();
        $error = ""; //variable para recoger los mensajes de error

        $servidor = "localhost";
        $usuario_servidor = "root";
        $contrasena_servidor = "";
        $base_datos = "biblioteca";
        $tabla = "socios";
        $charset = "utf8mb4";
        $conectar = mysqli_connect($servidor, $usuario_servidor, $contrasena_servidor, $base_datos);

        $fichero_iniciar_sesion = fopen("./iniciar_sesion.php", "r");

        //comprobar si se quiere iniciar sesión
        if(empty ($_POST["correo_electronico"]) || empty ($_POST["clave"])){
            echo "<h3 style='text-align:center;'>Introduzca sus datos de acceso</h3>";
        }
        else{
            //consultar si existe el socio
            if(isset($_POST['iniciar_sesion'])){
                //Recoger los valores introducidos en el formulario
                $correo_electronico = mysqli_real_escape_string($conectar, $_POST['correo_electronico']);
                $clave = mysqli_real_escape_string($conectar, $_POST['clave']);
                //Hashear la clave con un hash de tipo sha3-512 (la última familia de hashes)
                $clave_cifrada = hash("sha3-512", $clave);
                
                //Definir consulta para seleccionar de la base de datos, el correo y la clave correspondientes de cada usuario
                $insertar = "SELECT * FROM socios WHERE correo_electronico = '$correo_electronico' AND clave = '$clave_cifrada'";
                //Ejecutar la consulta anterior
                $sql = mysqli_query($conectar, $insertar);
                //Contar el numero de lineas de la consulta para verificar que existe el usuario
                $contador = mysqli_num_rows($sql);

                if($contador == 1){
                    //CONSULTAS PARA COMPROBAR LA CATEGORÍA DEL USUARIO
                    $seleccionar1 = "SELECT * FROM socios WHERE categoria = 'cliente' AND correo_electronico = '$correo_electronico' AND aceptado = '1'";
                    $seleccionsql1 = mysqli_query($conectar, $seleccionar1);
                    $contador1 = mysqli_num_rows($seleccionsql1);

                    $seleccionar2 = "SELECT * FROM socios WHERE categoria = 'bibliotecario' AND correo_electronico = '$correo_electronico' AND aceptado = '1'";
                    $seleccionsql2 = mysqli_query($conectar, $seleccionar2);
                    $contador2 = mysqli_num_rows($seleccionsql2);

                    $seleccionar3 = "SELECT * FROM socios WHERE categoria = 'administrador' AND correo_electronico = '$correo_electronico' AND aceptado = '1'";
                    $seleccionsql3 = mysqli_query($conectar, $seleccionar3);
                    $contador3 = mysqli_num_rows($seleccionsql3);
                    
                    //CONSULTAS PARA LOS USUARIOS QUE HAN SOLICITADO EL CARNÉ PERO NO LO HA ACEPTADO NINGÚN BIBLIOTECARIO O ADMINISTRADOR 
                    $seleccionar4 = "SELECT * FROM socios WHERE categoria = 'cliente' AND correo_electronico = '$correo_electronico' AND aceptado != '1'";
                    $seleccionsql4 = mysqli_query($conectar, $seleccionar4);
                    $contador4 = mysqli_num_rows($seleccionsql1);

                    $seleccionar5 = "SELECT * FROM socios WHERE categoria = 'bibliotecario' AND correo_electronico = '$correo_electronico' AND aceptado != '1'";
                    $seleccionsql5 = mysqli_query($conectar, $seleccionar5);
                    $contador5 = mysqli_num_rows($seleccionsql2);

                    $seleccionar6 = "SELECT * FROM socios WHERE categoria = 'administrador' AND correo_electronico = '$correo_electronico' AND aceptado != '1'";
                    $seleccionsql6 = mysqli_query($conectar, $seleccionar6);
                    $contador6 = mysqli_num_rows($seleccionsql3);

                    //redirigir al usuario a una página u otra según su categoría
                    if($contador1 == 1){
                        session_start();
                        $_SESSION["correo_electronico"] = $correo_electronico;
                        $_SESSION["id"] = $id;
                        fclose($fichero_iniciar_sesion);
                        header("Location: ./sesion_cliente.php");
                    }
                    else if($contador2 == 1){
                        session_start();
                        $_SESSION["correo_electronico"] = $correo_electronico;
                        $_SESSION["id"] = $id;
                        fclose($fichero_iniciar_sesion);
                        header("Location: ./sesion_bibliotecario.php");
                    }
                    else if($contador3 == 1){
                        session_start();
                        $_SESSION["correo_electronico"] = $correo_electronico;
                        $_SESSION["id"] = $id;
                        fclose($fichero_iniciar_sesion);
                        header("Location: ./sesion_administrador.php");
                    }
                    else if ($contador4 == 1){
                        echo "<h2>
                                Usted ha solicitado su carné, pero ningún bibliotecario lo ha aceptado. <br>
                                Acuda a la biblioteca para que su carné sea aceptado.
                            </h2>";
                    }
                    else if($contador5 == 1 || $contador6 == 1){
                        echo "<h2>
                                Usted ha solicitado su carné, pero ningún administrador lo ha aceptado. <br>
                                Acuda a la biblioteca para que su carné sea aceptado.
                            </h2>"; 
                    }
                    else{
                        echo "<h2>Ha habido un error</h2>";
                    }
                } //fin if (contador == 1)
                else{
                    echo "<h2>El usuario o la contraseña son incorrectos</h2>";
                }
            } //fin if(isset ($_POST['iniciar_sesion'])))
        } //fin if(empty($_POST["correo_electronico"]))
    ?>
</body>
</html>
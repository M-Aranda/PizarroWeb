<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página principal</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <style type="text/css">
            body { background: navy !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */

            img{
                max-width:150px;
                max-height:150px;
            }
        </style>



    </head>
    <body>
        <h2>Bienvenido, estos son nuestros productos:<h2>

                <?php
                require_once ("../Model/Producto.php");
                require_once ("../Model/DAO/DAO_Producto.php");


                $dao_producto = new DAO_Producto();

                $listadoDeProductos = $dao_producto->read();
                ?>


                <table>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <?php foreach ($listadoDeProductos as $p) { ?>

                        <tr>
                            <td><?php echo $p->getNombre(); ?> </td>
                            <td><img src=<?php echo "../Imagenes/".$p->getRutaDeImagen().".jpg"; ?> > </td>
                            <td><?php echo $p->getPrecio(); ?> </td>
                        </tr>

                        <?php
                    }
                    ?>


                </table>







                </body>
                </html>

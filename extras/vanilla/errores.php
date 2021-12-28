<?php

    ######## errores | excepciones
    /*
    intentá esto{

        código
    }capturamos( $handler )
    {
        código a ejecutar si falla
    }
    */
    try{
        $x = 50/0;
        echo $x;
    }catch ( Error $e ){
        echo 'Error o excepción <br>';
        //redirección
        //guardamos en un log
        echo 'Mensaje: ', $e->getMessage(),'<br>';
        echo 'Archivo: ', $e->getFile(),'<br>';
        echo 'en la línea: ', $e->getLine();
    }

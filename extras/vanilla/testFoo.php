<?php

/**
 *  Clase de prueba para explicar PHPDoc
 */
class Foo{

    /**
     * @param string $nombre
     * @param int $precio
     * @return string
     */
    public function metodoA(string $nombre, int $precio ) :string
            {
                return 'resultado';
            }

    /**
     * @param Producto $producto
     */
    public function metodoB(Producto $producto ) :void
            {
                //
            }
    }

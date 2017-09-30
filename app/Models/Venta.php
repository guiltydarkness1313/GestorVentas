<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    private $listaGaseosas;
    private static $_INSTANCE=null;

    /**
     * Venta constructor.
     */
     function __construct()
    {
        $this->listaGaseosas=array(
            array("Inca Kola",3.0,90),
            array("Coca Cola",3.0,80),
            array("Guarana",1.5,86),
            array("Pepsi",1.8,65),
            array("Sprite",2.0,45)
             );

    }
    public static function getInstance(){
        if(!self::$_INSTANCE instanceof self){
            self::$_INSTANCE=new self();
        }
        return self::$_INSTANCE;
    }

    /**
     * @return array
     */
    public function getListaGaseosas()
    {
        return $this->listaGaseosas;
    }

    /**
     * @param array $listaGaseosas
     */
    public function setListaGaseosas($listaGaseosas)
    {
        $this->listaGaseosas = $listaGaseosas;
    }

}

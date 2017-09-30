<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    //creacion de las listas de gaseosas
    public function SetData(){
        $instancia=Venta::getInstance();
        $lista=$instancia->getListaGaseosas();
        return $lista;
    }

    public function ViewData(){
        $instancia=Venta::getInstance();
        echo "<h1>Productos disponibles</h1> <br>";
        echo "<h5>Nombre Precio Cantidad</h5>";
            $lista=$instancia->getListaGaseosas();
            for($i=0;$i<5;$i++){
                for($j=0;$j<3;$j++){
                    echo "{$lista[$i][$j]}";
                    echo '&nbsp;&nbsp;&nbsp;';
                }
                echo "<br>";
            }
    }

    /**
     * @param Request $request
     */
    public function TomarPedido(Request $request){
        //iniciar valores del request
        $instancia=Venta::getInstance();
        $lista=$instancia->getListaGaseosas();

        $cantidadPedida=$request->input('cantidad');
        $marcaPedida=$request->input('marca');
        $montoPedido=$request->input('monto');

        for($i=0;$i<5;$i++){
            for($j=0;$j<1;$j++){
                if($lista[$i][$j]==$marcaPedida){
                    $precioProducto=$lista[$i][1];
                    $cantidadProducto=$lista[$i][2];
                    //incio de logica para poder ver si le alcanza el dinero
                    $montoTotal=$cantidadPedida*$precioProducto;

                    if($montoPedido>=$montoTotal){
                        if($cantidadPedida<=$cantidadProducto){
                            //se puede realizar compra
                           // echo "me voy a la mrd ya pyedo comprar";
                                $lista[$i][2]=$lista[$i][2]-$cantidadPedida;
                                //$this->ViewData($lista);
                                $instancia=Venta::getInstance();
                                $instancia->setListaGaseosas($lista);
                                $this->ViewData();
                                $montoRes=$montoTotal-$montoPedido;
                                echo "<h2>Su monto restante es: $montoRes</h2>";
                                echo '<p><a href="/ventas/productos">Ver Mas</a></p>';

                        }else {
                            echo "No puedes comprar porque ya no hay stock XD";
                            $this->ViewData();
                        }
                    }else{
                        echo "No se puede realizar compras debido a la cantidad insuficiente de dinero";
                    }
                }else{
                    //no se encuentra el pedido

                    //echo "$marcaPedida";
                }
            }
            //echo "no se encuentra el pedido :v<br>";
            }
    }

    public function index() {
        $this->ViewData($this->SetData());
        return view('ventas');
    }

}

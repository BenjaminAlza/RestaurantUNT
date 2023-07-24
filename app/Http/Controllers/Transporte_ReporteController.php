<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporte_Cliente;
use App\Models\Transporte_DetallePedido;
use App\Models\Transporte_Pedido;
use App\Models\Transporte_Producto;
use App\Models\Transporte_Repartidor;
use Barryvdh\DomPDF\PDF;

class Transporte_ReporteController extends Controller
{
    public function generarReportePDFCliente()
    {
        $clienteT = Transporte_Cliente::all();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('transporte.reporte.clientes', compact('clienteT'));

        return $pdf->download('reporte_clientes.pdf');
    }
    public function generarReportePDFRepartidor()
    {
        $repartidorT = Transporte_Repartidor::all();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('transporte.reporte.repartidores', compact('repartidorT'));

        return $pdf->download('reporte_repartidores.pdf');
    }
    public function generarReportePDFProducto()
    {
        $productoT = Transporte_Producto::all();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('transporte.reporte.Productos', compact('productoT'));

        return $pdf->download('reporte_productos.pdf');
    }
    public function generarReportePDFPedido()
    {
        $pedidoT = Transporte_Pedido::all();
        // Suponiendo que tienes una colección de pedidos en la variable $pedidoT
        // $totalPedidos = $pedidoT->sum('cantidad');
        // return view('transporte.reporte.pedidos', compact('pedidoT', 'totalPedidos'));

        $totalPedidos = $pedidoT->sum('cantidad');
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('transporte.reporte.Pedidos', compact('pedidoT', 'totalPedidos'));

        return $pdf->download('reporte_pedidos.pdf');
    }
    public function generarReportePDFPedidoDetalle()
    {
        $detalleT = Transporte_DetallePedido::all();

        // Calcular el total a pagar por cliente
        $pagosPorCliente = [];
        foreach ($detalleT as $itemDetalleT) {
            $clienteNombre = $itemDetalleT->pedido->cliente->nombre;
            $idProducto = $itemDetalleT->idProducto;
            $cantidadProducto = $itemDetalleT->cantidad;

            // Obtener el pedido al que pertenece el detalle
            $pedido = Transporte_Pedido::find($itemDetalleT->idPedido);

            // Verificar si el pedido existe y si tiene productos
            if ($pedido && $pedido->productos->isNotEmpty()) {
                // Obtener el producto específico del pedido con el idProducto
                $producto = $pedido->productos->where('idProducto', $idProducto)->first();

                // Verificar si el producto existe y obtener el precio
                if ($producto) {
                    $precioProducto = $producto->precio;

                    // Calcular el total a pagar por el producto en el detalle
                    $totalPagar = $precioProducto * $cantidadProducto;

                    if (!isset($pagosPorCliente[$clienteNombre])) {
                        $pagosPorCliente[$clienteNombre] = 0;
                    }

                    $pagosPorCliente[$clienteNombre] += $totalPagar;
                }
            }
        }

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('transporte.reporte.PedidosEnviados', compact('detalleT', 'pagosPorCliente'));

        return $pdf->download('reporte_pedidosEnviados.pdf');
    }
}

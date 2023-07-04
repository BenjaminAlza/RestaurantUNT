<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Mesa;
use App\Models\Detalle;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    const PAGINATION = 20;
    public function index(Request $request)
    {
        $buscar=$request->get('buscar');
        $pedido=Pedido::where('estado','=','1')->where('idpedido','like','%'.$buscar.'%')->paginate($this::PAGINATION);
        return view('pedidos.index',compact('pedido','buscar'));
    }

    public function create()
    {
        $cliente=Cliente::all();
        return view('pedidos.create',compact('cliente'));
    }

    public function create2($id)
    {
        $mesa=Mesa::FindOrFail($id);
        
        $cliente=Cliente::all();
        return view('pedidos.create2',compact('cliente','mesa'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'medioPago'=>'required',
            'modalidad'=>'required',

        ],[
            'medioPago.required'=>'Elija un medio de Pago',
            'modalidad.required'=>'Elija una modalidad',
        ]);
        $pedido = new Pedido();

        if($request->idcliente>0)
        {
            $pedido->situacion = '0';
            $pedido->idcliente = $request->idcliente;
        }
        else
        {
            $pedido->situacion = '0';
            $pedido->idcliente = null;
        }
        $pedido->montoTotal = $request->montoToatl;
        $pedido->observaciones = $request->observaciones;
        $pedido->medioPago = $request->medioPago;
        $pedido->modalidad = $request->modalidad;
        $pedido->estado = '1';
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos','Pedido Nuevo Guardado ...!');
    }

    public function store2(Request $request,$id)
    {
        $data=request()->validate([
            'medioPago'=>'required',
            'modalidad'=>'required',
            

        ],[
            'medioPago.required'=>'Elija un medio de Pago',
            'modalidad.required'=>'Elija una modalidad',
        ]);
        $pedido= new Pedido();
        
        if($request->idcliente>0)
        {
            $pedido->situacion = '0';
            $pedido->idcliente = $request->idcliente;
        }
        else
        {
            $pedido->situacion = '0';
            $pedido->idcliente = null;
        }
        $pedido->montoTotal = $request->montoToatl;
        $pedido->observaciones = $request->observaciones;
        $pedido->medioPago = $request->medioPago;
        $pedido->modalidad = $request->modalidad;
        $pedido->estado = '1';
        $pedido->save();
        $mesa=Mesa::FindOrFail($id);
        $mesa->idpedido=$pedido->idpedido;
        $mesa->disponibilidad = 1;
        $mesa->save();
        return redirect()->route('pedido.index')->with('datos','Pedido Nuevo Guardado ...!');
    }

    public function show($id)
    {
        $pedido=Pedido::findOrFail($id);
        return view('pedidos.show',compact('pedido'));
    }

    public function edit($id)
    {
        $cliente=Cliente::all();
        $pedido=Pedido::findOrFail($id);
        return view('pedidos.edit',compact('pedido','cliente'));
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'medioPago'=>'required',
            'modalidad'=>'required',

        ],[
            'medioPago.required'=>'Elija un medio de Pago',
            'modalidad.required'=>'Elija una modalidad',
        ]);
        $pedido=Pedido::findOrFail($id);
        
        if($request->idcliente>0)
        {
            $pedido->situacion = '0';
            $pedido->idcliente = $request->idcliente;
        }
        else
        {
            $pedido->situacion = '0';
            $pedido->idcliente = null;
        }

        $pedido->montoTotal = $request->montoToatl;
        $pedido->observaciones = $request->observaciones;
        $pedido->medioPago = $request->medioPago;
        $pedido->modalidad = $request->modalidad;
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos','Pedido Actualizado ...!');
    }

    public function update2(Request $request, $id)
    {
        $data=request()->validate([
            'medioPago'=>'required',
            'modalidad'=>'required',

        ],[
            'medioPago.required'=>'Elija un medio de Pago',
            'modalidad.required'=>'Elija una modalidad',
        ]);
        $pedido=Pedido::findOrFail($id);
        
        if($request->idcliente>0)
        {
            $pedido->situacion = '0';
            $pedido->idcliente = $request->idcliente;
        }
        else
        {
            $pedido->situacion = '0';
            $pedido->idcliente = null;
        }

        $pedido->medioPago = $request->medioPago;
        $pedido->modalidad = $request->modalidad;
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos','Pedido Actualizado ...!');
    }

    public function confirmar($id)
    {
        //confirmar eliminación (destroy)
        $pedido=Pedido::findOrFail($id);
        return view('pedidos.confirmar',compact('pedido'));
    }

    public function destroy($id)
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->estado='0';
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos','Pedido Eliminado ...!');
    }

    public function editpago($id)
    {
       
        $cliente=Cliente::all();
        $pedido=Pedido::findOrFail($id);
        $detalle = Detalle::where('idpedido','=',$id)->get();
        if($pedido->idcliente!=null)
        {
            return view('pedidos.pago',compact('pedido','cliente','detalle'));
        }
        else
        {
            echo "<script>alert('No se puede generar Pago, ingrese Cliente');</script>";
            return redirect()->route('pedido.index');
        }
       
    }

    public function actualizarpedido($id)
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->situacion='1';
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos','Pedido Actualizado ...!');
    }

}

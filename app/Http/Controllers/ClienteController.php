<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $razonSocialSearch = $request->get('razon_social');
        $cuitSearch = $request->get('cuit');
        //La DB debería ir en Models
        $filter = DB::table('clientes')
            ->where('razon_social', 'like', "%{$razonSocialSearch}%")
            ->orWhere('cuit', 'like', "{$cuitSearch}%")
            ->get();

        $clientes['clientes'] = Cliente::paginate(5);

        $params = [
            'title' => 'Planilla de Clientes'
        ];
        return view('clientes.index', $params, $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Alta Cliente'
        ];
        return view('clientes.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = [
            'razon_social' => 'required|max:255',
            'cuit' => 'required|numeric'
        ];
        $message = [
            'required' => 'El campo :attribute es obligatorio'
        ];
        $this->validate($request, $validations, $message);
        $razonSocial = $request->post('razon_social');
        $cuit = $request->post('cuit');

        DB::insert('insert into clientes (razon_social, cuit) values (?, ?)', [$razonSocial, $cuit]);
        return response()->redirectTo('/clientes')->with('status', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = DB::table('clientes')
            ->where('id', '=', $id)
            ->first();
        $params = [
            'cliente' => $cliente,
            'title' => 'Detalle de cliente'
        ];
        return view('clientes.show', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::findOrFail($id);
        $params = [
            'title' => 'Editar datos',
            'id' => $id,
            'cliente' => $cliente
        ];
        return view('clientes.edit', $params, compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validations = [
            'razon_social' => 'required|max:255',
            'cuit' => 'required|numeric'
        ];
        $message = [
            'required' => 'El campo :attribute es obligatorio'
        ];
        $this->validate($request, $validations, $message);

        $datos = request()->except(['_token', '_method']);

        Cliente::where('id', '=', $id)->update($datos);

        $cliente=Cliente::findOrFail($id);
        $params = [
            'title' => 'Editar datos',
            'cliente' => $cliente
        ];
        return redirect('/clientes/' . $id)->with('status', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($cliente=Cliente::findOrFail($id)) {
            Cliente::destroy($id);
        }
        return redirect('clientes')->with('status', 'Cliente eliminado con éxito');
    }
}

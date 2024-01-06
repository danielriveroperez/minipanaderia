<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all(); //Se consultan todos los clientes
        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cliente::create($request->all());
        return to_route('clientes.index')->with('info', 'Cliente creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return to_route('clientes.index')->with('info', 'Cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return to_route('clientes.index')->with('info', 'Cliente eliminado con éxito');
    }

    //Protegemos las rutas de este controlador con el middleware auth y admin (autenticado y rol de admin)
    public function __construct()
    {
        //Sólo los usuarios autenticados y con rol de admin pueden acceder a todos los métodos de este controlador
        $this->middleware('auth');
        $this->middleware('admin');
    }


    
}


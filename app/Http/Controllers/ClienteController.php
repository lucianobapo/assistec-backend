<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClienteController extends Controller
{
    protected $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(){
        $data = $this->cliente->paginate(5);
        return view('dataIndex', compact('data'))->with([
            'dataModelInstance' => $this->cliente,
            'route' => 'cliente',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
        return view('dataShow')->with([
            'data' => $cliente,
        ]);
    }

    public function edit($cliente)
    {
        $data = $this->cliente->paginate(5);
        return view('dataIndex', compact('data'))->with([
            'dataModel' => $cliente,
            'route' => 'cliente',
        ]);
    }
}

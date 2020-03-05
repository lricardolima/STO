<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use	App\Http\Requests;
use	App\Clientes;
use Exception;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::orderBy('nome', 'ASC')->paginate(5);
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required|min:3',
            'sobrenome'=>'required|min:3',
            'dt_nasc'=>'required',
            'sexo'=>'required',
            'email'=>'required|unique:clientes',
            'cpf'=>'required|unique:clientes',
            'celular'=>'required',
            'cep'=>'required',
            'endereco'=>'required',
            'cmpto'=>'required',
            'numero'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'estado'=>'required',
        ]);

        try
        {
            Clientes::create([
                'nome'=>$request->nome,
                'sobrenome'=>$request->sobrenome,
                'dt_nasc'=>$request->dt_nasc,
                'sexo'=>$request->sexo,
                'email'=>$request->email,
                'cpf'=>$request->cpf,
                'celular'=>$request->celular,
                'cep'=>$request->cep,
                'endereco'=>$request->endereco,
                'cmpto'=>$request->cmpto,
                'numero'=>$request->numero,
                'bairro'=>$request->bairro,
                'cidade'=>$request->cidade,
                'estado'=>$request->estado,
            ]);

            $mensagem = "Cliente cadastrado com sucesso!";
            return redirect()->route('cliente.index')->with('sucess', $mensagem);
        }

        catch(\Exception $e)
        {
            return redirect()->route('cliente.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = Clientes::all();
        return view('cliente.show', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::find($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Clientes::find($id);
        $request -> validate([
            'nome'=>'required|min:3',
            'sobrenome'=>'required|min:3',
            'dt_nasc'=>'required',
            'sexo'=>'required',
            'email'=>'required|unique:clientes',
            'cpf'=>'required|unique:clientes',
            'celular'=>'required',
            'cep'=>'required',
            'endereco'=>'required',
            'cmpto'=>'required',
            'numero'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'estado'=>'required',
        ]);
        try
        {
            Clientes::whereId($id)->update([
                'nome'=>$request->nome,
                'sobrenome'=>$request->sobrenome,
                'dt_nasc'=>$request->dt_nasc,
                'sexo'=>$request->sexo,
                'email'=>$request->email,
                'cpf'=>$request->cpf,
                'celular'=>$request->celular,
                'cep'=>$request->cep,
                'endereco'=>$request->endereco,
                'cmpto'=>$request->cmpto,
                'numero'=>$request->numero,
                'bairro'=>$request->bairro,
                'cidade'=>$request->cidade,
                'estado'=>$request->estado,
            ]);
            $mensagem = "Cliente alterado com sucesso!";
            return redirect()->route('create.index')->with('sucess',$mensagem);
        }

        catch (\Exception $e)
        {
            return redirect()->route('cliente.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::destroy($id);
        return redirect()->route('cliente.index');
    }
}

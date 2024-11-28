<?php

namespace App\Http\Controllers\Notificacao;

use App\Http\Controllers\Controller;
use App\Models\Notificacao;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class NotificacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::id();
        // usuario que estiver cadastrado e authenticado 

        $usuarioAuth = User::where('id', $user)->get();
        // pegar a Informações do mesmo tipo endereço e telefone
        $data=$request->validate([
            
        ]);
        


    }

    /**
     * Display the specified resource.
     */
    public function show(Notificacao $notificacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notificacao $notificacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notificacao $notificacao)
    {
        //
    }
}

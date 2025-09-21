<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        // Lógica para listar todas as bandas
    }

    public function create()
    {
        // Lógica para mostrar o formulário de criação de banda
    }

    public function store(Request $request)
    {
        // Lógica para armazenar uma nova banda
    }

    public function show($id)
    {
        // Lógica para mostrar uma banda específica
    }

    public function edit($id)
    {
        // Lógica para mostrar o formulário de edição de banda
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar uma banda específica
    }

    public function destroy($id)
    {
        // Lógica para apagar uma banda específica
    }
}

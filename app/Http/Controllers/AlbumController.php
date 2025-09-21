<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        // Lógica para listar todos os álbuns
    }

    public function create()
    {
        // Lógica para mostrar o formulário de criação de álbum
    }

    public function store(Request $request)
    {
        // Lógica para armazenar um novo álbum
    }

    public function show($id)
    {
        // Lógica para mostrar um álbum específico
    }

    public function edit($id)
    {
        // Lógica para mostrar o formulário de edição de álbum
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar um álbum específico
    }

    public function destroy($id)
    {
        // Lógica para apagar um álbum específico
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    protected function allowOnlyAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('albums.index')->with('error', 'Access denied. Admins only.');
        }
    }

    public function index()
    {
        // Lógica para listar todos os álbuns
        $albums = DB::table('albums')
        ->join('bands', 'albums.band_id', '=', 'bands.id')
        ->select('albums.*', 'bands.name as band_name')
        ->get();

        return view('albums.index', compact('albums'));
    }

    public function create()
    {

        $response = $this->allowOnlyAdmin();
        if ($response) {
            return $response;
        }
        // Lógica para mostrar o formulário de criação de álbum

    $bands = Band::get();
    return view('albums.create', compact('bands'));
    }


    public function store(Request $request)
    {
        // Lógica para armazenar um novo álbum
        $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable|string',
            'band_id' => 'required|integer|exists:bands,id',
        ]);

        DB::table('albums')->insert([
            'name' => $request->input('name'),
            'release_date' => $request->input('release_date'),
            'image' => $request->input('image'),
            'band_id' => $request->input('band_id'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('albums.index')->with('success', 'Album created sucessfully!');
    }

    public function show($id)
    {
        // Lógica para mostrar um álbum específico
        $album = DB::table('albums')->where('id', $id)->first();
        if (!$album) {
            return redirect()->route('albums.index')->with('error', 'Album not found.');
        }
        return view('albums.show', compact('album'));
    }

    public function edit($id)
    {
        // Lógica para mostrar o formulário de edição de álbum
        $album = DB::table('albums')->where('id', $id)->first();
        $bands = DB::table('bands')->get();
        if (!$album) {
            return redirect()->route('albums.index')->with('error', 'Album not found.');
    }
    return view('albums.edit', compact('album', 'bands'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar um álbum específico
        $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'photo' => 'nullable|string',
            'band_id' => 'required|integer|exists:bands,id',
        ]);

        $updated = DB::table('albums')->where('id', $id)->update([
            'name' => $request->input('name'),
            'release_date' => $request->input('release_date'),
            'photo' => $request->input('photo'),
            'band_id' => $request->input('band_id'),
            'updated_at' => now(),
        ]);

        if ($updated) {
            return redirect()->route('albums.index')->with('success', 'Album updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update album.');
        }
    }

    public function destroy($id)
    {
        // Lógica para apagar um álbum específico
        $deleted = DB::table('albums')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('albums.index')->with('success', 'Album deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete album.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BandController extends Controller
{
    public function index()
    {
        // Lógica para listar todas as bandas
        $bands = DB:: table('bands')
        ->leftJoin('albums', 'bands.id', '=', 'albums.band_id')
        ->select('bands.*', DB::raw('COUNT(albums.id) as number_of_albums'))
        ->groupBy('bands.id')
        ->get();

        if ($bands->isEmpty()) {
            return view('bands.index', ['bands' => $bands])->with('info', 'No bands found.');
        }
        return view('bands.index', ['bands' => $bands
        ]);
    }

    public function create()
    {
        // Lógica para mostrar o formulário de criação de banda
        return view('bands.create');
    }

    public function store(Request $request)
    {
        // Lógica para armazenar uma nova banda
             $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string',
        ]);

       DB:: table('bands')->insert([
        'name' => $request->name,
        'photo' => $request->photo,
        'number_of_albums' => 0,
        'created_at' => now(),
        'updated_at' => now(),
        ]);

        return redirect()->route('bands.index')
                         ->with('success', 'Band created successfully.');
    }

    public function show($id)
    {
        // Lógica para mostrar uma banda específica
        $band = DB:: table('bands')->where('id', $id)->first();
        $albums = DB:: table('albums')->where('band_id', $id)->get();
        return view('bands.show', compact('band', 'albums'));
    }

    public function edit($id)
    {
        // Lógica para mostrar o formulário de edição de banda
        $band = DB:: table('bands')->where('id', $id)->first();
        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar uma banda específica
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string',
        ]);

        DB:: table('bands')->where('id', $id)->update([
        'name' => $request->name,
        'photo' => $request->photo,
         ]);

        return redirect()->route('bands.index')
                         ->with('success', 'Band updated successfully.');
    }

    public function destroy($id)
    {
        // Lógica para apagar uma banda específica
        DB:: table('bands')->where('id', $id)->delete();

        return redirect()->route('bands.index')
                         ->with('success', 'Band deleted successfully.');
    }
}

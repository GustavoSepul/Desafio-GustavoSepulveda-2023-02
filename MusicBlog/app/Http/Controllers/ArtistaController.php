<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

/**
 * Class ArtistaController
 * @package App\Http\Controllers
 */
class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artistas = Artista::paginate();

        return view('artista.index', compact('artistas'))
            ->with('i', (request()->input('page', 1) - 1) * $artistas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artista = new Artista();
        return view('artista.create', compact('artista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Artista::$rules);

        $artista = Artista::create($request->all());

        return redirect()->route('artistas.index')
            ->with('success', 'Artista created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artista = Artista::find($id);

        return view('artista.show', compact('artista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artista = Artista::find($id);

        return view('artista.edit', compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Artista $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artista $artista)
    {
        request()->validate(Artista::$rules);

        $artista->update($request->all());

        return redirect()->route('artistas.index')
            ->with('success', 'Artista updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $artista = Artista::find($id)->delete();

        return redirect()->route('artistas.index')
            ->with('success', 'Artista deleted successfully');
    }
}

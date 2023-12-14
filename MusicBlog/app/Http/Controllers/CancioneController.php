<?php

namespace App\Http\Controllers;

use App\Models\Cancione;
use App\Models\Albume;
use App\Models\Artista;
use App\Models\Genero;
use Illuminate\Http\Request;

/**
 * Class CancioneController
 * @package App\Http\Controllers
 */
class CancioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canciones = Cancione::paginate();

        return view('cancione.index', compact('canciones'))
            ->with('i', (request()->input('page', 1) - 1) * $canciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cancione = new Cancione();
        $albumes = Albume::pluck('titulo','id');
        $artistas = Artista::pluck('nombre','id');
        $generos = Genero::pluck('nombre','id');
        return view('cancione.create', compact('cancione','albumes','artistas','generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cancione::$rules);

        $cancione = Cancione::create($request->all());

        return redirect()->route('canciones.index')
            ->with('success', 'Cancione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancione = Cancione::find($id);

        return view('cancione.show', compact('cancione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cancione = Cancione::find($id);
        $albumes = Albume::pluck('titulo','id');
        $artistas = Artista::pluck('nombre','id');
        $generos = Genero::pluck('nombre','id');
        return view('cancione.edit', compact('cancione','albumes','artistas','generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cancione $cancione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cancione $cancione)
    {
        request()->validate(Cancione::$rules);

        $cancione->update($request->all());

        return redirect()->route('canciones.index')
            ->with('success', 'Cancione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cancione = Cancione::find($id)->delete();

        return redirect()->route('canciones.index')
            ->with('success', 'Cancione deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use App\Models\Singer;
use App\Models\Gender;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

/**
 * Class SongController
 * @package App\Http\Controllers
 */
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware(['role:admin']);
    // }
    public function index()
    {
        $songs = Song::paginate();

        return view('song.index', compact('songs'))
            ->with('i', (request()->input('page', 1) - 1) * $songs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $song = new Song();
        $albumes = Album::pluck('titulo','id');
        $singers = Singer::all();
        $generos = Gender::pluck('nombre','id');
        return view('song.create', compact('song','albumes','singers','generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Song::$rules);
        // $request->validate([
        //     'singers' => [
        //         'required',
        //         'array',
        //         'min:1',
        //     ],
        // ]);
        $rules = [
            'titulo' => 'required|string|max:255',
            'singers' => [
                'required',
                'array',
                'min:1'
            ],
            // Otras reglas de validación según sea necesario
        ];
    
        $customMessages = [
            'singers.min' => 'Selecciona al menos un artista.',
        ];
    
        $request->validate($rules, $customMessages);
        $song = new Song([
            'titulo' => $request->input('titulo'),
            'album_id' => $request->input('album_id'),
            'gender_id' => $request->input('gender_id'),
            'anio' => $request->input('anio'),
        ]);
        if ($request->hasFile('caratula')) {
            $song->caratula = $request->file('caratula')->store('uploads', 'public');
        }
        if ($request->hasFile('audio')) {
            $song->audio = $request->file('audio')->store('uploads', 'public');
        }
        $song->save();
        $song->singers()->attach($request->input('singers'));
        return redirect()->route('songs.index')->with('crear', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::find($id);

        return view('song.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $singers = Singer::all();
        $selectedSingers = $song->singers()->pluck('singers.id')->toArray();
        $albumes = Album::pluck('titulo','id');
        $generos = Gender::pluck('nombre','id');
        return view('song.edit', compact('song','albumes','singers','generos','selectedSingers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Song $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate(Song::$rules);

        $song = Song::findOrFail($id);

        $song->update([
            'titulo' => $request->input('titulo'),
            'album_id' => $request->input('album_id'),
            'gender_id' => $request->input('gender_id'),
            'anio' => $request->input('anio')
        ]);

        // Actualizar la imagen de la carátula si se proporciona
        if ($request->hasFile('caratula')) {
            $song->caratula = $request->file('caratula')->store('uploads', 'public');
        }

        // Actualizar el archivo de audio si se proporciona
        if ($request->hasFile('audio')) {
            $song->audio = $request->file('audio')->store('uploads', 'public');
        }

        // Guardar los cambios en la canción
        $song->save();

        // Sincronizar los artistas asociados
        $song->singers()->sync($request->input('singers'));

        return redirect()->route('songs.index')->with('editar', 'ok');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $song = Song::find($id)->delete();

        return redirect()->route('songs.index')->with('eliminar', 'ok');
    }
}

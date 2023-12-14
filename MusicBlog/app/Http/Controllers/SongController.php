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
        $artistas = Singer::pluck('nombre','id');
        $generos = Gender::pluck('nombre','id');
        return view('song.create', compact('song','albumes','artistas','generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Song::$rules);

        // $song = Song::create($request->all());

        $song = request()->except('_token');
        if($request->hasFile('caratula')){
            $song['caratula']=$request->file('caratula')->store('uploads','public');
        }
        Song::insert($song);
        return redirect()->route('songs.index')
            ->with('success', 'Song created successfully.');
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
        $song = Song::find($id);
        $albumes = Album::pluck('titulo','id');
        $artistas = Singer::pluck('nombre','id');
        $generos = Gender::pluck('nombre','id');
        return view('song.edit', compact('song','albumes','artistas','generos'));
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

        $song = request()-> except('_token','_method');
        if($request->hasFile('caratula')){
            $caratulaSong=Song::findOrFail($id);
            Storage::delete('public/'.$caratulaSong->caratula);
            $song['caratula']=$request->file('caratula')->store('uploads', 'public');
        }else{
            unset($song['caratula']);
        }
        Song::where('id','=',$id)->update($song);

        return redirect()->route('songs.index')
            ->with('success', 'Song updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $song = Song::find($id)->delete();

        return redirect()->route('songs.index')
            ->with('success', 'Song deleted successfully');
    }
}

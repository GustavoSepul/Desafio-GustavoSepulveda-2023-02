<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Singer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

/**
 * Class AlbumController
 * @package App\Http\Controllers
 */
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::paginate();

        return view('album.index', compact('albums'))
            ->with('i', (request()->input('page', 1) - 1) * $albums->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = new Album();
        $artistas = Singer::pluck('nombre','id');
        return view('album.create', compact('album','artistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Album::$rules);

        //$album = Album::create($request->all());
        $album = request()->except('_token');
        if($request->hasFile('caratula')){
            $album['caratula']=$request->file('caratula')->store('uploads','public');
        }
        Album::insert($album);
        return redirect()->route('albums.index')
            ->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);

        return view('album.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        $artistas = Singer::pluck('nombre','id');
        
        return view('album.edit', compact('album','artistas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $album = request()-> except('_token','_method');
        if($request->hasFile('caratula')){
            $caratulaAlbum=Album::findOrFail($id);
            Storage::delete('public/'.$caratulaAlbum->caratula);
            $album['caratula']=$request->file('caratula')->store('uploads', 'public');
        }else{
            unset($album['caratula']);
        }
        Album::where('id','=',$id)->update($album);
        return redirect()->route('albums.index')
        ->with('success', 'Album updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $album = Album::find($id)->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Album deleted successfully');
    }
}

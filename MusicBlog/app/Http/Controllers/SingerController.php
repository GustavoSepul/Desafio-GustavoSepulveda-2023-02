<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

/**
 * Class SingerController
 * @package App\Http\Controllers
 */
class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singers = Singer::paginate();

        return view('singer.index', compact('singers'))
            ->with('i', (request()->input('page', 1) - 1) * $singers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $singer = new Singer();
        $paises = Country::pluck('name','id');
        return view('singer.create', compact('singer','paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Singer::$rules);

        //$singer = Singer::create($request->all());

        $singer = request()->except('_token');
        if($request->hasFile('imagen')){
            $singer['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Singer::insert($singer);
        return redirect()->route('singers.index')
            ->with('success', 'Singer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singer = Singer::find($id);

        return view('singer.show', compact('singer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singer = Singer::find($id);
        $paises = Country::pluck('name','id');
        return view('singer.edit', compact('singer','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Singer $singer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $singer = request()-> except('_token','_method');
        if($request->hasFile('imagen')){
            $imagenSinger=Singer::findOrFail($id);
            Storage::delete('public/'.$imagenSinger->imagen);
            $singer['imagen']=$request->file('imagen')->store('uploads', 'public');
        }else{
            unset($singer['imagen']);
        }
        Singer::where('id','=',$id)->update($singer);

        return redirect()->route('singers.index')
            ->with('success', 'Singer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $singer = Singer::find($id)->delete();

        return redirect()->route('singers.index')
            ->with('success', 'Singer deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Albume;
use Illuminate\Http\Request;

/**
 * Class AlbumeController
 * @package App\Http\Controllers
 */
class AlbumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumes = Albume::paginate();

        return view('albume.index', compact('albumes'))
            ->with('i', (request()->input('page', 1) - 1) * $albumes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albume = new Albume();
        return view('albume.create', compact('albume'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Albume::$rules);

        $albume = Albume::create($request->all());

        return redirect()->route('albumes.index')
            ->with('success', 'Albume created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $albume = Albume::find($id);

        return view('albume.show', compact('albume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $albume = Albume::find($id);

        return view('albume.edit', compact('albume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Albume $albume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Albume $albume)
    {
        request()->validate(Albume::$rules);

        $albume->update($request->all());

        return redirect()->route('albumes.index')
            ->with('success', 'Albume updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $albume = Albume::find($id)->delete();

        return redirect()->route('albumes.index')
            ->with('success', 'Albume deleted successfully');
    }
}

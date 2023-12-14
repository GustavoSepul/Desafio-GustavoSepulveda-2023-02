<?php

namespace App\Http\Controllers;

use App\Models\Singer;
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
        return view('singer.create', compact('singer'));
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

        $singer = Singer::create($request->all());

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

        return view('singer.edit', compact('singer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Singer $singer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Singer $singer)
    {
        request()->validate(Singer::$rules);

        $singer->update($request->all());

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

<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // ricerca
        if ($request->has("term")) {
            $term = $request->get("term");
            $songs = Song::where('name', 'LIKE', "%$term%");
        } else {
            $songs = Song::all();
        }

        return view("songs.index", compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("songs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|string',
                'album' => 'required|string',
                'author' => 'required|string',
                'length' => 'required',
                'poster' => 'string'
            ],
            [
                'title.required' => 'Il titolo della canzone è obbligatorio',
                'title.string' => 'Il titolo della canzone deve essere una stringa',
                'album.required' => "L' album è obbligatorio",
                'album.string' => "Il titolo dell'album deve essere una stringa",
                'author.required' => "L' autore è obbligatorio",
                'author.string' => "Il nome dell' autore deve essere una stringa",
                'length.required' => 'La lunghezza del brano è obbligatoria',
                'poster.string' => "L' url del poster deve essere una stringa",

            ]
        );

        $data = $request->all();

        $song = new Song;

        $song->fill($data);

        $song->save();

        return redirect()->route("songs.show", $song);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

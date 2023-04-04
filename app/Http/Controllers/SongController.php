<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

// importo Validator per la centralizzazione del validate
use Illuminate\Support\Facades\Validator;

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

        $data = $this->validation($request->all());

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
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {

        $data = $this->validation($request->all());
        $song->update($data);

        return redirect()->route('songs.show', $song);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route("songs.index");
    }

    // CENTRALIZZARE IL VALIDATE
    private function validation($data)
    {

        return Validator::make(
            $data,
            [
                'title' => 'required',
                'album' => 'required',
                'author' => 'required',
                'editor' => 'string',
                'length' => 'required',
                'poster' => 'string'
            ],
            [
                'title.required' => 'Il titolo della canzone è obbligatorio',
                'album.required' => "L' album è obbligatorio",
                'author.required' => "L' autore è obbligatorio",
                'editor.string' => "La casa editrice deve essere una stringa",
                'length.required' => 'La lunghezza del brano è obbligatoria',
                'poster.string' => "L' url del poster deve essere una stringa",

            ]
        )->validate();
    }
}

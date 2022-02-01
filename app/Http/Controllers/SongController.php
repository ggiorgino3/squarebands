<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Session;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.administration.songs.index')->withSongs(Song::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.songs.create')
                ->withPostRoute(route('songs.store'))
                ->withElement(array('id' => 'name', 'title' => 'song'))
                ->withAlbums(Album::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required|max:50',
            'description'       => 'required',
            'uri' => 'required|url',
            'genre' => 'required',
            'type' => 'nullable|max:50',
            'tags' => 'nullable|max:100',
            'album_id' => 'nullable|exists:album',
        );
       
        $mandatory_fields = array(
            'name',
            'description',
            'uri',
            'genre',
        );
        $optional_fields = array(
            'type',
            'tags',
            'album_id',
        );
        $validated = $request->validate($rules);

        $new_song = new Song;
        foreach ($mandatory_fields as $model_field) {
            $new_song->$model_field       = $request->input($model_field);
        }
        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $new_song->$field       = $request->input($field);
            }
        }
        $new_song->save();

        Session::flash('message', 'New song successfully created!');
        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

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
        return view('pages.administration.songs.index')
                ->withSongs(Song::all());
    }

    public function frontendIndex()
    {
        return view('pages.songs.frontendIndex')
                ->withAlbums(Album::paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.songs.createOrUpdate')
            ->withRoute('songs.store')
            ->withElement(array('id' => 'name', 'title' => 'song'))
            ->withAlbums($this->buildAlbumsArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->insertOrUpdate($request);

        Session::flash('message', 'New song successfully created!');
        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.songs.view')
            ->withSong(Song::find($id));
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
        $route = 'songs.update';
       
        return view('pages.administration.songs.createOrUpdate')
            ->with(compact('route'))
            ->withModel($song)
            ->withAlbums($this->buildAlbumsArray())
            ->withElement(array('id' => 'name', 'title' => 'concert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->insertOrUpdate($request, $id);

        Session::flash('message', 'Song updated successfully!');
        return redirect()
                ->route('songs.edit', ['song' => $id])
                ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function buildAlbumsArray() {
        $albums = array('' => '-');
        $albums_temp = Album::all();
        foreach ($albums_temp as $temp_album) {
            $albums[$temp_album->id] = $temp_album->title;
        }
        return $albums;
    }

    private function insertOrUpdate(Request $request, $id = null)
    {

        $rules = array(
            'name'       => 'required|max:50',
            'description'       => 'required',
            'uri' => 'required|url',
            'genre' => 'required',
            'duration' => 'nullable|max:5',
            'type' => 'nullable|max:50',
            'tags' => 'nullable|max:100',
            'album_id' => 'nullable|exists:album',
        );
       
        $mandatory_fields = array(
            'name',
            'description',
            'uri',
            'genre',
            'duration'
        );
        $optional_fields = array(
            'type',
            'tags',
        );
        $validated = $request->validate($rules);

        if (isset($id)) {
            $song = Song::find($id);
        } else {
            $song = new Song;
        }
        
        foreach ($mandatory_fields as $model_field) {
            $song->$model_field       = $request->input($model_field);
        }

        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $song->$field       = $request->input($field);
            }
        }

        $song->save();
        Album::find($request->input('album'))->songs()->save($song);
    }
}

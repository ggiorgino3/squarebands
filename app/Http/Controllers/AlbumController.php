<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.administration.albums.index')->withAlbums(Album::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.albums.createOrUpdate')
            ->withRoute('albums.store')
            ->withElement(array('id' => 'title', 'title' => 'album'));
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

        Session::flash('message', 'New album created successfully!');
        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
        $album->name = $album->title; // @phpstan-ignore-line
        $route = 'albums.update';
        return view('pages.administration.albums.createOrUpdate')
            ->with(compact('route'))
            ->withModel($album)
            ->withElement(array('id' => 'title', 'title' => 'album'));
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

        Session::flash('message', 'Concert updated successfully!');
        return redirect()
            ->route('concerts.edit', ['concert' => $id])
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

    private function insertOrUpdate(Request $request, $id = null)
    {
        $rules = array(
            'title'       => 'required|max:100',
            'description' => 'required|max:200',
            'genre' => 'required|in:Progressive Metal,Hard Rock,Fusion',
            'publish_date' => 'nullable'
        );
       
        $mandatory_fields = array(
            'title',
            'description',
            'genre',
        );

        $optional_fields = array(
            'publish_date',
        );

        $validated = $request->validate($rules);

        if (isset($id)) {
            $album = Album::find($id);
        } else {
            $album = new Album;
        }
        
        foreach ($mandatory_fields as $model_field) {
            $album->$model_field       = $request->input($model_field);
        }

        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $album->$field       = $request->input($field);
            }
        }
        $album->save();
    }
}

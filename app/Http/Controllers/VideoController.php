<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Video;
use Illuminate\Http\Request;
use Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::paginate(9);
        return view('pages.administration.videos')
            ->withVideos($videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.videos.create')
        ->withPostRoute(route('videos.store'))
        ->withElement(array('id' => 'name', 'title' => 'video'))
        ->withConcerts(Concert::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required|max:50',
            'description'       => 'required',
            'video' => 'required|mimes:mp4,avi|max:5192',
            'concert_id' => 'nullable|exists:concerts',
        );
       
        $mandatory_fields = array(
            'name',
            'description',
        );
        $optional_fields = array(
            'concert_id',
        );
        $validated = $request->validate($rules);
        $videoName = time().'.'.$request->video->extension();
        $request->video->move(public_path('videos'), $videoName);
        $new_video = new Video;
        foreach ($mandatory_fields as $model_field) {
            $new_video->$model_field       = $request->input($model_field);
        }
        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $new_video->$field       = $request->input($field);
            }
        }
        $new_video->uri = url("videos/$videoName");
        $new_video->save();

        Session::flash('message', 'New video successfully created!');
        return redirect()->route('videos.index');
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
        //
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
        //
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
}

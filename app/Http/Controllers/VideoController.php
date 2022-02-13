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
        return view('pages.administration.videos.index')
            ->withVideos($videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.videos.createOrUpdate')
            ->withRoute('videos.store')
            ->withElement(array('id' => 'name', 'title' => 'video'))
            ->withConcerts($this->buildConcertsArray());
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

        Session::flash('message', 'New video successfully created!');
        return redirect()
                ->route('videos.index');
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
        $video = Video::find($id);
        
        $route = 'videos.update';
        return view('pages.administration.videos.createOrUpdate')
            ->with(compact('route'))
            ->withModel($video)
            ->withElement(array('id' => 'name', 'title' => 'video'))
            ->withConcerts($this->buildConcertsArray());
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

        Session::flash('message', 'Video updated successfully!');
        return redirect()
                ->route('videos.edit', ['video' => $id])
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
        if (isset($id)) {
            $video = Video::find($id);
        } else {
            $video = new Video;
        }
        foreach ($mandatory_fields as $model_field) {
            $video->$model_field       = $request->input($model_field);
        }
        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $video->$field       = $request->input($field);
            }
        }
        $video->uri = url("videos/$videoName");
        $video->save();
    }

    private function buildConcertsArray()
    {
        $concerts = array('' => '-');
        $concerts_temp = Concert::all();
        foreach ($concerts_temp as $temp_concert) {
            $concerts[$temp_concert->id] = $temp_concert->name;
        }
        return $concerts;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\News;
use App\Models\Photo;
use Illuminate\Http\Request;
use Session;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view('pages.administration.photos')
            ->withPhotos($photos)
            ->withCountDividedPhotos(ceil(count($photos) / 3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.photos.create')
            ->withPostRoute(route('photos.store'))
            ->withElement(array('id' => 'name', 'title' => 'photo'))
            ->withConcerts(Concert::all())
            ->withNewses(News::all());
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

        Session::flash('message', 'New photo successfully created!');
        return redirect()->route('photos.index');
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
        $photo = Photo::find($id);
        $concerts = array('' => '-');
        $concerts_temp = Concert::all();
        foreach ($concerts_temp as $temp_concert) {
            $concerts[$temp_concert->id] = $temp_concert->name;
        }

        $news = array('' => '-');
        $news_temp = News::all();
        foreach ($news_temp as $temp_news) {
            $news[$temp_news->id] = $temp_news->title;
        }
        $route = 'photos.update';
        return view('pages.administration.photos.createOrUpdate')
            ->with(compact('route', 'concerts', 'news'))
            ->withModel($photo)
            ->withElement(array('id' => 'name', 'title' => 'photo'));
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

        Session::flash('message', 'Photo updated successfully!');
        return redirect()->route('photos.edit', ['photo' => $id])
            ->withInput();
    }

    private function insertOrUpdate(Request $request, $id = null)
    {
        $rules = array(
            'name'       => 'required|max:50',
            'description'       => 'required',
            'caption'       => 'required|max:100',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5192',
            'concert_id' => 'nullable|exists:concerts',
            'news_id' => 'nullable|exists:news',
        );
       
        $mandatory_fields = array(
            'name',
            'description',
            'caption',
        );
        $optional_fields = array(
            'concert_id',
            'news_id',
        );
        $validated = $request->validate($rules);
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('photos'), $imageName);
        if (isset($id)) {
            $photo = Photo::find($id);
            // TODO: implementare campo imageNaame nel db per evitare riscrittura img se già esistente
        } else {
            $photo = new Photo;
        }

        foreach ($mandatory_fields as $model_field) {
            $photo->$model_field       = $request->input($model_field);
        }
        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $photo->$field       = $request->input($field);
            }
        }
        
        $photo->uri = url("photos/$imageName");
        $photo->save();
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

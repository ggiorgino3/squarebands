<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.administration.news.index')
            ->withNewses(News::paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.news.create')
            ->withPostRoute(route('news.store'))
            ->withElement(array('id' => 'title', 'title' => 'news'));
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
            'title'       => 'required|max:150',
            'description' => 'required|max:200',
            'status' => 'required|in:publish,draft,trash',
        );
       
        $mandatory_fields = array(
            'title',
            'description',
            'status',
        );
        $optional_fields = array();
        $validated = $request->validate($rules);

        $new_news = new News;
        foreach ($mandatory_fields as $model_field) {
            $new_news->$model_field       = $request->input($model_field);
        }
        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $new_news->$field       = $request->input($field);
            }
        }
        $new_news->save();

        Session::flash('message', 'New news successfully created!');
        return redirect()->route('news.index');
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

    public static function beautifyStatus($statusNotBeautified)
    {
        switch ($statusNotBeautified) {
            case 'publish':
                return "Published";
            case 'draft':
                return "Draft";
            case 'trash':
                return "Trash";
            default:
                break;
        }
    }
}

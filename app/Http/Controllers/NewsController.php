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
        $statuses = $this->buildStatusesArray();
        return view('pages.administration.news.createOrUpdate')
            ->withRoute('news.store')
            ->withStatuses($statuses)
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
        $this->insertOrUpdate($request);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $news->name = $news->title; // @phpstan-ignore-line

        $statuses = $this->buildStatusesArray();
        $route = 'news.update';
        return view('pages.administration.news.createOrUpdate')
            ->with(compact('route', 'statuses'))
            ->withModel($news)
            ->withElement(array('id' => 'title', 'title' => 'news'));
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

        Session::flash('message', 'News updated successfully!');
        return redirect()
            ->route('news.edit', ['news' => $id])
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

    private function insertOrUpdate(Request $request, $id = null)
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
        if (isset($id)) {
            $news = News::find($id);
        } else {
            $news = new News;
        }
        foreach ($mandatory_fields as $model_field) {
            $news->$model_field       = $request->input($model_field);
        }
        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $news->$field       = $request->input($field);
            }
        }
        $news->save();
    }

    private function buildStatusesArray()
    {
        return array(
            'publish' => 'Published',
            'draft' => 'Draft',
            'trash' => 'Trash',
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Option;
use Illuminate\Http\Request;
use Session;

class ConcertController extends Controller
{

    public function frontendIndex()
    {
        return view('pages.concerts')
            ->withConcerts(Concert::all())
            ->withBandName(
                Option::where('meta_key', 'band_name')->value('meta_value')
            );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.administration.concerts.index')
                ->withConcerts(Concert::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.concerts.createOrUpdate')
            ->withRoute('concerts.store')
            ->withElement(array('id' => 'name', 'title' => 'concert'));
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

        Session::flash('message', 'New concert successfully created!');
        return redirect()->route('concerts.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('includes.concerts.view_concert')
                ->withConcert(Concert::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concert = Concert::find($id);
        $route = 'concerts.update';
        return view('pages.administration.concerts.createOrUpdate')
            ->with(compact('route'))
            ->withModel($concert)
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

        Session::flash('message', 'Concert updated successfully!');
        return redirect()->route('concerts.edit', ['concert' => $id])
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
            'name'       => 'required|max:100',
            'place_name' => 'required|max:100',
            'place_address' => 'required|max:100',
            'country_name' => 'required|max:100',
            'city_name' => 'required|max:100',
            'datetime' => 'required|date_format:Y-m-d H:i',
            'gate_opening' => 'nullable|date_format:H:i',
            'maximum_seating_no' => 'nullable|numeric',
            'ticket_link' => 'nullable|url',
        );
       
        $mandatory_fields = array(
            'name',
            'place_name',
            'place_address',
            'country_name',
            'city_name',
            'datetime',
        );
        $optional_fields = array(
            'description',
            'gate_opening',
            'maximum_seating_no',
            'ticket_link',
        );
        $validated = $request->validate($rules);

        if (isset($id)) {
            $new_concert = Concert::find($id);
        } else {
            $new_concert = new Concert;
        }
        
        foreach ($mandatory_fields as $model_field) {
            $new_concert->$model_field       = $request->input($model_field);
        }

        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $new_concert->$field       = $request->input($field);
            }
        }
        $new_concert->save();
    }
}

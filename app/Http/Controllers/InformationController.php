<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Option;
use Illuminate\Http\Request;
use Response;
use Session;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.administration.informations.index')
                ->withOptions(Option::all());
    }

    public function frontendIndex()
    {
        $bio = Option::where('meta_key', 'bio')->where('visible_on_frontend', 1)->first();
        $members = Option::whereIn('meta_key', ['jp_description', 'jm_description', 'jl_description','jr_description','mm_description'])->where('visible_on_frontend', 1)->get();
        
        $ids_to_exclude = array();
        if ($bio) {
            $ids_to_exclude[] = $bio->id;
        }
        foreach ($members as $id => $member) {
            $photo = Option::where('meta_key', $member->meta_key . '_url_photo')->first();
            
            $members[$id]->url_photo = $photo ? $photo->meta_value : "https://media.istockphoto.com/vectors/rock-and-roll-hand-vector-id486670843";
            $ids_to_exclude[] = $member->id;
        }
                
        return view('pages.informations')
            ->withBio($bio)
            ->withMembers($members)
            ->withInformations(Option::where('visible_on_frontend', 1)->whereNotIn('id', $ids_to_exclude)->get());
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
            'title'       => 'nullable|max:50',
            'meta_key' => 'required|max:50',
            'meta_value' => 'required',
            'visible_on_frontend' => 'required|in:0,1'
        );
       
        $mandatory_fields = array(
            'meta_key',
            'meta_value',
            'visible_on_frontend',
        );
        $optional_fields = array(
            'title'
        );
        $validated = $request->validate($rules);

        $information = new Option;
        
        foreach ($mandatory_fields as $model_field) {
            $information->$model_field       = $request->input($model_field);
        }

        foreach ($optional_fields as $field) {
            if ($request->has($field)) {
                $information->$field       = $request->input($field);
            }
        }

        $information->save();
        Session::flash('message', 'New option created successfully!');
        return response()->json(["id" => $information->id]);
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
        $info = Option::find($id);
        $info->meta_key = $request->input('meta_key');
        $info->meta_value = $request->input('meta_value');
        $info->title = $request->input('title');
        $info->visible_on_frontend = $request->input('visible');
        $info->save();
        return response()->json([$request->all(), $id]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Option::find($id);
        $info->delete();
        return response()->json([$id]);
    }
}

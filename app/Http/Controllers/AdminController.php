<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('pages.administration.admins.index')
                ->withAdmins(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.admins.createOrUpdate')
            ->withRoute('admins.store')
            ->withElement(array('id' => 'name', 'title' => 'administrator'));
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

        Session::flash('message', 'New administrator successfully created!');
        return redirect()->route('admins.index');
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
        $admin = User::find($id);
        $route = 'admins.update';

        return view('pages.administration.admins.createOrUpdate')
            ->with(compact('route'))
            ->withElement(array('id' => 'name', 'title' => 'administrator'))
            ->withModel($admin);
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

        Session::flash('message', 'Admin updated successfully!');
        return redirect()
            ->route('admins.edit', ['admin' => $id])
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
        $user = User::find($id);
        $user->delete();
        return response()->json([$id]);
    }

    private function insertOrUpdate(Request $request, $id = null)
    {
        $rules = array(
            'name'       => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required'
        );
       
        $mandatory_fields = array(
            'name',
            'email',
        );

        $validated = $request->validate($rules);

        if (isset($id)) {
            $user = User::find($id);
        } else {
            $user = new User;
        }
        
        foreach ($mandatory_fields as $model_field) {
            $user->$model_field       = $request->input($model_field);
        }
        if($user->password !== "●●●●") {
            $user->password = Hash::make($request->input('password'));
        }
        
        $user->save();
    }
}

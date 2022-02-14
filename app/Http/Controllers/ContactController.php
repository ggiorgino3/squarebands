<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.administration.contacts.index')
            ->withContacts(Contact::paginate(9));
    }
    
    public function frontendIndex()
    {
        return view('pages.contacts.frontendIndex')
            ->withContacts(Contact::paginate(12));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administration.contacts.createOrUpdate')
            ->withRoute('contacts.store')
            ->withElement(array('id' => 'title', 'title' => 'contact'));
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

        Session::flash('message', 'New contact successfully created!');
        return redirect()->route('contacts.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        
        $route = 'contacts.update';
        return view('pages.administration.contacts.createOrUpdate')
            ->with(compact('route'))
            ->withModel($contact)
            ->withElement(array('id' => 'title', 'title' => 'contact'));
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

        Session::flash('message', 'Contact updated successfully!');
        return redirect()
            ->route('contacts.edit', ['contact' => $id])
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
            'surname' => 'required|max:50',
            'email' => 'required|email|max:100',
            'phone' => 'required|max:20',
            'address' => 'required|max:100',
            'business_title' => 'required',
        );
       
        $mandatory_fields = array(
            'name',
            'surname',
            'email',
            'phone',
            'address',
            'business_title',
        );
        $validated = $request->validate($rules);

        if (isset($id)) {
            $contact = Contact::find($id);
        } else {
            $contact = new Contact;
        }
        
        foreach ($mandatory_fields as $model_field) {
            $contact->$model_field       = $request->input($model_field);
        }

        $contact->save();
    }
}

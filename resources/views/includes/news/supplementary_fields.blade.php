@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <h5><label for="status">Status</label></h5>
        <select required name="status" id="status">
            <option value="publish">Published</option>
            <option value="draft">Draft</option>
            <option value="trash">Trash</option>
        </select>
    </div>
@endsection


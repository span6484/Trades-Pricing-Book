@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<!-- Button trigger modal -->
<div class=" p-3 mb-5 bg-white rounded border">
<div>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
</div>

<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#categoryModal">
    Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Enter category details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('categories') }}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <input type="text" class="form-control" id="categoryName" name="category_name"
                                placeholder="Category name">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class='table-responsive'>
    <table class="table table-hover table-sm mt-1">
        <thead>
            <tr>
                <th scope="col">Category Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->category_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@stop

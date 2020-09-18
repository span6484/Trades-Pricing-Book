@extends('layouts.app')

@section('title', 'Category Management')

@section('content')

<!-- Button trigger modal -->
<div class=" bg-white">
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
</div>

<div class=" p-3 mb-5 bg-white rounded border">
<h3 class="mb-4 float-left">Categories</h3>
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
                            <label for="input">Category name</label>
                                <input type="text" class="form-control" id="categoryName" name="category_name"
                                    placeholder="Lighting">
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

<div class=" p-3 mb-5 bg-white rounded border">
<h3 class="mb-4 float-left">Sub-Categories</h3>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#subcategoryModal">
        Add Sub-Category
    </button>

    <!-- Modal -->
    <div class="modal fade" id="subcategoryModal" tabindex="-1" role="dialog" aria-labelledby="subcategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subcategoryModalLabel">Enter sub-category details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('subcategories') }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-sm">
                            <label for="input">Sub-Category name</label>
                                <input type="text" class="form-control" id="subcategoryName" name="subcategory_name"
                                    placeholder="Light Switches">
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-sm">
                        <label for="input">Parent category</label>
                            <select id="categorySelect" name="fk_category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->pk_category_id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Sub-Category</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class='table-responsive'>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Sub-Category</th>
                    <th scope="col">Parent Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->subcategory_name }}</td>
                    <td>{{ $subcategory->categories->category_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

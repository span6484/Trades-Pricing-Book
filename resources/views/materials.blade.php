@extends('layouts.app')

@section('title', 'Suppliers')

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

    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#materialModal">
        Add Material
    </button>

    <!-- Modal -->
    <div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="materialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="materialModalLabel">Enter Material details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('materials') }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <input type="text" class="form-control" id="itemCode" name="material_itemcode"
                                    placeholder="Item Code">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <input type="text" class="form-control" id="materialDescription"
                                    name="material_description" placeholder="Material Description">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <select class="form-control" id="exampleFormControlSelect1" name="material_supplier">
                                    <option>Select supplier</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Supplier</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class='table-responsive'>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Item Code</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Supplier</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materials as $material)
                <tr>
                    <td>{{ $material->supplier_companyname }}</td>
                    <td>{{ $material->supplier_contactname }}</td>
                    <td>{{ $material->supplier_phone }}</td>
                    <td>{{ $material->supplier_email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

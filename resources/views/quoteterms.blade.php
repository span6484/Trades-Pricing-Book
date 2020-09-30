@extends('layouts.app')

@section('title', 'Quote Terms')

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

<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#quoteTermModal">
    Add Quote Terms
</button>

<!-- Modal -->
<div class="modal fade" id="quoteTermModal" tabindex="-1" role="dialog" aria-labelledby="quoteTermModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteTermModalLabel">Enter quote term body</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ url('quoteterms') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="term_archived" value="0">
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="input">Term name</label>
                            <input type="text" class="form-control" id="termName" name="term_name"
                                placeholder="14 day account">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="input">Quote terms description</label>
                            <textarea class="form-control" id="termBody" name="term_body" rows="10" placeholder="Payment must be made within 14 days"></textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Quote Terms</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class='table-responsive'>
    <table class="table table-hover table-sm mt-1">
        <thead>
            <tr>
                <th scope="col">Term Name</th>
                <th scope="col">Term Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quoteterms as $quoteterm)
            <tr>
                <td>{{ $quoteterm->term_name }}</td>
                <td>{{ $quoteterm->term_body }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@stop

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>College Details</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3"><strong>Name:</strong></div>
                <div class="col-md-9">{{ $college->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Acronym:</strong></div>
                <div class="col-md-9">{{ $college->acronym }}</div>
            </div>
            <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection

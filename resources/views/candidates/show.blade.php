@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Candidate Details</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3"><strong>Name:</strong></div>
                <div class="col-md-9">{{ $candidate->first_name }} {{ $candidate->middle_name }} {{ $candidate->last_name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Partylist:</strong></div>
                <div class="col-md-9">{{ $candidate->partylist->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Organization:</strong></div>
                <div class="col-md-9">{{ $candidate->organization->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Position:</strong></div>
                <div class="col-md-9">{{ $candidate->position->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>College:</strong></div>
                <div class="col-md-9">{{ $candidate->college->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Course:</strong></div>
                <div class="col-md-9">{{ $candidate->course }}</div>
            </div>
            <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection

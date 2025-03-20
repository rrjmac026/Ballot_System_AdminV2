@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Candidate</h2>
    <form action="{{ route('candidates.update', $candidate) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $candidate->first_name }}" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $candidate->last_name }}" required>
        </div>
        <div class="form-group">
            <label>Middle Name</label>
            <input type="text" name="middle_name" class="form-control" value="{{ $candidate->middle_name }}">
        </div>
        <div class="form-group">
            <label>Partylist</label>
            <select name="partylist_id" class="form-control" required>
                @foreach($partylists as $partylist)
                    <option value="{{ $partylist->partylist_id }}" {{ $candidate->partylist_id == $partylist->partylist_id ? 'selected' : '' }}>
                        {{ $partylist->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Organization</label>
            <select name="organization_id" class="form-control" required>
                @foreach($organizations as $organization)
                    <option value="{{ $organization->organization_id }}" {{ $candidate->organization_id == $organization->organization_id ? 'selected' : '' }}>
                        {{ $organization->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Position</label>
            <select name="position_id" class="form-control" required>
                @foreach($positions as $position)
                    <option value="{{ $position->position_id }}" {{ $candidate->position_id == $position->position_id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>College</label>
            <select name="college_id" class="form-control" required>
                @foreach($colleges as $college)
                    <option value="{{ $college->college_id }}" {{ $candidate->college_id == $college->college_id ? 'selected' : '' }}>
                        {{ $college->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Course</label>
            <input type="text" name="course" class="form-control" value="{{ $candidate->course }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

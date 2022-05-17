@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit') }}</div>
               
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="row g-3" method="post" action="{{ route('skills.update', ['skill' => $skills->id]) }}">
                                    @csrf 
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name" value="{{ $skills->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="status">Status</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="active" {{ $skills->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ $skills->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="icon">Icon</label>
                                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Url"
                                            value="{{ $skills->icon }}" required>
                                        </div>
                                    </div>
 
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                &nbsp;
                                <a href="{{ route('projects.index') }}">
                                    <button type="button" class="btn btn-link">Back</button>
                                </a>
                            </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

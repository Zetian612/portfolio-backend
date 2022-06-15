@extends('layouts.app')
    
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add') }}</div>
                
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <form class="row g-3" method="post" action="{{ url('admin/skills/store')}}">
                                    @csrf 
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" value="{{ old('name') }}"class="form-control" id="name" name="name"
                                                placeholder="Name"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="icon">Icon</label>
                                            <input type="text" value="{{ old('icon') }}" class="form-control" id="icon" name="icon"
                                             required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="status">Status</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="active" >Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                                            &nbsp;
                                            <a href="{{ route('skills.index') }}">
                                                <button type="button" class="btn btn-link">{{ __('Back') }}</button>
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
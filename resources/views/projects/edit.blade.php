@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit') }}</div>
               
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <form class="row g-3" method="post" action="{{ route('projects.update', ['project' => $project->id]) }}" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name" value="{{ $project->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" id="category" name="category"
                                            value="{{ $project->category }}" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="status">Status</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ $project->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="url">Url</label>
                                            <input type="text" class="form-control" id="url" name="url" placeholder="Url"
                                            value="{{ $project->url }}" required>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="github_url">Github</label>
                                    <input type="text" class="form-control" id="github_url" name="github_url" value="{{ $project->github_url }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="image">Image</label>
                                    {{-- <input type="file" class="form-control" id="image" name="image"> --}}
                                    <input type="text" class="form-control" name="image" placeholder="Url" value="{{ $project->image_url }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $project->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <img src="{{ $project->image_url }}" width="200">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Submit</button>
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

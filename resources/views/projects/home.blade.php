@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Projects') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <a href="{{ route('projects.create') }}" class="btn btn-primary">Create Project</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        
                                        <th>Url</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->url }}</td>
                                            <td>{{ $project->category }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td>
                                                <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ route('projects.delete', ['project' => $project->id]) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
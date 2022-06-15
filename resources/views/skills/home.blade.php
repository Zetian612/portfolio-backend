@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Skills') }}</div>

                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <a href="{{ route('skills.create') }}" class="btn btn-primary">Create Skill</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills as $skill)
                                        <tr>
                                            <td>{{ $skill->name }}</td>
                                            <td>{{ $skill->icon }}</td>
                                            <td>{{ $skill->status }}</td>
                                            <td>
                                                <a href="{{ route('skills.edit', ['skill' => $skill->id]) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ route('skills.delete', ['skill' => $skill->id]) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
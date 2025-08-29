@extends('layouts.app')

@section('title') Tests Index @endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tests Dashboard</h2>
        <a href="{{ route('tests.create') }}" class="btn btn-primary">Create New Test</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Test Information</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Message:</strong> {{ $testData['message'] }}</p>
                    <p class="card-text"><strong>Timestamp:</strong> {{ $testData['timestamp']->format('Y-m-d H:i:s') }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Test Items</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($testData['items'] as $index => $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item }}
                                <a href="{{ route('tests.show', $index + 1) }}" class="btn btn-sm btn-outline-info">View</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary w-100 mb-2">Go to Posts</a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('tests.create') }}" class="btn btn-outline-success w-100 mb-2">Create Test</a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('tests.show', 1) }}" class="btn btn-outline-info w-100 mb-2">View Test #1</a>
                    </div>
                    <div class="col-md-3">
                        <a href="/" class="btn btn-outline-primary w-100 mb-2">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

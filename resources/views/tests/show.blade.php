@extends('layouts.app')

@section('title') Test Item {{ $testItem['id'] }} @endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Test Item Details</h2>
        <div>
            <a href="{{ route('tests.index') }}" class="btn btn-secondary">Back to Tests</a>
            <a href="{{ route('tests.create') }}" class="btn btn-primary">Create New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $testItem['name'] }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>ID:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testItem['id'] }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Name:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testItem['name'] }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Description:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testItem['description'] }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Created:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testItem['created_at']->format('Y-m-d H:i:s') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Navigation</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('tests.index') }}" class="btn btn-outline-secondary">All Tests</a>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-info">Posts</a>
                        <a href="{{ route('tests.create') }}" class="btn btn-outline-success">Create Test</a>
                        <a href="/" class="btn btn-outline-primary">Home</a>
                    </div>
                </div>
            </div>
            
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="card-title mb-0">Quick Links</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($testItem['id'] > 1)
                            <a href="{{ route('tests.show', $testItem['id'] - 1) }}" class="btn btn-sm btn-outline-secondary">Previous Item</a>
                        @endif
                        @if($testItem['id'] < 5)
                            <a href="{{ route('tests.show', $testItem['id'] + 1) }}" class="btn btn-sm btn-outline-secondary">Next Item</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

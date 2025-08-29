@extends('layouts.app')

@section('title') Create Test Item @endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Create New Test Item</h2>
        <a href="{{ route('tests.index') }}" class="btn btn-secondary">Back to Tests</a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Test Item Form</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('tests.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                placeholder="Enter test item name"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea 
                                class="form-control @error('description') is-invalid @enderror" 
                                id="description" 
                                name="description" 
                                rows="4"
                                placeholder="Enter detailed description"
                                required
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select 
                                class="form-select @error('category') is-invalid @enderror" 
                                id="category" 
                                name="category"
                                required
                            >
                                <option value="">Select a category</option>
                                <option value="feature" {{ old('category') == 'feature' ? 'selected' : '' }}>Feature</option>
                                <option value="bug" {{ old('category') == 'bug' ? 'selected' : '' }}>Bug</option>
                                <option value="improvement" {{ old('category') == 'improvement' ? 'selected' : '' }}>Improvement</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Create Test Item</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Form Guidelines</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <strong>Name:</strong> Minimum 3 characters, maximum 50 characters
                        </li>
                        <li class="mb-2">
                            <strong>Description:</strong> Minimum 10 characters
                        </li>
                        <li class="mb-2">
                            <strong>Category:</strong> Must be one of: Feature, Bug, or Improvement
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="card-title mb-0">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('tests.index') }}" class="btn btn-outline-info">View All Tests</a>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Go to Posts</a>
                        <a href="/" class="btn btn-outline-primary">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

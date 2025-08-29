<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $testData = [
            'message' => 'Hello from Test Controller!',
            'timestamp' => now(),
            'items' => ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5']
        ];
        
        return view('tests.index', compact('testData'));
    }

    public function show($id)
    {
        $testItem = [
            'id' => $id,
            'name' => 'Test Item ' . $id,
            'description' => 'This is a description for test item ' . $id,
            'created_at' => now()->subDays($id)
        ];
        
        return view('tests.show', compact('testItem'));
    }

    public function create()
    {
        return view('tests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:10',
            'category' => 'required|in:feature,bug,improvement'
        ]);

        // In a real application, you would save to database here
        $testData = [
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'created_at' => now()
        ];

        return redirect()->route('tests.index')
            ->with('success', 'Test item created successfully!');
    }
}
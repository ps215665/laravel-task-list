@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-4 mt-6">
        <h2 class="text-xl font-bold mb-4">Add New Task</h2>
        <form method="POST" action="{{route('tasks.store')}}">
            @csrf

            <label class="block mb-2">Title</label>
            <input type="text" class="w-full border rounded p-2 mb-2" name="title" placeholder="Enter title">
            @error('title')
                <span class="text-red-500">{{$message}}</span>
            @enderror

            <label class="block mb-2 mt-2">Description</label>
            <input type="text" class="w-full border rounded p-2 mb-2" name="description" placeholder="Enter description">
            @error('description')
            <span class="text-red-500">{{$message}}</span>
            @enderror

            <label class="block mb-2 mt-2">Long Description</label>
            <textarea class="w-full border rounded p-2 mb-2" name="long_description" placeholder="Enter long description"></textarea>
            @error('long_description')
            <span class="text-red-500">{{$message}}</span>
            @enderror

            <label class="block mb-2 mt-2">Completed</label>
            <select class="w-full border rounded p-2 mb-2" name="completed">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @error('completed')
            <span class="text-red-500">{{$message}}</span>
            @enderror

            <button type="submit" class="w-full bg-blue-500 text-white rounded p-2">Submit</button>
        </form>
    </div>
@endsection

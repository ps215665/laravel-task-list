@extends('layouts.app')

@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-10 w-full">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">{{ $task->title }}</h1>
        <p class="text-lg text-gray-600 mb-4">{{ $task->description }}</p>
        <p class="text-base text-gray-500 mb-4">{{ $task->long_description }}</p>
        <p class="text-lg text-gray-700 font-semibold mb-4">Completed:
            <span class="{{ $task->completed ? 'text-green-500' : 'text-red-500' }}">
                    {{ $task->completed ? 'Yes' : 'No' }}
                </span>
        </p>
        <button onclick="window.location.href='{{route('tasks.edit', $task->id)}}'" class="w-full bg-blue-500 text-white text-lg rounded p-3 mt-6 hover:bg-blue-600">Edit</button>
        <form method="POST" action="{{ route('tasks.delete', $task->id) }}">
            @csrf
            @method('DELETE')
            <button class="w-full bg-red-500 text-white text-lg rounded p-3 mt-6 hover:bg-red-600">Delete</button>
        </form>
    </div>
</div>
@endsection

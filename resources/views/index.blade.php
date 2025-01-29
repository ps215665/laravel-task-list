@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-4">
        @if(session()->has('success'))
            <p class="text-green-500">{{session('success')}}</p>
        @endif
        <div class="flex justify-between">
            <h2 class="text-xl font-bold mb-4">Task List</h2>
            <a href="{{route('tasks.create')}}" class="text-blue-600 hover:underline">Add New Task</a>
        </div>
        <ul class="divide-y divide-gray-300">
            @foreach($tasks as $task)
                <li class="py-2 justify-between flex">
                    <a href="task/{{$task->id}}" class="text-blue-600 hover:underline">{{$task->title}}</a>
                    <a href="task/{{$task->id}}/edit" class="text-blue-600 hover:underline">Edit</a>
                </li>
            @endforeach
        </ul>
        @if ($tasks->count())
            {{$tasks->links()}}
        @endif
    </div>
@endsection

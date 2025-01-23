@extends('layouts.default')

@section('content')
<main class="flex-shrink-0 mt-5">
    <div class="container" style="max-width: 800px;">
        
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
               {{session('error')}}
            </div>
       @endif
       <h4 class="m-3" style="color: green">Hi {{auth()->user()->name}}....</h4>
        <div class="d-flex justify-content-between align-items-center my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="pb-2s mb-0 fs-3 fw-bold">My Tasks</h6>
            <a class="btn btn-outline-success" href="{{route('task.add')}}">Add Task</a>
        </div>

       <!-- Filter Buttons -->
       <a class="btn btn-sm btn-secondary" href="{{ route('home', ['status' => 'pending']) }}">Pending</a>
       <a class="btn btn-sm btn-secondary" href="{{ route('home', ['status' => 'completed']) }}">Completed</a>
       <a class="btn btn-sm btn-dark" href="{{ route('home') }}">All Tasks</a> 

        <div class="my-3 p-3 bg-body rounded shadow-lg">
            @foreach($tasks as $task)
                <div class="d-flex text-body-secondary pt-3">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="40"  height="35"  viewBox="0 0 24 24"  fill="none"  
                        stroke="green"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                        class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-compact-right">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 4l3 8l-3 8" />
                    </svg>
                    <div class="pb-3 mb-4 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-black">{{$task->title}} | {{$task->deadline}}</strong>
                            <div>
                                @if($task->status === 'pending')
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('task.edit', $task->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('task.delete', $task->id) }}">Delete</a>
                                    <a class="btn btn-sm btn-outline-success" href="{{ route('task.status.update', $task->id) }}">Mark as Completed</a>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </div>
                        </div>
                        <span class="d-block">{{$task->description}}</span>
                    </div>
                </div>
            @endforeach
        
        </div>
    </div>
</main>
@endsection

@extends('layouts.default')

@section('content')
    <div class= "d-flex align-item-center">
        <div class="container card shadow-lg" style="max-width: 500px; margin-top: 100px;">
            <div class="fs-2 fw-bold text-center mt-5">Add New Task</div>
            <form class="p-3" method="POST" action="{{route('task.add.post')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Task Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                </div>    
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="exampleFormControlInput2" class="form-label">Task Time & Date</label>
                    <input type="datetime-local" name="deadline" class="form-control">
                    @error('deadline')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
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
            <button class="btn btn-success rounded-pill mb-4" type="submit">Submit</button>

        </form>
        </div>
    </div>

@endsection


@extends('layouts.app')
@section('main')
<div class="mt-5 mx-auto" style="width: 380px;">
  <div class="card">
    <div class="card-header">
      <h3>Edit Task</h3>
    </div>
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{ url("/task/$task->id") }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3">
          <label for="" class="form-label">User</label>
          <input name="user" type="text" class="form-control" value="{{ $task->user }}">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Task</label>
          <textarea name="task" id="" rows="3" class="form-control">{{ $task->task }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="card-footer text-muted">
      Handson Laravel 8
    </div>
  </div>
</div>
@endsection
@extends('layouts.app')
@section('main')
<div class="border rounded mt-5 mx-auto d-flex flex-column align-items-stretch bg-white" style="width: 380px;">
  <div class="d-flex flex-column justify-content-between flex-shrink-0 p-3 link-dark border-bottom">
    <span class="fs-5 fw-semibold">Welcome To Task Management</span>
    <form action="{{ route('tasks') }}" method="GET">
      @csrf
      <button type="submit" class="btn btn-sm btn-primary">Show Tasks</button>
    </form>
  </div>
</div>
@endsection
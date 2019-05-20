@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

    
    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <form action="{{ url('category/update') }}" method="post">
        @csrf
            <label>Title</label>
                <input type="hidden" name="id" value=" {{ $ed->id }} "/>
                <input type="text" class="form-control" name="title" value="{{ $ed->title }}"/> 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>        
        </form>
            <div class="card-text">
                Created By: <b>{{ $ed->user->name }}</b><br />
                Created At: {{ $ed->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
    
    </div>


</div>
@endsection
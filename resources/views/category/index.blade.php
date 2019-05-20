@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @foreach($categories as $category)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <div class="card-title" onclick="edit( {{ $category->id }} )"><h3 style="cursor:pointer;"><i class="fas fa-pencil-alt" style="cursor:pointer;"></i> {{ $category->title }} </h3></div>
            <div class="card-text">
                Created By: <b>{{ $category->user->name }}</b><br />
                Created At: {{ $category->created_at->diffForHumans() }}<br><br>
                <i class="far fa-trash-alt" style="cursor:pointer;" onclick="delet( {{ $category->id }} )"></i>
            </div>

        </div>
    </div>
    @endforeach
    </div>
</div>
<script>
    function edit(id){
        var url="{{ url('category/edit') }}?id=" + id;
        window.location.replace(url);
    }

    function delet(id){
        var url="{{ url('category/delete') }}?id=" + id;
        window.location.replace(url);
    }

</script>

@endsection
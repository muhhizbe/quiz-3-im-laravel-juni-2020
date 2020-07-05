@extends('layouts.master')

@section('content')
    <div class="card col-12 border-0 shadow-sm">
        <div class="card-body form-inline">
            <div class="col-10">
                <h3 class="card-title">{{ $artikel->judul }}</h3>
                <h5 class="card-title">{{ $artikel->slug }}</h5>
                @if($artikel->updated_at != null)
                <h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $artikel->updated_at }}</h6>
                @else
                <h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $artikel->created_at }}</h6>
                @endif
                <div class="form-inline">
                    <span class="mr-2 p-2 badge badge-pill badge-danger"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$artikel->like}} </span>
                    <span class="mr-2 p-2 badge badge-pill badge-secondary"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> {{$artikel->dislike}} </span>
                    <span class="mr-2 p-2 badge badge-pill badge-warning"><i class="fa fa-star-o" aria-hidden="true"></i> {{$artikel->vote}} </span>
                </div>
                <div class="form-inline mt-2">
                    <span class="mr-2 p-2 badge badge-pill badge-secondary"><i class="fa fa-star-o" aria-hidden="true"></i> {{$artikel->tag}} </span>
                </div>
                <h5 class="card-subtitle mb-2 text-muted mt-3">{{ $artikel->isi }}</h5>
            </div>
            <div class="col-2 form-inline" style="font-size: 20px">
                <a href="/artikel/{{$artikel->id}}/edit" class="delete">Edit</a>| 
                <form action="/artikel/{{$artikel->id}}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="delete text-danger">Delete</button>                
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    .delete{
        background: none;
        border: none;
        padding: 5px;
        text-decoration: underline 0;
    }
    .delete:hover{
        text-decoration: underline;
        transition-delay: 0.3s;
    }
</style>
@endpush
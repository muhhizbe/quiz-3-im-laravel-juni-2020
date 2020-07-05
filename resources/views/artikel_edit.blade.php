@extends('layouts.master')

@section('content')
    <div class="col-12">
        <h4 class="text-center">Edit Article</h4>
    </div>
    <form action="/artikel/{{$artikel->id}}" method="POST">
    @csrf()
    @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$artikel->judul}}">
        </div>
        <div class="form-group">
            <label for="validationTextarea">Isi</label>
            <textarea class="form-control" name="isi" id="validationTextarea" placeholder="Tuliskan pertanyaann anda disini" rows="10" required>{{$artikel->isi}}</textarea> 
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Tag</label>
            <input type="text" name="tag" class="form-control" id="exampleInputEmail2" value="{{$artikel->tag}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
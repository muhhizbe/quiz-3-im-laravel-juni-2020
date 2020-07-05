@extends('layouts.master')

@section('content')
    <div class="container text-right mb-4 px-0">
        <a href="/artikel/create" class="btn btn-outline-success">+ New</a>
    </div>
    @if(count($data)>0)
        <table class="table table-striped table-borderless">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Slug</th>
                <th scope="col">Tag</th>
                <th scope="col">Like</th>
                <th scope="col">Dislike</th>
                <th scope="col">Vote</th>
                <th scope="col">Created at</th>
                <th scope="col">Modified at</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->tag}}</td>
                        <td>{{$item->like}}</td>
                        <td>{{$item->dislike}}</td>
                        <td>{{$item->vote}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <div class="row">                        
                                <a href="/artikel/{{$item->id}}" class="btn btn-success col-3 p-1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="/artikel/{{$item->id}}/edit" class="btn btn-warning col-3 ml-1 p-1"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <form action="/artikel/{{$item->id}}" method="POST" class="col-3 ml-1 p-0">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger m-0 p-1"><i class="fa fa-trash" aria-hidden="true"></i></button>                
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    @else
        <h4 class="text-center text-muted">Opps! Belum ada artikel!</h4>
    @endif
@endsection

@push('scripts')
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush

@push('css')
<style>
    .card:hover{
        box-shadow: 0 0.125rem 0.75rem rgba(0, 0, 0, 0.100) !important;
        transition: 0.3s;
    }
</style>
@endpush
@extends('layouts.app')

@section('head')
    <style>
        .category-item {
            display: inline-block;
            border: 1px solid #333;
            padding: 3px 6px;
            border-radius: 20px;
            margin: 1px 1px 1px 0;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <div class="row m-custom">
               <div class="col-md-12 ">
                   <a href="{{route('todos.index')}}" class="text-black"><small><i class="fa fa-long-arrow-alt-left" ></i> Kembali</small></a>
                   <h4 class="mt-2">{{$todos->name}}</h4>
                   @if ($todos->description != null)
                        {!!$todos->description!!}
                   @else 
                        Belum ada deskripsi
                   @endif
                   
                   <br>
                   <small>
                   @if($todos->category->count() > 0)
                   <br>
                   
                    <b>Kategori : </b>  <br>
                    @foreach ($todos->category as $item)
                        @if ($item->category)
                            <a href="" class="text-black">
                                <div class="category-item">
                                    {{$item->category->name}}
                                </div>
                            </a>
                        @endif
                        
                    @endforeach
                    @endif
                    <br>
                    {!!$todos->getStatus()!!} <br>
                    <b>Dibuat pada : </b>{{\App\Helpers\Time::showDateTime($todos->created_at)}} <br>
                    <b>Deadline : </b>{{\App\Helpers\Time::showDateTime($todos->deadline)}}
                   </small>
                   <br> <br>
                   
                   <form action="{{route('todos.destroy', $todos->uuid)}}" method="post" onsubmit="return confirm('Yakin ingin menghapus data?')">
                       @method("DELETE")
                       @csrf

                       @if($todos->status != 10)
                            <a href="{{route('todos.done', $todos->uuid)}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Done</a>
                       @endif 
                       <a href="{{route('todos.edit', $todos->uuid)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a> 
                       <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                       
                   </form>
               </div>
               

           </div>
        </div>
    </div>
</div>
@endsection

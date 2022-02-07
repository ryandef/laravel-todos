@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <div class="row m-custom">
               <div class="col-md-12 ">
                   <h4>Halo, {{Auth::user()->name}}!</h4>
                   <p>Catat dan jadwalkan sesuatu.</p>
               </div>
               <div class="col-md-12">
                   <a href="{{route('todos.create')}}" class="btn btn-blue btn-block">Tambah</a>
               </div>
               @if($data->count() == 0)
               <div class="col-md-12 text-center ">
                    <div class="mt-5">
                        <i class=" far fa-3x fa-smile-beam"></i>
                        <p class="mt-2">Yuk, tambah catatanmu</p>
                    </div>
               </div>
               @else
               @if(\Session::has('success'))
                    
                      <div class="col-md-12">
                          <br>
                       
                          <div class="alert alert-success alert-dismissible fade show">
                            {{\Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    
                      </div>
       
                @endif

               <div class="col-md-12">
                    @foreach ($data as $item)
                        <a href="{{route('todos.show', $item->uuid)}}" class="text-black d-block">
                            <div class="card mt-2 card-list-item border-left-{{$item->getLeftStatus()}}">
                                <div class="card-body  ">
                                    <h6>{{$item->name}}</h6>
                                    <small><b>Deadline :</b> {{date('d M Y, H:i:s', strtotime($item->deadline))}}</small> <br> {!!$item->getStatus()!!}
                                </div>
                            </div>
                        </a>
                    @endforeach
                 
               </div>

               

               @endif
           </div>
        </div>
    </div>
</div>
@endsection

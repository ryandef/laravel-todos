@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <div class="row m-custom">
               <div class="col-md-12 ">
                   <a href="{{url()->previous()}}" class="text-black"><small><i class="fa fa-long-arrow-alt-left" ></i> Kembali</small></a>
                   <h4 class="mt-2">Halaman tidak ditemukan</h4>
                   <hr>
                   Sepertinya kamu tersesat
               </div>

           </div>
        </div>
    </div>
</div>
@endsection

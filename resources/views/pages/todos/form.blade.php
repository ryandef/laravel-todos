@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <div class="row m-custom">
               <div class="col-md-12 ">
                   <a href="{{url()->previous()}}" class="text-black"><small><i class="fa fa-long-arrow-alt-left" ></i> Kembali</small></a>
                   <h4 class="mt-2">@if($todos->exists) Edit @else Tambah @endif Todo</h4>
                   <hr>
                   @if (count($errors) > 0)
                   <div class="row">
                     <div class="col-md-12">
                       <small>
                         <div class="alert alert-danger alert-dismissible fade show">
                                             @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                         </div>
                       </small>
                     </div>
                   </div>
                   @endif
                    <form action="@if($todos->exists) {{route('todos.update', $todos->uuid)}} @else {{route('todos.store')}} @endif" method="POST">
                        
                        @if($todos->exists)
                            @method("PUT")
                        @else
                            @method("POST")
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="">Nama <span class="text-danger">*</span></label>
                            <input type="text"  name="name" value="{{old('name', $todos->name)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="description"  class="form-control">{{old('description', $todos->description)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Deadline <span class="text-danger">*</span></label>
                            <div class="form-group">
                                
                                <div class="input-group date" id="datetimepicker2"  data-target-input="nearest">
                                    <input type="text" name="deadline" class="form-control datetimepicker-input" @if($todos->deadline != null) value="{{date("m/d/Y h.i A", strtotime($todos->deadline))}}" @endif data-target="#datetimepicker2"/>
                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        </div>
                    </form>
               </div>

           </div>
        </div>
    </div>
</div>
@endsection


@section('head')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
  
@endsection

@section('script')
<script type="text/javascript">
    $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'id'
                });
            });
</script>
@endsection
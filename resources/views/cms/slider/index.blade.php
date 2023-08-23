@extends('cms.parent')

@section('title' , 'Index Slider')

@section('main_title' , 'Index Slider')

@section('sub_title' , 'index of slider')


@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{route('sliders.create')}}" type="submit" class="btn btn-info">Add New Slider</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>

                <th>Setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ($sliders as $slider )
                <tr>
                    <td>{{$slider->id  }}</td>
                  <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('storage/images/slider/'.$slider->image)}}" width="50" height="50" alt="User Image">
                </td>
                
                    <td>{{ json_decode($slider->title, true)['en']}}</td> 
                    <td>{{ json_decode($slider->description, true)['en']}}</td> 
      

                    {{-- <td><span class="badge bg-info"> {{$slider->status}}</span></td> --}}

                    <td>
                        <div class="btn-group">
                          <a href="{{route('sliders.edit' , $slider->id )}}" type="button" class="btn btn-info">edit</a>
                          <button type="button" onclick="performDestroy({{$slider->id }} , this)" class="btn btn-danger">delete</button>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>
                @endforeach




            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{ $sliders->links() }}
      </div>
      <!-- /.card -->


      <!-- /.card -->
    </div>
    <!-- /.col -->

    <!-- /.col -->

    @endsection

@section('scripts')

<script>
    function performDestroy(id , reference){

        confirmDestroy('/cms/sliders/'+id  ,reference );

    }

    </script>
@endsection

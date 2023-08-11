@extends('cms.parent')

@section('title' , 'Index Role')

@section('main_title' , 'Index Role')

@section('sub_title' , 'index of role')


@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          {{-- <a href="{{route('countries.create')}}" type="submit" class="btn btn-info">Add New role</a> --}}

          <form action="" method="get" style="margin-bottom:2%;">
            <div class="row">
                <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder="Search By Name"
                       name='name' @if( request()->name) value={{request()->name}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>

                    <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="Search By Code"
                           name='guard_name' @if( request()->guard_name) value={{request()->guard_name}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div>




            <div class="col-md-4">
                  <button class="btn btn-success btn-md" type="submit"> Filter</button>
                  <a href="{{route('roles.index')}}"  class="btn btn-danger">End Filter</a>
                  {{-- @can('Create-City') --}}

                  <a href="{{route('roles.create')}}"><button type="button" class="btn btn-md btn-primary"> Add New role </button></a>
                  {{-- @endcan --}}
            </div>

                 </div>
        </form>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Role Name</th>
                <th>Guard Name</th>
                <th>Permissions</th>

                <th>Setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ($roles as $role )
                <tr>
                    <td>{{$role->id  }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>

                    <td><a href="{{route('roles.permissions.index', $role->id)}}"
                      class="btn btn-info">({{$role->permissions_count}})
                      permissions/s</a>
                    </td>

                    <td>
                        <div class="btn-group">
                          <a href="{{route('roles.edit' , $role->id )}}" type="button" class="btn btn-info">edit</a>
                          <button type="button" onclick="performDestroy({{$role->id }} , this)" class="btn btn-danger">delete</button>
                        </div>
                      </td>
                  </tr>
                @endforeach




            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{ $roles->links() }}
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

        confirmDestroy('/cms/roles/'+id  ,reference );

    }

    </script>
@endsection

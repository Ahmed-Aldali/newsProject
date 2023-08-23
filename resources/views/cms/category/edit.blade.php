@extends('cms.parent')

@section('title' , 'Edit Category')

@section('main_title' , 'Edit Category')

@section('sub_title' , 'Edit Category')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="name-ar">Name of Category(AR)</label>
                        <input type="text" class="form-control" value="{{ json_decode($categories->name, true)['ar']}}" name="name-ar" id="name-ar" placeholder="Enter Name of Category (AR)">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name-en">Name of Category(EN)</label>
                        <input type="text" class="form-control" value="{{ json_decode($categories->name, true)['en']}}" name="name-en" id="name-en" placeholder="Enter Name of Category (EN)">
                    </div>

                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-select form-select-sm" style="width: 100%;">
                        <option selected> {{ $categories->status }} </option>
    
                        <option value="Active">Active</option>
                          <option value="Inactive">In Active</option>
                      </select>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="description"> Description of Category</label>
                              <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                              placeholder="Enter Description of Category " cols="50">{{ $categories->description }}</textarea>
                      </div>
                  </div>
                </div>

            

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick=" performUpdate({{ $categories->id }}) " class="btn btn-primary">Update</button>

                <a href="{{route('categories.index')}}" type="submit" class="btn btn-info">Cancel</a>

              </div>
            </form>
          </div>
          <!-- /.card -->


        </div>

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


@endsection


@section('scripts')

<script>
     function performUpdate(id){
        let formData = new FormData();

        formData.append('name-ar',document.getElementById('name-ar').value);
        formData.append('name-en',document.getElementById('name-en').value);
        formData.append('description',document.getElementById('description').value);
        formData.append('status',document.getElementById('status').value);

        storeRoute('/cms/categories-update/'+id , formData);
    }
</script>

@endsection

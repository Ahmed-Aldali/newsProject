@extends('cms.parent')

@section('title' , 'Edit Slider')

@section('main_title' , 'Edit Slider')

@section('sub_title' , 'Edit Slider')


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
              <h3 class="card-title">Edit Data of Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">


                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="title-ar">Name of Slider (AR)</label>
                        <input type="text" class="form-control" value='{{ json_decode($sliders->title, true)['ar']}}' name="title-ar" id="title-ar" placeholder="Enter title of Slider (AR)">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="title-en">Name of Slider (EN)</label>
                        <input type="text" class="form-control"value='{{ json_decode($sliders->title, true)['en']}}'  name="title-en" id="title-en" placeholder="Enter title of Slider (EN)">
                    </div>

                </div>

                <div class="row">
                <div class="form-group col-md-6">
                    <label for="description-ar">short description of Slider(AR)</label>
                    <input type="text" class="form-control" value='{{ json_decode($sliders->description, true)['ar']}}' name="description-ar" id="description-ar" placeholder="Enter short description of Slider(AR)">
                </div>
                <div class="form-group col-md-6">
                    <label for="description-en">short description of Slider(EN)</label>
                    <input type="text" class="form-control" value='{{ json_decode($sliders->description, true)['en']}}' name="description-en" id="description-en" placeholder="Enter short description of Slider(EN)">
                </div>

            </div>
            <div class="row">

            <div class="form-group col-md-12">
              <label for="image">Choose Image</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="Enter short description of Slider">
      </div>

        </div>

        
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $sliders->id }})" class="btn btn-primary">Update</button>

                <a href="{{route('sliders.index')}}" type="submit" class="btn btn-info">Cancel</a>

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

        formData.append('title-ar',document.getElementById('title-ar').value);
        formData.append('title-en',document.getElementById('title-en').value);
        formData.append('description-ar',document.getElementById('description-ar').value);
        formData.append('description-en',document.getElementById('description-en').value);
        formData.append('image',document.getElementById('image').files[0]);

        storeRoute('/cms/sliders-update/'+id , formData);
      
    }
</script>

@endsection

@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

              
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Brand</div>
                            <div class="card-body">
                               
                                <form action="{{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Name</label>
                                        <input type="text" class="form-control"  name="brand_name" id=""  placeholder="Enter Brand Name" value="{{ $brands->brand_name }}">
                                       
                                        @error('brand_name')
                                            <span class="text-danger"> {{ $message }}</span>   
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Logo</label>
                                        <input type="file" class="form-control"  name="brand_image" id="" value="{{ $brands->brand_image }}">

                                        @error('brand_image')
                                        <span class="text-danger"> {{ $message }}</span>   
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <img src="{{ asset($brands->brand_image) }}" style="width: 400px; height:200px;" alt="brand_image">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">  <i style="margin: auto;" class='bx bxs-save' ></i> Update Brand</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

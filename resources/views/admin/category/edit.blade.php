@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

              
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Category</div>
                            <div class="card-body">
                                <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Update Category Name</label>
                                    <input type="text" class="form-control"  name="category_name" id=""  placeholder="Enter Category Name" value="{{ $categories->category_name }}">
                                        @error('category_name')
                                            <span class="text-danger"> {{ $message }}</span>   
                                        @enderror
                                   
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

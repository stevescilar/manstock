@extends('admin.admin_master')
@section('admin')

{{-- display fetched data --}}
    <div class="py-12">
        <div class="container">
            <div class="row">
                {{-- left panel --}}
                <div class="col-md-8">
                    <div class="card-header">
                        Gallery
                    </div>
                        <div class="card-group">
                            @foreach($images as $image)
                                <div class="col-md-4 mt-5">
                                    <div class="card">
                                        <img src="{{ asset($image->image) }}" alt="">
                                    </div>

                                </div>
                            @endforeach
                           
                        </div>
                    <br/>
                    <br/>
                    
                </div>
                
                {{-- Create a image to gallery --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Image</div>
                            <div class="card-body">
                                <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" class="form-control"  name="image[]" id="" multiple="">

                                        @error('image')
                                        <span class="text-danger"> {{ $message }}</span>   
                                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

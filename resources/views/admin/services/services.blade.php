@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                {{-- left panel --}}
                <div class="col-md-8">
                    <div class="card">

                            {{-- Alert --}}
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success')}}</strong> 
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-header">Services
                            <i style="float:right"; class='bx bxs-category'></i>
                        </div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"> Service SubTitle</th>
                                        <th scope="col"> Image </th>
                                        <th scope="col"> Service Name</th>
                                        <th scope="col"> Description </th>
                                        <th scope="col"> Added </th>
                                        <th scope="col"> Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    {{-- for each to fetch data --}}
                                    @foreach($services as $service)
                                    <tr>
                                        <th scope="row">{{ $services->firstItem()+$loop->index }} </th>
                                        <td>{{ $service->subtitle}}</td>
                                        <td><img src="{{ asset($service->image)}}" style="height:40px; width:70px;" > </td> 
                                        <td>{{ $service->name}}</td>
                                        <td>{{ $service->desc}}</td>

                                        {{-- above using one-0ne relationship --}}
                                       
                                        <td>
                                            @if($service->created_at  == NULL)
                                            <span class="text-danger"> No Date set</span>
                                            @else
                                            {{ $service->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('service/edit/'.$service->id) }}" class="btn btn-info"><i class='bx bx-edit'></i></a>
                                            <a href="{{ url('service/delete/'.$service->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class='bx bxs-trash'></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>  
                               
                            </table>
                            {{-- pagination in laravel in ref to the category controller --}}
                            <div class="card-footer">{{ $services->links()}}</div>
                            

                    </div>
                </div>
                {{-- Create a Brand --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Service</div>
                            <div class="card-body">
                                <form action="{{ route('store.service') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subtitle</label>
                                        <input type="text" class="form-control"  name="subtitle" id=""  placeholder="Enter Subtitle">

                                        @error('subtitle')
                                            <span class="text-danger"> {{ $message }}</span>   
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Service Name</label>
                                        <input type="text" class="form-control"  name="name" id=""  placeholder="Enter Service Name">

                                        @error('name')
                                            <span class="text-danger"> {{ $message }}</span>   
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Service Desciption</label>
                                        <input type="text" class="form-control"  name="desc" id=""  placeholder="Description">

                                        @error('desc')
                                            <span class="text-danger"> {{ $message }}</span>   
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Service Image</label>
                                        <input type="file" class="form-control"  name="image" id="">

                                        @error('image')
                                        <span class="text-danger"> {{ $message }}</span>   
                                        @enderror

                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">  <i style="margin: auto;" class='bx bxs-save' ></i></button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- trashcan --}}
        <div class="container">
            <div class="row">
                {{-- extracted here --}}
            </div>
        </div>
    </div>
@endsection

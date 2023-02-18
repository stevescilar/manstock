<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>

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
                        <div class="card-header">Brands
                            <i style="float:right"; class='bx bxs-category'></i>
                        </div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Brand Image </th>
                                        <th scope="col">Added </th>
                                        <th scope="col"> Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    {{-- for each to fetch data --}}
                                    @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem()+$loop->index }} </th>
                                        <td>{{ $brand->brand_name}}</td>
                                        <td>{{ $brand->brand_image}} </td> 
                                        {{-- above using one-0ne relationship --}}
                                       
                                        <td>
                                            @if($brand->created_at  == NULL)
                                            <span class="text-danger"> No Date set</span>
                                            @else
                                            {{ $brand->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info"><i class='bx bx-edit'></i></a>
                                            <a href="{{ url('softdelete/brand/'.$brand->id)}}" class="btn btn-danger"><i class='bx bxs-trash'></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>  
                               
                            </table>
                            {{-- pagination in laravel in ref to the category controller --}}
                            <div class="card-footer">{{ $brands->links()}}</div>
                            

                    </div>
                </div>
                {{-- right panel --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                            <div class="card-body">
                                <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Name</label>
                                        <input type="text" class="form-control"  name="brand_name" id=""  placeholder="Enter Brand Name">

                                        @error('brand_name')
                                            <span class="text-danger"> {{ $message }}</span>   
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Logo</label>
                                        <input type="file" class="form-control"  name="brand_image" id="">

                                        @error('brand_image')
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
</x-app-layout>

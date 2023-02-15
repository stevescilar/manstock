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
                        <div class="card-header">Categories</div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Added by </th>
                                        <th scope="col">Added </th>
                                        <th scope="col"> Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    {{-- for each to fetch data --}}
                                    @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem()+$loop->index }} </th>
                                        <td>{{ $category->category_name}}</td>
                                        <td>{{ $category->user->name }} </td> 
                                        {{-- above using one-0ne relationship --}}
                                       
                                        <td>
                                            @if($category->created_at  == NULL)
                                            <span class="text-danger"> No Date set</span>
                                            @else
                                            {{ $category->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>  
                               
                            </table>
                            {{-- pagination in laravel in ref to the category controller --}}
                            <div class="card-footer">{{ $categories->links()}}</div>
                            

                    </div>
                </div>
                {{-- right panel --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                            <div class="card-body">
                                <form action="{{ route('store.category') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control"  name="category_name" id=""  placeholder="Enter Category Name">
                                        @error('category_name')
                                            <span class="text-danger"> {{ $message }}</span>   
                                        @enderror
                                   
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

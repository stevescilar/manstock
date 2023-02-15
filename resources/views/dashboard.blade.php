<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            Hi.. <b> {{ Auth::user()->name }} </b> 
            <b style="float:right;"> Total Users: <span class="badge badge-info">{{ count($users) }}</span></b>
            
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User_Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Account Created @ </th>
                        </tr>
                    </thead>  
                    <tbody>

                        {{-- for each to fetch data --}}
                        @php($i = 1)
                        @foreach($users as $user)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>  
                    {{-- <tfoot>This is amazing</tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

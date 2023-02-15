<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">User_Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Stephen</td>
                            <td>Stevemuambi</td>
    
                        </tr>
                    </tbody>  
                    {{-- <tfoot>This is amazing</tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

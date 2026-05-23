<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-btn-link href="{{route('tenant.create')}}" class="ml-4 float-right">Add Tenant</x-btn-link>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <table border="1px">
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>domain name</th>
                        <th>action</th>
                    </tr>
                    @foreach($tenants as $tenant)
                    <tr>
                        <td>{{$tenant->name}}</td>
                        <td>{{$tenant->email}}</td>

                        <td>
                            @foreach($tenant->domains as $domain)
                            {{$domain->domain}}
                            @endforeach
                        </td>
                        <td>edit </td>
                    </tr>
                    @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

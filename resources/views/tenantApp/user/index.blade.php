<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}

            <x-btn-link href="{{ route('user.create') }}" class="ml-4 float-right">Add user</x-btn-link>

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">





<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    User name
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Role
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Email
                </th>

                <th scope="col" class="px-6 py-3 font-medium">
                    Action
                </th>

            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
            <tr class="bg-neutral-primary border-b border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                   {{$user->name}}
                </th>
                <td class="px-6 py-4">

                    {{$user->roles->implode('name',', ')}}

                </td>
                <td class="px-6 py-4">
                    {{$user->email}}
                </td>


                <td class="px-6 py-4">
                    <a href="{{route('user.edit',$user->id)}}">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




                </div>
            </div>
        </div>
    </div>
</x-tenant-app-layout>

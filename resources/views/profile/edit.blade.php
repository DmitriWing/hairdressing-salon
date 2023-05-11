@extends('layouts.adminka')
@section('content')

<div class="card mb-10 col-xl-12 col-md-12 my-4 d-flex flex-wrap flex-grow-0 flex-shrink-0">
    @include('common.errors')
    @include('common.status')
    {{-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Редактировать пользователя</h6>
        <a href="/userslist" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-alt-circle-left"></i></span>
            <span class="text">Все пользователи</span>
        </a>
    </div> --}}
    <div class=" card-body shadow rounded m-4 ">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class=" card-body shadow rounded m-4  ">
        @include('profile.partials.update-password-form')
    </div>

    <div class=" card-body shadow rounded m-4  ">
        @include('profile.partials.update-avatar-form')
    </div>



</div>

    

    

    @endsection
{{-- </x-app-layout> --}}
{{-- ----------------------------------------------------------- --}}
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            @can('isAdmin')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
                
            @endcan
        </div>
    </div>
</x-app-layout> --}}

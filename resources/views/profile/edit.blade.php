<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="row">

        <div class="col-xl">
            <div class="card mb-3">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="col-xl">
            <div class="card mb-3">

                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
        <div class="col-xl">
            <div class="card mb-3">

                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
   
</x-app-layout>

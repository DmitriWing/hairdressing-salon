    <h5 class="card-title">Личные данные</h5>
    {{-- @if(Auth::user()->id == $user->id || Gate::allows('isAdmin')) --}}
    <form action="
    {{ route('profile.update') }}
    {{-- {{url('/edituser/'.$user->id)}} --}}
    " method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="name">Имя</label>
        <input name="name" type="text" value="{{$user->name}}" class="form-control" id="name">
        <div class="valid-feedback"></div>
    </div>

    <div class="form-group">
        <label for="phone">Телефон</label>
        <input name="phone" type="phone" value="{{$user->phone}}" class="form-control" id="phone">
        <div class="valid-feedback"></div>
    </div>

    <div class="form-group">
        <label for="role">Роль:</label>
        @if(Auth::user()->role != 'admin')
            <input name="role" type="text" value="{{$user->role}}" class="form-control" id="role" readonly>
        @else
            <select name="role" class="form-control" id="role" > 
                @foreach ($roles as $role)
                    <option value="{{$role}}"
                    {{$user->role == $role ? 'selected' : ''}}
                    >{{ucfirst($role)}}</option>
                @endforeach
            </select>
        @endif
        <div class="valid-feedback"></div>
    </div>

    <div class="form-group">
        <label for="email">Мэйл</label>
        <input name="email" type="email" value="{{$user->email}}" class="form-control" id="email" readonly>
        <div class="valid-feedback"></div>
        
    </div>

    <button class="btn btn-success btn-icon-split" type="submit">
        <span class="icon text-white-50"><i class="fas fa-check"></i></span>
        <span class="text">Сохранить</span>
    </button>

    </form>






{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}

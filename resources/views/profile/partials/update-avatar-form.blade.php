

  {{-- @if(Auth::user()->id == $user->id || Gate::allows('isAdmin')) --}}
  <form action="
  {{ route('profile-avatar.update') }}
  {{-- {{url('/edituser/'.$user->id)}} --}}
  " method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="avatarcurrent">Текущая аватарка</label>
      <input class="form-control" type="text" name="avatarcurrent" value="{{$user->avatar}}" 
        id="avatarcurrent" readonly hidden >
      <div class="currentImg">
        <img src="../images/avatars/{{$user->avatar}}" class="img-thumbnail">
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <div class="custom-file">
          <input name="avatar" type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Выберите изображение</label>
        </div>
      </div>
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

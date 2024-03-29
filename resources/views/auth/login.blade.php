<x-guest-layout>

    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <div class="text-center mb-3">
                        <a href="#"><img src="images/logo/logo-full.png" alt=""></a>
                    </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif
{{--                    @if($errors->has('login'))--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            {{ $errors->first('login') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

        <form method="POST" action="{{ route('checklogin') }}" class=" dz-form pb-3">
            @csrf
{{--            <x-validation-errors class="alert alert-danger" />--}}
{{--            @if($errors->has('login'))--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{ $errors->first('login') }}--}}
{{--                </div>--}}
{{--            @endif--}}
            <h3 class="form-title m-t0">Personal Information</h3>
            <div class="dz-separator-outer m-b5">
                <div class="dz-separator bg-primary style-liner"></div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p>Enter your Company code e-mail address and your password. </p>
            <div class="form-group mb-3">
                <x-label for="company_code" value="{{ __('company-code') }}" />
                <x-input id="company_code" class="form-control block mt-1 w-full" type="number" name="company_code" :value="old('company_code')"  autofocus autocomplete="company_code" />
            </div>
            <div class="form-group mb-3">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="form-group mb-3">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary  btn-block">
                    {{ __('Log in') }}
                </button>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>
        </form>
                                    </div>
                                </div>
                            </div>
                    </div>

</x-guest-layout>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Type user -->
            <div class="mt-4">
                <x-input-label for="type_user" :value="__('Type user')" />
                <!-- <x-text-input id="type_user" class="block mt-1 w-full" type="text" name="type_user" :value="old('type_user')" required autofocus oninvalid="invalidMsg(this);" /> -->

                <select id="type_user" name="type_user" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                    @foreach($users_type as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('name'))
                <x-input-error :messages="$errors->get('type_user')" class="mt-2" />
                @endif
            </div>

            <!-- Name Company-->
            <div class="mt-4">
                <x-input-label for="company_name" :value="__('Company name')" />
                <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus oninvalid="invalidMsg(this);" />
                @if ($errors->has('company_name'))
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                @endif
            </div>

            <!-- Address Company-->
            <div class="mt-4">
                <x-input-label for="company_address" :value="__('Company address')" />
                <x-text-input id="company_address" class="block mt-1 w-full" type="text" name="company_address" :value="old('company_address')" autofocus oninvalid="invalidMsg(this);" />
                @if ($errors->has('company_address'))
                <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                @endif
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required oninvalid="invalidMsg(this);" />

                @if ($errors->has('email'))
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                @endif
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" oninvalid="invalidMsg(this);" />

                @if ($errors->has('password'))
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required oninvalid="invalidMsg(this);" />

                @if ($errors->has('password_confirmation'))
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                @endif
            </div>


            <div class="mt-4">
                <input type="checkbox" id="confirm" name="confirm" value="0" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" unchecked>
                <label for="confirm">By creating an account, <a href="#">The Terms of Use</a> are accepted</label>

                @if ($errors->has('confirm'))
                    <x-input-error :messages="$errors->get('confirm')" class="mt-2" />
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> -->

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@include ('components.script')

<x-guest-layout>
    <form method="POST" action="{{ route('registermed') }}">
        @csrf

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- CRM -->
        <div class="mt-4">
            <x-input-label for="crm" :value="__('CRM')" />
            <x-text-input id="crm" class="block mt-1 w-full" type="text" name="crm" :value="old('crm')" required autofocus autocomplete="crm" />
            <x-input-error :messages="$errors->get('crm')" class="mt-2" />
        </div>

        <!-- Atuação -->
        <div class="mt-4">
            <x-input-label for="atuacao" :value="__('Atuação')" />
            <select class="block mt-1 w-full" id="atuacao" name="atuacao">
                <option value="Publico">Publico</option>
                <option value="Privado">Privado</option>
            </select>
        </div>

        <!-- State -->
        <div class="mt-4">
            <div class="form-group">
                <label for="state">Estado</label>
                <select class="block mt-1 w-full" id="state" name="state">
                    @foreach ($estados as $estado)
                    <option value="{{$estado->nome}}">{{$estado->uf}}</option>
                    @endforeach                  
                </select>
            </div>
            <x-input-error :messages="$errors->get('state')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('Telefone')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" required autofocus autocomplete="tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a Senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já está cadastrado?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
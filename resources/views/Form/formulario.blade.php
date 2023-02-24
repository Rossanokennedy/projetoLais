<x-guest-layout>
    <form method="POST" action="{{ route('registerformmed') }}">
        @csrf

        <!-- Nome do paciente -->
        <div>
            <x-input-label for="name" :value="__('Nome do Paciente')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Nome da mãe -->
        <div>
            <x-input-label for="mom_name" :value="__('Nome da Mãe')" />
            <x-text-input id="mom_name" class="block mt-1 w-full" type="text" name="mom_name" :value="old('mom_name')" required autofocus autocomplete="mom_name" />
            <x-input-error :messages="$errors->get('mom_name')" class="mt-2" />
        </div>

        <!-- Data de nascimento -->
        <div>
            <x-input-label for="birthdate" :value="__('Data de Nascimento')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

        <!-- Data do Inicio dos Sintomas -->
        <div>
            <x-input-label for="date" :value="__('Data do Inicio dos Sintomas')" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus autocomplete="date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <!-- Comorbidades -->
        <div class="form-group">
            <label for="comorbidades">Comobirdades?</label>
            <select class="block mt-1 w-full" id="comorbidades" name="comorbidades">
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
        </div>

        <!-- Anamnese -->
        <div class="form-group">
            <select multiple class="block mt-1 w-full" id="anamnese">
        </div>
        <div class="form-group">
            <label for="anamnese">Anamnese</label>
            <textarea class="block mt-1 w-full" id="anamnese" rows="3" name="anamnese"></textarea>
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
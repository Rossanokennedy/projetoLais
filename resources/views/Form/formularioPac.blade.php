<x-guest-layout>
    <form method="POST" action="{{ route('registerformpac', auth()->user()->id) }}">
        @csrf

        <!-- Nome da mãe -->
        <div>
            <x-input-label for="mom_name" :value="__('Nome da Mãe')" />
            <x-text-input id="mom_name" class="block mt-1 w-full" type="text" name="mom_name" :value="old('mom_name')" required autofocus autocomplete="mom_name" />
            <x-input-error :messages="$errors->get('mom_name')" class="mt-2" />
        </div>

        <!-- Data do Inicio dos Sintomas -->
        <div>
            <x-input-label for="date" :value="__('Data do Inicio dos Sintomas')" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus autocomplete="date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <!-- Comorbidades -->
        <div class="form-group">
            <label for="comorbidades">Comorbidades?</label>
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
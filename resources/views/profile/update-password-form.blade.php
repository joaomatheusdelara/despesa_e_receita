<x-action-section>
    <x-slot name="title">
        {{ __('Atualizar Senha') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mantenha sua conta segura atualizando sua senha regularmente.') }}
    </x-slot>

    <x-slot name="content">
        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label for="current_password" value="{{ __('Senha Atual') }}" />
                <x-input id="current_password" type="password" name="current_password" required autocomplete="current-password" class="block mt-1 w-full" />
            </div>

            <div class="mb-4">
                <x-label for="password" value="{{ __('Nova Senha') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="new-password" class="block mt-1 w-full" />
            </div>

            <div class="mb-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Nova Senha') }}" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="block mt-1 w-full" />
            </div>

            <div class="flex justify-end">
                <x-button>
                    {{ __('Atualizar Senha') }}
                </x-button>
            </div>
        </form>
    </x-slot>
</x-action-section>

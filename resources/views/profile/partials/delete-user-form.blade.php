<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-red-700 flex items-center gap-2">
            ⚠️ {{ __('Excluir Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Uma vez excluída, todos os dados e recursos serão permanentemente apagados. Baixe qualquer informação importante antes de continuar.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-5 py-2.5 rounded-lg bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-red-400 transition font-semibold"
    >
        {{ __('Excluir Conta') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-4">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-red-700">
                {{ __('Tem certeza que deseja excluir sua conta?') }}
            </h2>

            <p class="text-sm text-gray-600 leading-relaxed">
                {{ __('Essa ação não pode ser desfeita. Todos os seus dados serão removidos permanentemente. Digite sua senha para confirmar a exclusão.') }}
            </p>

            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
                    placeholder="{{ __('Digite sua senha') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="px-5 py-2.5 bg-red-600 hover:bg-red-700 transition font-semibold rounded-lg">
                    {{ __('Excluir Conta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

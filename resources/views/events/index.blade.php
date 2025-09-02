<x-app-layout>
    <x-slot name="header">
        @if(!auth()->user()->is_admin)
            <!-- Cabeçalho apenas para usuários -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl shadow px-6 py-8 text-center relative overflow-hidden">
                <h1 class="text-3xl font-extrabold text-gray-800 relative z-10">
                    Bem-vindo aos <span class="text-gray-700">Eventos</span>
                </h1>
                <p class="mt-2 text-gray-600 relative z-10 max-w-2xl mx-auto">
                    Ganhe horas complementares, conheça pessoas e viva novas experiências acadêmicas.
                </p>
            </div>
        @else
            <!-- Cabeçalho para Admin -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200
                        rounded-2xl shadow-md px-6 py-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 flex items-center justify-center opacity-5">
                    <span class="text-7xl">⚙️</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-800 relative z-10">
                    Painel de Administração — <span class="text-gray-700">Eventos</span>
                </h1>
                <p class="mt-3 text-gray-500 text-lg relative z-10 max-w-xl mx-auto">
                    Gerencie <span class="font-semibold">eventos, participantes</span> e
                    <span class="font-semibold">inscrições</span> de forma rápida e organizada.
                </p>
            </div>
        @endif
    </x-slot>

    <div class="p-8 max-w-6xl mx-auto">

        <!-- Botão de criar evento (somente admin) -->
        @if(auth()->user()->is_admin)
            <div class="text-center mb-8">
                <a href="{{ route('admin.events.create') }}"
                   class="inline-block px-6 py-3 rounded-xl bg-gray-800 text-white font-bold shadow hover:bg-gray-900 transition">
                    + Criar Novo Evento
                </a>
            </div>
        @endif

        <!-- Lista de eventos -->
        @forelse ($events as $event)
            <div class="p-6 rounded-xl bg-white shadow border hover:shadow-md transition mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">

                    <!-- Nome e Data -->
                    <div>
                        <h3 class="font-bold text-xl text-gray-800">
                            <a href="{{ route('events.show', $event) }}" class="hover:text-gray-600">
                                {{ $event->name }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">
                            📅 {{ $event->date->format('d/m/Y H:i') }} • 📍 {{ $event->location }}
                        </p>
                    </div>

                    <!-- Botões de ação -->
                    <div class="mt-4 sm:mt-0 flex gap-3">
                        <!-- Botão comum para todos -->
                        <a href="{{ route('events.show', $event) }}"
                           class="px-4 py-2 rounded-lg bg-gray-800 text-white font-semibold hover:bg-gray-900 transition">
                            Ver Detalhes
                        </a>

                        <!-- Se for admin, mostra mais botões -->
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.events.edit', $event) }}"
                               class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition">
                                Editar
                            </a>

                            <a href="{{ route('admin.events.participants', $event) }}"
                               class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                                Participantes
                            </a>

                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este evento?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                                    Excluir
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <!-- Descrição -->
                <p class="text-gray-600 text-sm mt-3">
                    {{ Str::limit($event->description, 180) }}
                </p>
            </div>
        @empty
            <div class="text-center py-10 bg-white rounded-xl shadow">
                <p class="text-gray-500 text-lg">Nenhum evento disponível no momento.</p>
            </div>
        @endforelse

        <!-- Paginação -->
        <div class="mt-6">
            {{ $events->links() }}
        </div>
    </div>
</x-app-layout>

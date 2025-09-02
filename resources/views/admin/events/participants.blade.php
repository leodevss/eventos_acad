<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-green-700">
            👥 Inscritos no evento: {{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-2xl border border-green-100 overflow-hidden">
                <div class="p-6">
                    <table class="w-full border-collapse">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="text-left py-3 px-4">Nome</th>
                                <th class="text-left py-3 px-4">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($event->attendees as $attendee)
                                <tr class="border-b hover:bg-green-50 transition">
                                    <td class="py-3 px-4 font-medium text-gray-800">{{ $attendee->name }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ $attendee->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="py-6 px-4 text-center text-gray-500">
                                        Nenhum inscrito ainda.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Botão Voltar -->
            <div class="mt-6 flex justify-start">
                <a href="{{ url('/eventos') }}"
                   class="px-6 py-3 rounded-xl bg-gray-200 text-gray-700 font-semibold shadow hover:bg-gray-300 transition">
                    ← Voltar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-green-700">
            👥 Inscritos — {{ $event->name }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto p-6">
        <div class="overflow-hidden rounded-2xl shadow-md border border-green-100 bg-white">
            <table class="w-full text-left border-collapse">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Inscrito em</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($event->attendees as $u)
                        <tr class="border-t hover:bg-green-50 transition">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $u->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $u->email }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $u->pivot->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                                Nenhum inscrito ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

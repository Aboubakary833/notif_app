<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->role === 1 ? __('Tâches') : __('Vos tâches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div @class(["p-6 text-gray-900", "flex justify-between items-center" => auth()->user()->role === 1])>
                    <h3>{{ __("Liste des tâches") }}</h3>
                    @if(auth()->user()->role === 1)
                        <div>
                            <x-primary-link-button href="{{ route('tasks.create') }}" class="ms-3">
                                {{ __('Ajouter une tâche') }}
                            </x-primary-link-button>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Nom</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Ajoutée le</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Mise à jour le</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            @forelse($tasks as $task)
                                                <tr class="odd:bg-white even:bg-gray-100">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $task->name }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $task->created_at->fomat('d/m/Y') }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $task->updated_at->fomat('d/m/Y') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center text-gray-900 py-6">Aucune tâche disponible pour vous</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

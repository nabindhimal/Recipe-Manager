<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recepies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div style="color:white" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
            <a href="{{ route('recepies.create') }}" class="btn-link btn-lg mb-2">Add Recepie</a>
            @forelse ($recepies as $recepie)
                <div class="my-6 p-6 bg-white dark:bg-gray-800 border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <a href="{{ route('recepies.show', $recepie->uuid) }}">{{ $recepie->title }}</a> 
                    </h2>
                    <p class="mt-2">
                        {{ Str::limit($recepie->ingrediants, 200) }}
                    </p>
                    <p class="mt-2">
                        {{ Str::limit($recepie->instructions, 200) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $recepie->updated_at->diffForHumans() }}</span>
                </div>
            @empty
            <p>You have not added any recepies yet.</p>
            @endforelse

            {{ $recepies->links() }}
        </div>
    </div>
</x-app-layout>
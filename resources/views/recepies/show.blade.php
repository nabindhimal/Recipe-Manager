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
                
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created:</strong> {{$recepie->created_at->diffForHumans() }}
                </p>

                <p class="opacity-70 ml-8" >
                    <strong>  Updated:</strong> {{$recepie->updated_at->diffForHumans() }}
                </p>
                

                <a href="{{ route('recepies.edit', $recepie->uuid) }}" class="btn-link ml-auto">Edit Recepie</a>
                <form action="{{ route('recepies.destroy', $recepie->uuid) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4 p-2 m-2 rounded-lg" onclick="return confirm('Do You Want To Delete The Recepie?')">Delete Recepie</button>
                </form>
                
            </div>
                <div class="my-6 p-6 bg-white dark:bg-gray-800 border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        {{ $recepie->title }}
                    </h2>
                    <p class="mt-6 whitespace-pre-wrap">{{ $recepie->ingrediants }}</p>
                    <p class="mt-6">{{ $recepie->instructions }}</p>
                    
                </div>
           
        </div>
    </div>
</x-app-layout>





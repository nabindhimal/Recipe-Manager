<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recepies') }}
        </h2>
        
    </x-slot>
    <div class="py-12">

        <div style="color:white" class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        
        <form action="{{ route('recepies.store') }}" method="post">
            @csrf
            <x-text-input
                type="text"
                name="title"
                field="title"
                placeholder="Title"
                class="w-full"
                autocomplete="off"
                :value="@old('title')"></x-text-input>
            

            <x-textarea 
                name="ingrediants"
                field="ingrediants"
                rows="10"
                placeholder="Add ingredients here..."
                class="w-full mt-6"
                :value="@old('ingrediants')" ></x-textarea>
            

            <x-textarea
                name="instructions"
                field="instructions"
                rows="10"
                placeholder="Add instructions here..."
                class="w-full mt-6"
                :value="@old('instructions')" ></x-textarea>
           
            <x-primary-button class="mt-6">Save Recepie</x-primary-button>
        </form>
        </div>
          

            
        </div>
    </div>
</x-app-layout>

<div class="py-2">
    @foreach ($posts as $post)
        <div class="px-4 py-2 mt-2 bg-white shadow-xl sm:rounded-lg">
            <div>
                <img class="w-full h-full object-center object-cover">{{ $post->user->image }}  {{-- *GAGAL mencoba menampilkan foto yang di up di database --}}
                <span class="text-xl font-bold"> {{ $post->user->name }}</span> {{-- Mengambil isi dati Nama user --}}
                <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                <button
                    wire:click="showUpdateForm({{ $post->id }})"    {{-- ketika di klik akan menuju ke update --}}
                    type="button" class="inline-flex items-center px-3 py-2 border
                    border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white
                    hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2
                    focus:ring-indigo-500">Edit
                </button>
                <button
                onclick="return confirm('Apakah anda yakin ingin menghapus post ini?') ||
                event.stopImmediatePropagation()" {{-- Confirmasi apakah yakin ingin mendelete post --}}
                    wire:click="delete({{ $post->id }})"
                    type="button" class="inline-flex items-center px-3 py-1 border
                    border-transparent rounded-md shadow-sm text-sm font-medium text-white text-base bg-red-600  
                    hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                    focus:ring-red-500">Delete
                </button>
            </div>
            <div>
                @if ($updateStateId !== $post->id)
                    <span>{{ $post->body }}</span>      
                @endif
                @if ($updateStateId === $post->id)
                    <textarea
                        wire:model="body"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 
                        mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" rows="3">
                    </textarea>
                    <button 
                        wire:click="update({{ $post->id }})"
                        class="inline-flex justify-center mt-2 py-2 px-4 border 
                        border-transparent shadow-sm text-sm font-medium rounded-md text-white 
                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 
                        focus:ring-offset-2 focus:ring-indigo-500">Save
                    </button>
                @endif
            </div>
        </div>
    @endforeach
</div>

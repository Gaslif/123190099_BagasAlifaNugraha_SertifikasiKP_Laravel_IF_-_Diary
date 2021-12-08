<div class="px-4 py-3">
    How is your Day?
    <textarea
    wire:model="body"   {{-- menyambungkan property body yang ada di controller --}}
    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 
    mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" rows="3" placeholder="Write something.."
    ></textarea>

    <input 
    wire:model="image"  {{-- *Menyambungkan controller foto --}}
    type="file" >

    <div class="mt-3 flex justify-end">
        <button 
        wire:click="createPost"     {{-- Ketika di clik akan menjalankan createPost --}}
        class="inline-flex justify-center py-2 px-4 border 
        border-transparent shadow-sm text-sm font-medium rounded-md text-white 
        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 
        focus:ring-offset-2 focus:ring-indigo-500">Post</button>
    </div>
</div>

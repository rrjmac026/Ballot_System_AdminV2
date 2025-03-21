<form action="{{ isset($candidate) ? route('candidates.update', $candidate) : route('candidates.store') }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="space-y-6">
    @csrf
    @if(isset($candidate))
        @method('PUT')
    @endif

    <!-- Photo Upload -->
    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Candidate Photo
        </label>
        @if(isset($candidate) && $candidate->photo)
            <div class="mt-2">
                <img src="{{ $candidate->photo_url }}" 
                     alt="Current photo" 
                     class="w-32 h-32 object-cover rounded-lg">
            </div>
        @endif
        <input type="file" 
               name="photo" 
               accept="image/*"
               class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
    </div>

    <!-- ...existing form fields... -->
</form>

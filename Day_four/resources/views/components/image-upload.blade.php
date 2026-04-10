<div>
    <div class="flex items-center justify-center w-full">
        <label for="{{ $name }}"
            class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 5.5a5.5 5.5 0 0 0-11 .036A3.5 3.5 0 1 0 13 13Z" />
                </svg>
                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
            </div>
            <input id="{{ $name }}" type="file" name="{{ $name }}" class="hidden" accept="image/*" {{ $required ? 'required' : '' }} />
        </label>
    </div>

    @if($currentImage)
        <div class="mt-4 relative">
            <p class="text-sm font-medium text-gray-700 mb-2">Current Image:</p>
            <img src="{{ $currentImage }}" alt="Current image" class="h-32 w-full object-cover rounded-lg">
        </div>
    @endif

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
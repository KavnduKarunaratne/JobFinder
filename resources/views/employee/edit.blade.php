<x-layout>
    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update CV
            </h2>
            <p class="mb-4">Upload your new CV to stay up-to-date.</p>
        </header>

        <form method="POST" action="/employer/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="cv" class="inline-block text-lg mb-2">
                    CV
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="cv"
                />
                @error('cv')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
                <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update CV
                </button>
            </div>
        </form>
    </div>
</x-layout>

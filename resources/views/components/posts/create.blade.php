<div class="max-w-4xl relative p-4 bg-white rounded-lg border dark:bg-gray-800 sm:p-5">
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add Post</h3>
    </div>
    <form action="/dashboard" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" id="title" @class([
                // 1. Kelas dasar yang selalu diterapkan
                'border text-sm rounded-lg block w-full p-2.5',
                'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white',
                'dark:focus:ring-primary-500 dark:focus:border-primary-500',
                // 2. Kelas untuk kondisi normal (TIDAK ada error)
                'border-gray-300 text-gray-900 focus:ring-primary-600 focus:border-primary-600' => !$errors->has(
                    'title'),
                // 3. Kelas untuk kondisi error
                'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' => $errors->has(
                    'title'),
            ]) placeholder="Type post title"
                autofocus value="{{ old('title') }}">
            @error('title')
                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select name="category_id" id="category" @class([
                // Kelas dasar yang selalu ada
                'border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5',
                'focus:ring-primary-500 focus:border-primary-500',
                'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white',
                'dark:focus:ring-primary-500 dark:focus:border-primary-500',
                // Kelas yang hanya diterapkan JIKA ada error
                'bg-red-50 border-red-500 text-red-700 placeholder-red-700 focus:ring-red-500 focus:border-red-500' => $errors->has(
                    'category_id'),
                // Override kelas dasar jika ada error (opsional, tapi lebih jelas)
                'border-gray-300' => !$errors->has('category_id'),
            ])>
                <option selected="" value="">Select post category</option>
                @foreach (App\Models\Category::get() as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
            <textarea id="body" name="body" rows="4" @class([
                // Kelas dasar yang selalu ada
                'border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5',
                'focus:ring-primary-500 focus:border-primary-500',
                'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white',
                'dark:focus:ring-primary-500 dark:focus:border-primary-500',
                // Kelas yang hanya diterapkan JIKA ada error
                'bg-red-50 border-red-500 text-red-700 placeholder-red-700 focus:ring-red-500 focus:border-red-500' => $errors->has(
                    'body'),
                // Override kelas dasar jika ada error (opsional, tapi lebih jelas)
                'border-gray-300' => !$errors->has('body'),
            ]) placeholder="Write post body here">{{ old('body') }}</textarea>
            @error('body')
                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-3">
            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add new post
            </button>
            <a href="/dashboard"
                class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                Cancel
            </a>
        </div>
    </form>
</div>

<div class="w-full max-w-lg">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>
<form action="{{ $route }}" class="w-full max-w-lg" method="post">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full px-3 mt-5">
            <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nombre</label>
            <input type="text" name="name" class="appareance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 p-3 rounded focus:outline-none focus:bg-gray-300 focus:shadow-inner shadow-lg" value="{{ old('name') ?? $project->name }}">
            @error('name')
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="w-full px-3 mt-5">
            <label for="description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Descripción</label>
            <textarea type="text" name="description" class="no-resize appareance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 p-3 rounded focus:outline-none focus:bg-gray-300 focus:shadow-inner shadow-lg">{{ old('description') ?? $project->description }}</textarea>
            @error('description')
                <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="w-2/5 px-3 mt-5">
            <button type="submit" class="bg-teal-400 w-full text-white border border-teal-500 p-3 rounded shadow-lg">{{ $textButton }}</button>
        </div>
    </div>
</form>

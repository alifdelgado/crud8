@extends('layouts.app')
@section('content')
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5">Listado de proyectos</h1>
            <a href="{{ route('projects.create') }}" class="bg-transparent hover:bg-blue-500 hover:text-white hover:border-transparent text-blue-700 border border-blue-500 font-semibold py-2 px-4 rounded">Crear Proyecto</a>

            <ul class="flex flex-wrap mt-5 divide-y text-justify border">
                @forelse ($projects as $project)
                    <li class="flex justify-between p-3">
                        <span class="w-1/5">{{ $project->name }}</span>
                        <span class="w-3/5">{{ $project->description }}</span>
                        <span class="w-1/5">{{ $project->created_at->diffForHumans() }}</span>
                        <span class="w-1/5 divide-x-2">
                            <button type="button" class="text-blue-500">Editar</button>
                            <button type="button" class="text-red-500">Eliminar</button>
                        </span>
                    </li>
                @empty
                    <li></li>
                @endforelse
            </ul>
            @if ($projects->count())
                <div class="mt-3">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

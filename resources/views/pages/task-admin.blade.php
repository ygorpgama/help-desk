@extends('layouts.app')

@php
    $tableHeaders = ["Número do chamado", "Causa", "Status", ''];
@endphp

@section('headerTitle', 'Delegar Chamados')

@section('content')
    <main class="container m-auto px-3 md:px-auto mt-6">
        @if (session('success'))
            <div class="bg-green-300 text-white font-bold justify-center flex items-center h-20 rounded mb-8">
                {{ session('success') }}
            </div>
        @endif
        <section>
            <h2 class="text-center text-white">Chamados para delegar</h2>
            <div class="mt-3">
                @if (count($tasks) > 0)
                    <x-table :tableHeaders="$tableHeaders">
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->cause->description}}</td>
                                <td>{{$task->status->description}}</td>
                                <td><a class="btn text-white bg-blue-400" href="task/{{$task->id}}">Designar</a></td>
                            </tr>
                        @endforeach
                    </x-table>
                    <div class="w-3/4 mt-4">
                        {{ $tasks->links()}}
                    </div>
                @else
                    <div class="bg-slate-500 h-32 rounded flex justify-center items-center mt-32">
                        <h2 class="text-white">NÃO A NENHUM CHAMADO PARA DELEGAR NO MOMENTO</h2>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection

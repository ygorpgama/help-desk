@extends('layouts.app')
@section('headerTitle', "Chamados")

@php
    $tableHeaders = ["Número do chamado", "Causa", "Status", ''];
@endphp

@section('content')
    <main class="m-auto mt-6 container px-3 md:px-auto">
        @if (session('success'))
            <div class="bg-green-300 text-white font-bold justify-center flex items-center h-20 rounded mb-8">
                {{ session('success') }}
            </div>
        @endif
        <section >
                @if (count($tasks) > 0)
                    <h2 class="text-center text-white">Meus chamados</h2>
                    <div class="flex flex-col items-center">
                        <x-table :tableHeaders="$tableHeaders">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class=" border py-3 border-slate-600">{{$task->id}}</td>
                                    <td class=" border py-3 border-slate-600">{{$task->cause->description}}</td>
                                    <td class=" border py-3 border-slate-600">{{$task->status->description}}</td>
                                    <td class=" border py-3 border-slate-600"><a class="btn text-white bg-blue-400" href="task/{{$task->id}}">Visualizar</a></td>
                                </tr>
                            @endforeach
                        </x-table>
                        <div class="w-3/4 mt-4">
                            {{ $tasks->links()}}
                        </div>
                    </div>
                    @else
                        <h2 class="text-white text-center">Usuário não realizou nenhum chamado no momento</h2>
                    @endif
                    <div class="mt-6">
                        <a href="{{route('task.create')}}" class="btn bg-green-400 text-white hover:bg-green-500">Criar novo cadastro</a>
                    </div>
            </section>
    </main>
@endsection

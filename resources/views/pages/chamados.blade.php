@extends('layouts.app')
@section('headerTitle', "Chamados")

@php
    $tableHeaders = ["Número do chamado", "Causa", "Status", ''];
@endphp

@section('content')
    <main class="m-auto mt-6 container px-3 md:px-auto">
        <section >
                @if (count($tasks) > 0)
                    <h2 class="text-center text-white">Meus chamados</h2>
                    <div class="flex flex-col items-center">
                        <table class="border-collapse border  border-slate-500 table-fixed h-48 text-center w-full">
                            <thead class="bg-slate-500">
                                @foreach ($tableHeaders as $header)
                                        <th  class=" border  py-4 border-slate-600">{{$header}}</th>
                                @endforeach
                            </thead>
                            <tbody class="bg-slate-400">
                                <tr>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td class=" border py-3 border-slate-600">{{$task->id}}</td>
                                            <td class=" border py-3 border-slate-600">{{$task->cause->description}}</td>
                                            <td class=" border py-3 border-slate-600">{{$task->status->description}}</td>
                                            <td class=" border py-3 border-slate-600"><a class="btn text-white bg-blue-400" href="task/{{$task->id}}">Visualizar</a></td>
                                        </tr>
                                    @endforeach

                                </tr>
                            </tbody>
                        </table>
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

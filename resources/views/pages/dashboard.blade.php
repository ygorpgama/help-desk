@extends('layouts.app')
@section('headerTitle', "Dashboard")

@php
    $tableHeaders = ["Número do chamado", "Descrição", "Causa", "Status"];
@endphp

@section('content')
    <main class="px-4">
        <section class="w-100 flex justify-center m-auto mb-6 mt-8 h-80">
            <div >
                @if (count($latestsTasks) > 0)
                    <h2 class="text-white">Ultimos chamados abertos</h2>
                    <table class="border-collapse border  border-slate-500 table-fixed">
                        <thead class="bg-slate-400">
                            @foreach ($tableHeaders as $header)
                            <th  class=" border px-2 py-4 border-slate-600">{{$header}}</th>
                            @endforeach
                            <th  class=" border px-2 py-4 border-slate-600"></th>
                        </thead>
                        <tbody class="bg-slate-200">
                            @foreach ($latestsTasks as $task)
                                <tr>
                                    <td class="border py-3 px-2 text-black border-slate-700">{{$task->id}}</td>
                                    <td class="border py-3 px-2 text-black border-slate-700">{{$task->description}}</td>
                                    <td class="border py-3 px-2 text-black border-slate-700">{{$task->cause->description}}</td>
                                    <td class="border py-3 px-2 text-black border-slate-700">{{$task->status->description}}</td>
                                    <td class="border py-3 px-2 text-black border-slate-700"><a href="task/{{$task->id}}" class="btn bg-sky-600 text-white">Visualizar</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <a href="{{route('task.create')}}" class="btn bg-green-200">Abrir novo chamado</a>
                        </div>
                        @else
                    <h2 class="text-white">Nenhum chamado realizado <br/> ainda deseja realizar um?</h2>
                    <a href="{{route('task.create')}}" class="btn bg-green-200">Abrir chamado</a>
                @endif
            </div>
        </section>
        <section class="flex justify-center mt-20">
                <div class="box-items">
                    <h3>Quantidade de chamados</h3>
                    <span  class="count">
                        {{$countTasks}}
                    </span>
                </div>
                <div class="box-items">
                    <h3>Quantidade de chamados</h3>
                    <span  class="count">
                        {{$completedsTasks}}
                    </span>
                </div>
                {{-- <div class="box-items">
                    <h3>Quantidade de chamados</h3>

                </div> --}}
        </section>
    </main>
@endsection

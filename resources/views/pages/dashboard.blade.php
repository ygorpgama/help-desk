@extends('layouts.app')
@section('headerTitle', "Dashboard")

@php
    $tableHeaders = ["Número do chamado", "Descrição", "Causa", "Status"];
@endphp

@section('content')
    <main class="px-4">
        <section class="w-100 flex justify-center m-auto mb-6 mt-8">
            <div >
                <table class="border-collapse border  border-slate-500 table-fixed">
                    <thead class="bg-slate-400">
                        @foreach ($tableHeaders as $header)
                            <th  class=" border px-2 py-4 border-slate-600">{{$header}}</th>
                        @endforeach
                        <th class=" px-2 py-4 border-slate-600"></th>
                    </thead>
                    <tbody class="bg-slate-200">
                        @forelse ($latestsTasks as $task)
                            <td class="border p-2 text-black border-slate-700">{{$task->id}}</td>
                            <td class="border p-2 text-black border-slate-700">{{$task->description}}</td>
                            <td class="border p-2 text-black border-slate-700">On board</td>
                            <td class="border p-2 text-black border-slate-700">{{$task->status ? 'Concluido' : 'Em andamento'}}</td>
                            <td class="border p-2 py-3  border-slate-700"><a class="btn bg-blue-500  text-white">Visualizar</a></td>
                        @empty
                            ''
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        <section class="flex justify-center">
                <div class="box-items">
                    <h3>Quantidade de chamados</h3>
                    <span  class="count">
                        {{$countTasks}}
                    </span>
                </div>
                {{-- <div class="box-items">
                    <h3>Quantidade de chamados</h3>

                </div> --}}
        </section>
    </main>
@endsection

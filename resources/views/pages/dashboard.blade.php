@extends('layouts.app')
@section('headerTitle', "Dashboard")

@php
    $tableHeaders = ["Número do chamado",  "Causa", "Status", ''];
@endphp

@section('content')
    <main class="container m-auto px-3 md:px-auto mt-8 ">
        <section class="">
            <div >
                @if (count($latestsTasks) > 0)
                    <h2 class="text-white">Ultimos chamados abertos</h2>
                    <x-table :tableHeaders="$tableHeaders">
                        @foreach ($latestsTasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->cause->description}}</td>
                                <td>{{$task->status->description}}</td>
                                <td><a href="task/{{$task->id}}" class="btn bg-sky-600 text-white">Visualizar</a></td>
                            </tr>
                        @endforeach
                    </x-table>
                        @else
                    <h2 class="text-white">Nenhum chamado realizado <br/> ainda deseja realizar um?</h2>
                    <a href="{{route('task.create')}}" class="btn bg-green-200">Abrir chamado</a>
                @endif
            </div>
        </section>
        <section class="flex justify-center mt-5">
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

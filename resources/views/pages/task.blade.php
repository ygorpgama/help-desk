@extends('layouts.app')

@section('headerTitle', 'Task')

@php
    dump($task->image_link);
@endphp

@section('content')
    <main class="mt-6 container m-auto">
        <div class="p-4 bg-slate-400 w-full rounded">
            <h1 class="text-center">Chamado número #{{$task->id}}</h1>
            <section class="mt-4">
                <article class="flex justify-between">
                    <p class="font-bold text-lg uppercase">Alvo do chamado: {{$task->cause->description}}</p>
                    <p class="font-bold text-lg uppercase">Status do chamado: {{$task->status->description}}</p>
                </article>

                <article class="mt-5">
                    <h3 class="text-lg font-semibold">Descrição do ocorrido</h3>
                    <p class="text-lg">{{$task->description}}</p>
                </article>

                @if ($task->image_link)
                    <article class="mt-5">
                        <h3 class="text-lg font-semibold mb-2">Imagem anexada</h3>
                        <img src="{{asset($task->image_link)}}" alt="">
                    </article>
                @endif
            </section>
            @if ($task->status->id === 2)
                <div class="mt-4">
                    <form action="task/{{$task->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-red-500">Cancelar chamado</button>
                    </form>
                </div>
            @endif
        </div>
    </main>

@endsection

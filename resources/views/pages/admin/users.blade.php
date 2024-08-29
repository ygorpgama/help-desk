@extends('layouts.app')
@section('headerTitle', "Usuaários")

@php
    $tableHeaders = ["Nome", "Email", "Grupo"];
@endphp

@section('content')
    <main class="m-auto mt-6 container px-3 md:px-auto">
        @if (session('success'))
            <div class="bg-green-300 text-white font-bold justify-center flex items-center h-20 rounded mb-8">
                {{ session('success') }}
            </div>
        @endif
        <section >
                @if (count($users) > 0)
                    <h2 class="text-center text-white">Usuários</h2>
                    <div class="flex flex-col items-center mt-3">
                        <x-table :tableHeaders="$tableHeaders">
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->group->description}}</td>
                                </tr>
                            @endforeach
                        </x-table>
                        <div class="w-3/4 mt-4">
                            {{ $users->links()}}
                        </div>
                    </div>
                    @else
                        <h2 class="text-white text-center">Não existe nenhum usuário cadastrado no momento</h2>
                    @endif
                    <div class="mt-6">
                        <a href="{{route('admin.users.create')}}" class="btn bg-green-400 text-white hover:bg-green-500">Criar novo usuário</a>
                    </div>
            </section>
    </main>
@endsection

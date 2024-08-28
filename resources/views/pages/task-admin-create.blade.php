@extends('layouts.app')

@php
    $tableHeaders = ["Nome", ''];
@endphp

@section('headerTitle', 'Delegar Chamados')

@section('content')
    <main class="container m-auto px-3 md:px-auto mt-6 flex items-center justify-center">
        @if (session('failed'))
            <div class="bg-red-300 text-white font-bold justify-center flex items-center h-20 rounded mb-8">
                    {{ session('failed') }}
            </div>
        @endif
        <div>
            <form action="{{$task->id}}" class="w-80" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-select">
                    <select name="technician_id" id="technician" class="form-input">
                        @foreach ($users as $user)
                            <option  value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn bg-green-400 hover:bg-green-500 text-slate-800 mt-3">Designar</button>
            </form>
        </div>
    </main>
@endsection

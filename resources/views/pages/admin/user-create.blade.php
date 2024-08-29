@extends('layouts.app')
@section('headerTitle', "Usuários - Cadastro")

@section('content')
    <main class="m-auto mt-6 container px-3 md:px-auto ">
        <div class="w-full flex justify-center">
            <form  class="p-4 bg-slate-400  w-full md:w-96 rounded h-96" action="{{route('admin.users.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="label">Nome do usuário</label>
                    <input name="name" id="name" class="form-input" maxlength="50" type="text"/>
                    @error('name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="label">Email</label>
                    <input name="email" id="email" class="form-input" maxlength="100" type="email"/>
                    @error('email')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div  class="mt-4">
                    <label for="group_id" class="label">Grupo</label>
                    <select name="group_id" id="group_id" class="form-input">
                        @foreach ($groups as $group)
                        <option value="{{$group->id}}">{{$group->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn bg-green-500 hover:bg-green-600 text-white">Cadastrar usuário</button>

                </div>
            </form>
        </div>
    </main>
@endsection

@extends('layouts.app')
@section('headerTitle', "Abrir Chamado")

@section('content')
    <main class="container mt-6 m-auto px-2 md:px-auto">
        <section class="w-full flex justify-center">
            <form enctype="multipart/form-data" class="p-4 bg-slate-400  w-full md:w-3/6 rounded h-auto" action="{{route('task.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="cause_id" class="label">Causa</label>
                    <select name="cause_id" id="cause_id" class="form-input">
                        @foreach ($taskCauses as $cause)
                        <option value="{{$cause->id}}">{{$cause->description}}</option>
                        @endforeach
                    </select>
                    @error('cause_id')
                        <div class="text-red-600">{{ $message }}</div>
                @enderror
                </div>
                <div>
                    <label for="description" class="label">Descrição</label>
                    <textarea name="description" id="description" class="form-input" maxlength="255" rows="5"></textarea>
                    @error('description')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div  class="mt-4">
                    <label for="image" class="label">Imagem</label>
                    <input name="image" id="image" class="form-input" maxlength="255" type="file" rows="5"/>
                    @error('image')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn bg-green-500 hover:bg-green-600 text-white">Abrir chamado</button>

                </div>
            </form>
        </section>
    </main>
@endsection

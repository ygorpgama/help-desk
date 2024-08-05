@extends('layouts.app')
@section('headerTitle', "Dashboard")

@section('content')
    <main>
        <section class="m-auto mb-6 md:m-0  h-96 w-full flex items-center bg-help-desk  bg-cover bg-no-repeat  bg-left-top">
            <div class="p-5 ">
                <h2 class="mb-6 text-4xl font-bold text-white uppercase">Abra um novo chamado</h2>
                <a href="/chamados" class="border-none uppercase bg-red-100 py-3 px-20 hover:bg-red-300 text-slate-900 rounded-lg font-semibold cursor-pointer ">
                    Abrir chamado
                </a>
            </div>
        </section>
        <section>

        </section>
    </main>
@endsection

<nav class="bg-stone-700 p-4 flex justify-between ">
    <span class="text-white font-semibold">Logo</span>
    <div>
        <ul class="list flex">
            <li class="list__item"><a href="/" class="list__item--link text-white font-semibold">Dashboard</a></li>
            <li class="list__item"><a href="{{route('task.index')}}" class="list__item--link ml-4 text-white font-semibold">Chamados</a></li>
            <li  class="list__item" >
                <div x-data="{open: false}"  class="ml-4 justify-start h-7 w-36 rounded bg-slate-500 text-center text-white font-semibold relative">
                    <button   @click=" open = !open ">
                        <span>Administrador</span>
                        <i x-show="!open" class="fa-solid fa-chevron-down text-sm ml-1"></i>
                        <i x-show="open" class="fa-solid fa-chevron-up text-sm ml-1"></i>

                    </button>
                    <div class=" w-36 rounded bg-slate-500" x-show="open" class="absolute top-5">
                        <a href="" class="block">Usuários</a>
                        <a href="" class="block">Causas</a>
                        <a href="{{route('admin.tasks')}}" class="block">Delegar chamado</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    {{-- <a href="" class="list__item--link ml-4 text-white font-semibold">Administrador</a> --}}
</nav>

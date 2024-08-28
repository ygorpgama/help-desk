<table class="border-collapse border  border-slate-500 table-fixed h-48 text-center w-full">
    <thead class="bg-slate-500">
        @foreach ($tableHeaders as $header)
                <th  class=" border  py-4 border-slate-600">{{$header}}</th>
        @endforeach
    </thead>
    <tbody class="bg-slate-400">
        {{$slot}}
    </tbody>
</table>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beers') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
            <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Vol</th>
                <th scope="col">Inizio produzione</th>
            </tr>
            </thead>
            <tbody>
            @foreach($beers as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->tagline }}</td>
                    <td>{{ $data->abv }}%</td>
                    <td>{{ $data->first_brewed }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!!str_replace('href="/', 'href="/beers/', $beers->links()) !!}
        </div>
    </div>

</x-app-layout>

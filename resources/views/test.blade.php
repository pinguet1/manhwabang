@foreach ($manhwas as $manhwa)
    <h2>{{ $manhwa->title }}</h2>

    @foreach ($manhwa->genres as $genre)
        <li>{{ $genre->name }}</li>
    @endforeach

@endforeach



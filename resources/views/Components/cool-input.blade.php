<form method="POST" action="/manhwa">
    @csrf
    <p> Put your Manhwa / Manga here.</p>
    <input
        class = 'block min-w-0 grow bg-white py-1.5 pr-3 px-3 text-base
                text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6
                border border-gray-300 rounded-md' type="text" name="manhwa">

    <button
        type="submit" class ="text-sm/6 font-semibold
            text-gray-900 10px" style= "margin-top: 10px;">
        Submit
    </button>

</form>

    <div>
        @foreach($manhwas as $manhwa)
            <li> {{ $manhwa->name  }}</li>
        @endforeach
    </div>

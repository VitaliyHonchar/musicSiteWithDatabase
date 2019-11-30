@include ('layouts.header')
    <body>
@include ('layouts.header_song')
        @foreach ($ss as $s)
            <div class="audio_container">
                <li>
                    {{$s->group_name}} - {{$s->title}}  
                </li>
                    <audio controls="on" src="storage/files/{{$s->song_link}}"></audio>
            </div>
        @endforeach
        <div class="paginator">
            {{ $ss->appends(['sq' => $sq ])->links() }}
            </div>
            @include ('layouts.footer')
    </body>
</html>

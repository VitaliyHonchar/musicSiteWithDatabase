@include ('layouts.header')
    <body>
        
@include ('layouts.header_song')
        @foreach ($songs as $song)
            <div class="audio_container">
                <li>
                    {{$song->group_name}} - {{$song->title}}  
                </li>
                    <audio  src="storage/files/{{$song->song_link}}" controls class="audio"></audio>
            </div>
        @endforeach
        <div class="paginator">
            {{ $songs->links() }}
        </div>
            @include ('layouts.footer')
    </body>
</html>

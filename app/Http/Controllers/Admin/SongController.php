<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Song;
use App\Genre;
use App\Group;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SongController extends Controller
{
	use ValidatesRequests;
	public function index()
	{
		$songs = DB::table('songs')
        ->join('groups', 'songs.group_id', '=', 'groups.group_id')
        ->join('genres', 'songs.genre_id', '=', 'genres.id')
        ->select('songs.*', 'groups.group_name', 'genres.genre_name')
        ->orderBy('id', 'asc')
        ->paginate(10);
		return view('admin.show.song', compact('songs'));
	}
	
	
	public function create()
	{
		$genres = Genre::pluck('genre_name', 'id')->all();
		$groups = Group::pluck('group_name', 'group_id')->all();

		return view('admin.create.song', compact('genres',
			'groups'));
	}

	public function store(Request $request)
	{		
		$song = new Song;
		$song->title = $request->get('title');
		$song->year_release = $request->get('year_release');
		$song->genre_id = implode($request->get('genre_id'));
		$song->group_id = implode($request->get('group_id'));
		$song->status = 1;
		$path = $request->file('song_link');
		$name = str_random(10);
        $path->storeAs('public/files', $name . '.mp3');
        // Берем файл з запиту і записуємо його назву в БД
        $song->song_link = $name . '.mp3';
		// Зберігаємо екземпляр пісні'
        $song->save();
        //return view('create');
		return redirect()->route('song.index');
	}

	public function edit($song_id)
	{
		$genres = Genre::pluck('genre_name', 'id')->all();
		$groups = Group::pluck('group_name', 'group_id')->all();
		$song = Song::find($song_id);
		return view('admin.edit.song', compact('song','genres', 'groups'));
	}
	public function change($id)
	{	
		$song = Song::find($id);
		if ($song->status == 1){
			$song->status = 0;
			$song->save();
		}
		else{
			$song->status = 1;
			$song->save();
		}	
		return redirect()->route('song.index');
	}
	public function update(Request $request, $song_id)
	{
		$song = Song::find($song_id);
		$song->title = $request->get('title');
		$song->year_release = $request->get('year_release');
		$song->genre_id = implode($request->get('genre_id'));
		$song->group_id = implode($request->get('group_id'));
		$song->save();
		return redirect()->route('song.index');
	}
	public function destroy($song_id)
	{
		$un = Song::find($song_id);
		unlink('storage/files/' . $un->song_link);
		// Видалення файла разом з записом у бд
		$un->delete();
		return redirect()->route('song.index');
	}
	// public function search(Request $request)
	// {
	// 	$songs::find($request->get)->delete();
	// 	return redirect()->route('song.index');
	// }
}

<?php
namespace App\Http\Controllers;use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Song;
use App\Genre;
use App\Group;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Mail;

class HomeController extends Controller
{
    private $fillable = [
        'title', 'year_release', 'song_link'
    ];
    /// Контроллер Музичного Гурту
    public function index()
    {
        $songs = DB::table('songs')->
        where('status', 1)
        ->join('groups', 'songs.group_id', '=', 'groups.group_id')
        ->paginate(10);
        return view('hello', compact('songs'));
    }
    public function create(){
        $genres = Genre::pluck('genre_name', 'id')->all();
        $groups = Group::pluck('group_name', 'group_id')->all();
        return view('create', compact('genres', 'groups'));
    }
    public function store(Request $request)
    {       
        $song_un = new Song;
        $song_un->title = $request->get('title');
        $song_un->year_release = $request->get('year_release');
        $song_un->genre_id = implode($request->get('genre_id'));
        $song_un->group_id = implode($request->get('group_id'));
        $song_un->status = 0;
        $path = $request->file('song_link');
        $name = str_random(10);
        $path->storeAs('public/files', $name . '.mp3');
        // Берем файл з запиту і записуємо його назву в БД
        $song_un->song_link = $name . '.mp3';
        // Зберігаємо екземпляр пісні'
        $song_un->save();
        //return view('create');
        return redirect()->route('home');
    }
    
    // public function sendmessage(){
    //     Mail::send(['text' => 'mail'], ['name', 'Ваш сайт'], function($message){
    //         $message->to('miythretiyak@gmail.com', 'До вас')->subject('Це тест');

    //         $message->from('miythretiyak@gmail.com', 'Хз');
    //     });
    // }
    public function search(Request $request){
        $sq = $request->input('sq');
        $ss = DB::table('songs')
        ->where('status', 1)
        ->join('groups', 'songs.group_id', '=', 'groups.group_id')
        ->where('title', 'like', '%' .$sq .'%')
        ->orWhere('group_name', 'like', '%' .$sq. '%')
        ->orWhere('year_release', 'like', '%' .$sq. '%')
        ->paginate(10);
        return view('search', compact('ss', 'sq'));
    }
}
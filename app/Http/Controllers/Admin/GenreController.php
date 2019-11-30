<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genre;
use Illuminate\Foundation\Validation\ValidatesRequests;

class GenreController extends Controller
{
	use ValidatesRequests;
	public function index()
	{
		$genres = Genre::paginate(15);
		return view('admin.show.genre', compact('genres'));
	}
	
	
	public function create()
	{
		return view('admin.create.genre');
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'genre_name' => 'required'
		]);			
		Genre::create($request->all());
		return redirect()->route('genre.index');
	}

	public function edit($id)
	{
		$genre = Genre::find($id);
		return view('admin.edit.genre', compact('genre'));
	}
	public function update(Request $request, $id)
	{
		$genre = Genre::find($id);
		$genre->fill($request->all());
		$genre->save();
		return redirect()->route('genre.index');
	}
	public function destroy($id)
	{
		Genre::find($id)->delete();
		return redirect()->route('genre.index');
	}
}

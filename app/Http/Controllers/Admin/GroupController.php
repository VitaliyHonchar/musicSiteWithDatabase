<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Group;
use App\Genre;
use Illuminate\Foundation\Validation\ValidatesRequests;

class GroupController extends Controller
{
	use ValidatesRequests;
	public function index()
	{
		$groups = DB::table('groups')
		->join('genres', 'groups.genre_id', '=', 'genres.id')
		->select('groups.*', 'genres.genre_name')
		->orderBy('group_id', 'asc')
		->paginate(15);
		return view('admin.show.group', compact('groups'));
	}
	
	
	public function create()
	{
		$genres = Genre::pluck('genre_name', 'id')->all();
		return view('admin.create.group', compact('genres'));
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'group_name' => 'required'
		]);			
		$group = new Group;
		$group->group_name = $request->get('group_name');
		$group->genre_id = implode($request->get('genre_id'));
		$group->save();
		return redirect()->route('group.index');
	}

	public function edit($id)
	{	
		$genres = Genre::pluck('genre_name', 'id')->all();
		$group = Group::find($id);
		return view('admin.edit.group', compact('group', 'genres'));
	}
	public function update(Request $request, $id)
	{
		$group = Group::find($id);
		$group->group_name = $request->get('group_name');
		$group->genre_id = implode($request->get('genre_id'));
		$group->save();
		return redirect()->route('group.index');
	}
	public function destroy($id)
	{
		Group::find($id)->delete();
		return redirect()->route('group.index');
	}
}

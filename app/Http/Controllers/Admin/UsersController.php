<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
/**
 * 
 */
class UsersController extends Controller
{
	public function index()
	{
		$users = User::paginate(15);
		return view('admin.show.user', compact('users'));
	}

	public function edit($id)
	{	
		$user = User::find($id);
		if ($user->is_admin == 1){
			$user->is_admin = 0;
			$user->save();
		}
		else{
			$user->is_admin = 1;
			$user->save();
		}	
		return redirect()->route('user.index');
	}
	
	public function destroy($id)
	{
		User::find($id)->delete();
		return redirect()->route('user.index');
	}
}
<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class Song extends Model
{
	protected $fillable = [
		'title', 'year_release', 'genre_id', 'group_id'
	];
	}	

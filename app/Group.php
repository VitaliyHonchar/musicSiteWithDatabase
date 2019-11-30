<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class Group extends Model
{
	protected $primaryKey = 'group_id';
	protected $fillable = [

		'group_name', 'genre_id'];
}
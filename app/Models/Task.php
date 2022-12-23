<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Status;
use App\Models\User;

class Task extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $fillable = array('task_date', 'number', 'task_name', 'item', 'task', 'note', 'deadline', 'task_status_id');
    public function status()
    {
        return $this->belongsTo(Status::class, 'task_status_id')->withDefault([
            'status' => '!!!не определен либо удален',
        ]);
    }

    public function users()
		{
			return $this->belongsToMany(User::class, 'task_users', 'task_id', 'user_id');
		}

}

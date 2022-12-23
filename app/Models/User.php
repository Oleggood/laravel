<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Models\Role;
//use App\Models\Department;
//use App\Models\Position;
//use App\Models\Task;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = array('surname', 'name', 'patronymic', 'birthday', 'nickname', 'is_not_fired', 'login', 'password', 'note', 'department_id', 'position_id', 'role_id');

    public function role()
		{
			return $this->belongsTo(Role::class, 'role_id')->withDefault([
                'role' => '!!!не определена либо удалена',
            ]);
		}

    public function department()
		{
			return $this->belongsTo(Department::class, 'department_id')->withDefault([
                'department' => '!!!не определен либо удален',
            ]);
		}

    public function position()
		{
			return $this->belongsTo(Position::class, 'position_id')->withDefault([
                'position' => '!!!не определена либо удалена',
            ]);
		}

        public function tasks()
		{
			return $this->belongsToMany(Task::class, 'task_users', 'user_id', 'task_id');
		}

}

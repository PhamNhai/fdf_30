<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use File;
use App\Helpers\CheckFile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'address',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function suggests()
    {
        return $this->hasMany(Suggest::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function scopeDeleteUser($query, $id)
    {
        $user = $query->find($id);
        if ($user) {
            File::delete($user->avatar);
            $user->delete();

            return true;
        }
        return false;
    }

    public function scopeCreateUser($query, $request)
    {
        $input = $request->only('name', 'email', 'address', 'phone');
        $input['password'] = bcrypt($request->password);
        $input['role'] = config('app.user');
        $name = CheckFile::uploadAvatar($request);
        if ($name != null) {
            $input['avatar'] = config('app.avatar_path') . $name;
        } else {
            $input['avatar'] = null;
        }
        return $this->create($input);
    }

    public function scopeUpdateUser($query, $id, $request)
    {
        $user = $query->findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $name = CheckFile::uploadAvatar($request);
        if ($name) {
            $user->avatar = config('app.avatar_path') . $name;
            file::delete($request->current_img);
        } else {
            $user->avatar = $request->current_img;
        }
        $user->save();
    }
}

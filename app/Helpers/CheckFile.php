<?php

namespace App\Helpers;

use Webpatser\Uuid\Uuid;

class CheckFile
{
    public static function uploadImage($request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = Uuid::generate() . '_' . $file->getClientOriginalName();
            $file->move(config('app.image_path'), $name);

            return $name;
        }
    }

    public static function uploadAvatar($request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = Uuid::generate() . '_' . $file->getClientOriginalName();
            $file->move(config('app.avatar_path'), $name);

            return $name;
        }
    }
}

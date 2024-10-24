<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cms extends Model
{
    public function scopeGetWallpaper($query)
    {
        $query = DB::table("cms_wallpaper")
            ->select('*')
            ->first();

        return $query;
    }

    public function scopeUpdateWallpaper($query, $data)
    {
        $query = DB::table("cms_wallpaper")
            ->where('id',$data['id'])
            ->update($data);

        return $query;
    }

    public function scopeGetTestimoni($query)
    {
        $query = DB::table("cms_testimoni")
            ->select('*')
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeSaveTestimoni($query, $data)
    {
        $query = DB::table("cms_testimoni")
            ->insert($data);

        return $query;
    }
}

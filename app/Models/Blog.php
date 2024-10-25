<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    public function scopeGetBlogList($query, $category)
    {
        $query = DB::table("blog")
            ->select('*')
            ->where('category', $category)
            ->orderBy('created_at', 'desc')
            ->get();

        return $query;
    }

    public function scopeSaveBlog($query, $data)
    {
        $query = DB::table("blog")
            ->insert($data);

        return $query;
    }

    public function scopeGetBlog($query, $uuid)
    {
        $query = DB::table("blog")
            ->select('*')
            ->where('uuid', $uuid)
            ->first();

        return $query;
    }

    public function scopeUpdateBlog($query, $uuid, $data)
    {
        $query = DB::table("blog")
            ->where('uuid',$uuid)
            ->update($data);

        return $query;
    }

    public function scopeDeleteBlog($query, $uuid)
    {
        $query = DB::table("blog")
            ->where('uuid',$uuid)
            ->delete();

        return $query;
    }
}
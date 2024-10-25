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
            ->get();

        return $query;
    }

    public function scopeSaveBlog($query, $data)
    {
        $query = DB::table("blog")
            ->insert($data);

        return $query;
    }

    public function scopeGetBlog($query, $id)
    {
        $query = DB::table("blog")
            ->select('*')
            ->where('id', $id)
            ->first();

        return $query;
    }

    public function scopeUpdateBlog($query, $id, $data)
    {
        $query = DB::table("blog")
            ->where('id',$id)
            ->update($data);

        return $query;
    }

    public function scopeDeleteBlog($query, $id)
    {
        $query = DB::table("blog")
            ->where('id',$id)
            ->delete();

        return $query;
    }
}
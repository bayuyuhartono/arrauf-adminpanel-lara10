<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cms extends Model
{
    // wallpaper
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

    // quote
    public function scopeGetQuote($query)
    {
        $query = DB::table("cms_quote")
            ->select('*')
            ->first();

        return $query;
    }

    // footer
    public function scopeGetFooter($query)
    {
        $query = DB::table("cms_footer")
            ->select('*')
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeUpdateFooter($query, $data)
    {
        $query = DB::table("cms_footer")
            ->where('id',$data['id'])
            ->update($data);

        return $query;
    }

    // testimoni
    public function scopeGetTestimoniList($query)
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

    public function scopeGetTestimoni($query, $id)
    {
        $query = DB::table("cms_testimoni")
            ->select('*')
            ->where('id', $id)
            ->first();

        return $query;
    }

    public function scopeUpdateTestimoni($query, $id, $data)
    {
        $query = DB::table("cms_testimoni")
            ->where('id',$id)
            ->update($data);

        return $query;
    }

    public function scopeDeleteTestimoni($query, $id)
    {
        $query = DB::table("cms_testimoni")
            ->where('id',$id)
            ->delete();

        return $query;
    }

    // motto
    public function scopeGetMottoList($query)
    {
        $query = DB::table("cms_motto")
            ->select('*')
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeSaveMotto($query, $data)
    {
        $query = DB::table("cms_motto")
            ->insert($data);

        return $query;
    }

    public function scopeGetMotto($query, $id)
    {
        $query = DB::table("cms_motto")
            ->select('*')
            ->where('id', $id)
            ->first();

        return $query;
    }

    public function scopeUpdateMotto($query, $id, $data)
    {
        $query = DB::table("cms_motto")
            ->where('id',$id)
            ->update($data);

        return $query;
    }

    public function scopeDeleteMotto($query, $id)
    {
        $query = DB::table("cms_motto")
            ->where('id',$id)
            ->delete();

        return $query;
    }

    // gallery
    public function scopeGetGalleryList($query, $type)
    {
        $query = DB::table("cms_gallery")
            ->select('*')
            ->where('type', $type)
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeSaveGallery($query, $data)
    {
        $query = DB::table("cms_gallery")
            ->insert($data);

        return $query;
    }

    public function scopeGetGallery($query, $uuid)
    {
        $query = DB::table("cms_gallery")
            ->select('*')
            ->where('uuid', $uuid)
            ->first();

        return $query;
    }

    public function scopeUpdateGallery($query, $uuid, $data)
    {
        $query = DB::table("cms_gallery")
            ->where('uuid',$uuid)
            ->update($data);

        return $query;
    }

    public function scopeDeleteGallery($query, $uuid)
    {
        $query = DB::table("cms_gallery")
            ->where('uuid',$uuid)
            ->delete();

        return $query;
    }
}

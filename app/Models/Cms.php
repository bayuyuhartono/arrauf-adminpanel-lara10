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

    // ppdb
    public function scopeGetPpdb($query)
    {
        $query = DB::table("cms_ppdb")
            ->select('*')
            ->first();

        return $query;
    }

    public function scopeUpdatePpdb($query, $data)
    {
        $query = DB::table("cms_ppdb")
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

    // sosmed
    public function scopeGetContact($query)
    {
        $query = DB::table("cms_contact")
            ->select('*')
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeUpdateContact($query, $data)
    {
        $query = DB::table("cms_contact")
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

    // benefit
    public function scopeGetBenefitList($query)
    {
        $query = DB::table("cms_benefit")
            ->select('*')
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeSaveBenefit($query, $data)
    {
        $query = DB::table("cms_benefit")
            ->insert($data);

        return $query;
    }

    public function scopeGetBenefit($query, $id)
    {
        $query = DB::table("cms_benefit")
            ->select('*')
            ->where('id', $id)
            ->first();

        return $query;
    }

    public function scopeUpdateBenefit($query, $id, $data)
    {
        $query = DB::table("cms_benefit")
            ->where('id',$id)
            ->update($data);

        return $query;
    }

    public function scopeDeleteBenefit($query, $id)
    {
        $query = DB::table("cms_benefit")
            ->where('id',$id)
            ->delete();

        return $query;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;

    const STATUS_ACTIVE     = 1;
    const STATUS_DRAFT      = 0;
    const STATUS_DELETE     = -1;

    public function scopeIsNotDeleted($query)
    {
        return $query->where('status', '!=' ,static::STATUS_DELETE);
    }

    public function scopeIsOrganization($query)
    {
        return $query->where('organization_id', Auth::user()->organization_id);
    }

    public function getStatus()
    {
        $msg = "<span class='badge badge-primary'>Belum Selesai</span>";
        if($this->status == 10) {
            $msg = "<span class='badge badge-success'>Selesai</span>";
        } 
        return $msg;
    }

    public function getLeftStatus()
    {
        $msg = "primary";
        if($this->status == 10) {
            $msg = "success";
        } 
        return $msg;
    }

    public function category()
    {
        return $this->hasMany('App\Models\PostCategory');
    }

}

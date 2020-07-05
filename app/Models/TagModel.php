<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    public static function get_all() {
        return DB::table('tag')->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earn extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relation_earncategory()
    {
        return $this->hasOne("App\Models\EarnCategory", "id", "earncategory_id");
    }
}

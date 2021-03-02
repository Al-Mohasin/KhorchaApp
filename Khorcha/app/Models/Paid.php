<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relation_paidcategory()
    {
        return $this->hasOne("App\Models\PaidCategory", "id", "paidcategory_id");
    }
}

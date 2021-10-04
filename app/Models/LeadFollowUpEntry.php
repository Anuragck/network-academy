<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadFollowUpEntry extends Model
{
    use HasFactory;
    protected $table="lead_follow_up_entries";

    // public function enqueries(){
    // return $this->belongsTo(CourseEnquiry::class);
    // }
}

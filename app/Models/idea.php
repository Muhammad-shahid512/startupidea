<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
      protected $table="ideas";
    protected $guarded=[];
        use HasFactory;

    public function ideacate() {
    return $this->belongsTo(IdeaCategory::class, 'idea_category');
}

}

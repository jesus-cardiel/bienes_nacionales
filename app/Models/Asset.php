<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'codigo', 'description', 'brand', 'model', 'serial_number',
        'status', 'category_id', 'department_id', 'responsible_name',
        'acquisition_date', 'value'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name','date','location','description','max_attendees','created_by'];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function attendees() {
        return $this->belongsToMany(User::class, 'enrollments')->withTimestamps();
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}

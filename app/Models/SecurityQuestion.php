<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityQuestion extends Model
{
    use HasFactory;
    protected $table = 'security_questions';
    protected $fillable = [
        'admin_id', 'question1', 'answer1', 'question2', 'answer2', 'question3', 'answer3', 'date', 'status'
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

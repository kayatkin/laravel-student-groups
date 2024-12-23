<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Разрешенные поля для массового присваивания
    protected $fillable = ['group_id', 'surname', 'name'];

    // Связь: студент принадлежит группе
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}

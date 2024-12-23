<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Group extends Model
{
    use HasFactory;

    // Разрешаем массовое заполнение для этих полей
    protected $fillable = ['title', 'start_from', 'is_active'];

    // Автоматическое преобразование поля start_from в объект Carbon
    protected $casts = [
        'start_from' => 'datetime:Y-m-d',
    ];

    /**
     * Связь "Группа имеет много студентов".
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Преобразует значение start_from в формат Y-m-d, если это объект Carbon.
     *
     * @return string|null
     */
    public function getStartFromFormattedAttribute()
    {
        return $this->start_from ? $this->start_from->format('Y-m-d') : null;
    }
}

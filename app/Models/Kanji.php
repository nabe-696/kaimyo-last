<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;

    /**
     * このモデルで一括割当（Mass Assignment）を可能にする属性。
     *
     * @var array
     */
    protected $fillable = ['characters', 'user_id'];

    /**
     * この漢字が属するユーザーを取得する。
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

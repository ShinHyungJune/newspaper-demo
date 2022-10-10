<?php

namespace App\Models;

use App\Enums\PointType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "url",
        "category",
        "count_text",
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::created(function($model){
            $point = PointType::$points[PointType::READ_HISTORY_CREATED];

            $result = $model->user->pointHistories()->create([
                "type" => PointType::READ_HISTORY_CREATED,
                "point" => $point
            ]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getBookUnit()
    {
        return 100;
    }
}

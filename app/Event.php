<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

    
class Event extends Model
{
    //
    protected $dates = [
        // 'event_date', //追加する。
        'created_at',
        'updated_at'
        // 'deleted_at'
        
        
    ];

    protected $guarded = ['id'];
    
    
    // fillableとguardedの指定はどちらかだけでいい
    // public function getEventDateAttribute($value)
    //     {
    //         return Carbon::parse($value)->format('Y-m-d\TH:i');
    //     }
    // public function setEventDateAttribute($value)
    //         {
    //             $this->attributes['event_date'] = Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $value);
    //         }
    // public function getPublishedAtAttribute()
    //         {
    //             return $this->publishedAt->format('YY-MM-DD') .'T'.$this->publishedAt->format('HH:MM:SS');
    //         }
    
    // public function getDates()
    //     {
    //         return array();
    //     }

}

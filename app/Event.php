<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


    
class Event extends Model
{
    //
    protected $dates = [
        // 'event_date', //追加する。
        'created_at',
        'updated_at'
        // 'deleted_at'
        
        
    ];
    // protected $dateFormat = 'Y-m-d H:i';
    protected $guarded = ['id'];
    // fillableとguardedの指定はどちらかだけでいい
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponMatch extends Model
{
    protected $table = 'coupon_matches';

    protected $fillable = [
        'coupon_id',
        'match_id',
        'prediction',
        'odds',
        'status',
    ];

    protected $casts = [
        'odds' => 'float',
    ];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function match()
    {
        return $this->belongsTo(Matchs::class, 'match_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = [
        'title',
        'is_premium',
        'total_odds',
        'status',
        'confidence',
        'note',
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'total_odds' => 'float',
        'confidence' => 'integer',
    ];

    public function couponMatches()
    {
        return $this->hasMany(CouponMatch::class, 'coupon_id');
    }

    // Doğrudan maç bilgilerine ulaşmak için
    public function matches()
    {
        return $this->belongsToMany(Matchs::class, 'coupon_matches', 'coupon_id', 'match_id')
            ->withPivot('prediction', 'odds', 'status')
            ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    protected $table = 'matches';

    protected $fillable = [
        'fixture_id',
        'league_id',
        'season',
        'league_name',
        'league_logo',
        'home_team_id',
        'home_team',
        'home_logo',
        'away_team_id',
        'away_team',
        'away_logo',
        'match_date',
        'match_status',
        'round',
        'home_score',
        'away_score',
        'halftime_score',
        'prediction',
        'odds',
        'is_premium',
        'prediction_status',
        'analysis',
        'confidence',
        'home_form',
        'away_form',
        'h2h_data',
        'standings_data',
        'match_stats',
        'lineups',
    ];

    protected $casts = [
        'match_date' => 'datetime',
        'is_premium' => 'boolean',
        'odds' => 'float',
        'confidence' => 'integer',
        'h2h_data' => 'array',
        'standings_data' => 'array',
        'match_stats' => 'array',
        'lineups' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function favoritedBy()
    {
        return $this->belongsToMany(
            User::class,
            'match_user_favorites',
            'match_id',
            'user_id'
        )->withTimestamps();
    }

    public function isFavoriteForUser($userId): bool
    {
        if (!$userId) {
            return false;
        }

        return $this->favoritedBy()
            ->where('user_id', $userId)
            ->exists();
    }

    public function scopeFavoritesFor($query, $userId)
    {
        return $query->whereHas('favoritedBy', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        });
    }
}

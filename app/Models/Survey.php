<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        //Section 1

        'farm_type',
        'land_size',
        //Section 2

        'regenerative_practice',
        'farming_challenges',
        'soil_quality',
        'irrigation_access',
        'water_source',
        'soil_improvement_techniques',

        //Section 3
        'interest_training',
        'training_areas',
        'pay_for_training',
        'join_digital_platform',
        'find_operators',
        'upskill_operators',
        
        //Section 4
        'farm_operation',
        'record_keeping',
        'profitability_analysis',
        'long_term_strategy',
        'borrowing_habits',
        'sources_of_finance',
        'finance_access_challenges',

        //Section 5
        'market_reliability',
        'sales_channels',
        'selling_challenges',

        //Section 6
        'interest_new_crops',
        'interest_livestock_farming',
        'current_crops',
        'crop_choice_constraints',
        'current_livestock',
        'livestock_farming_challenges',
    ];

    protected $casts = [
        //Section 2
        'farming_challenges' => 'json',
        'soil_improvement_techniques' => 'json',

        //Section 3
        'training_areas' => 'json',

        //Section 4
        'sources_of_finance' => 'json',
        'finance_access_challenges' => 'json',

        //Section 5
        'sales_channels' => 'json',
        'selling_challenges' => 'json',

        //Section 6
        'current_crops' => 'json',
        'crop_choice_constraints' => 'json',
        'current_livestock' => 'json',
        'livestock_farming_challenges' => 'json',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

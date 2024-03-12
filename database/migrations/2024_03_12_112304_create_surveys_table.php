<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            //Section 1
            $table->string('farm_type');
            $table->string('land_size');
            //Section 2
            $table->string('regenerative_practice');
            $table->json('farming_challenges')->nullable();
            $table->string('soil_quality');
            $table->string('irrigation_access');
            $table->string('water_source');
            $table->json('soil_improvement_techniques')->nullable();
            //Section 3
            $table->string('interest_training');
            $table->json('training_areas')->nullable();
            $table->string('pay_for_training');
            $table->string('join_digital_platform');
            $table->string('find_operators');
            $table->string('upskill_operators');
            //Section 4
            $table->string('farm_operation');
            $table->string('record_keeping');
            $table->string('profitability_analysis');
            $table->string('long_term_strategy');
            $table->string('borrowing_habits');
            $table->json('sources_of_finance')->nullable();
            $table->json('finance_access_challenges')->nullable();
            //Section 5
            $table->string('market_reliability');
            $table->json('sales_channels')->nullable();
            $table->json('selling_challenges')->nullable();

            //Section 6
            $table->string('interest_new_crops');
            $table->string('interest_livestock_farming');
            $table->json('current_crops')->nullable();
            $table->json('crop_choice_constraints')->nullable();
            $table->json('current_livestock')->nullable();
            $table->json('livestock_farming_challenges')->nullable();




            $table->timestamps();
            
            // Add foreign key constraint for user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};

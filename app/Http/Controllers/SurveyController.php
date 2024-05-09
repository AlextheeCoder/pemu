<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SurveyController extends Controller
{
    //
    public function store(Request $request)
    {
        

        $formFields = $request->validate([
            // Section 1
            'farm_type' => 'required|string',
            'land_size' => 'required|string',
    
            // Section 2
            'regenerative_practice' => 'required|string',
            'soil_quality' => 'required|string',
            'irrigation_access' => 'required|string',
            'water_source' => 'required|string',
    
            // Checkboxes Section 2
            'farming_challenges' => 'array',
            'farming_challenges.*' => 'string',
            'soil_improvement_techniques' => 'array',
            'soil_improvement_techniques.*' => 'string',

            //Section 3
            'interest_training' => 'required|string',
            'pay_for_training' => 'required|string',
            'join_digital_platform' => 'required|string',
            'find_operators' => 'required|string',
            'upskill_operators' => 'required|string',

             // Checkboxes Section 3
             'training_areas' => 'array',
             'training_areas.*' => 'string',

             // Section 4
            'farm_operation' => 'required|string',
            'record_keeping' => 'required|string',
            'profitability_analysis' => 'required|string',
            'long_term_strategy' => 'required|string',
            'borrowing_habits' => 'required|string',

            //Checkboxes Section 4
            'sources_of_finance' => 'array',
            'sources_of_finance.*' => 'string',
            'finance_access_challenges' => 'array',
            'finance_access_challenges.*' => 'string',

            //Section 5
            'market_reliability' => 'required|string',

            //Checkboxes for section 5
            'sales_channels' => 'array',
            'sales_channels.*' => 'string',
            'selling_challenges' => 'array',
            'selling_challenges.*' => 'string',

            // Section 6
            'interest_new_crops' => 'required|string',
            'interest_livestock_farming' => 'required|string',
            
            //Checkboxes for section 6
            'current_crops' => 'array',
            'current_crops.*' => 'string',
            'crop_choice_constraints' => 'array',
            'crop_choice_constraints.*' => 'string',
            'current_livestock' => 'array',
            'current_livestock.*' => 'string',
            'livestock_farming_challenges' => 'array',
            'livestock_farming_challenges.*' => 'string',


        ]);

       
    
       //Section 2 Checkbox
        $formFields['farming_challenges'] = $request->input('farming_challenges');
        $formFields['soil_improvement_techniques'] = $request->input('soil_improvement_techniques');

        //Section 3 Checkbox
        $formFields['training_areas'] = $request->input('training_areas');

        // Section 4 Checkbox
        $formFields['sources_of_finance'] = $request->input('sources_of_finance');
        $formFields['finance_access_challenges'] = $request->input('finance_access_challenges');


        //Section 5 Checkbox
        $formFields['sales_channels'] = $request->input('sales_channels');
        $formFields['selling_challenges'] = $request->input('selling_challenges');

        //Section 6 Checkbox
        $formFields['current_crops'] = $request->input('current_crops');
        $formFields['crop_choice_constraints'] = $request->input('crop_choice_constraints');
        $formFields['current_livestock'] = $request->input('current_livestock');
        $formFields['livestock_farming_challenges'] = $request->input('livestock_farming_challenges');



        $user = $request->user();
        $userId = $user->id;
        $formFields['user_id'] = $userId;
        info($formFields);
        Log::info('Request data:', $request->all());
        Survey::create($formFields);
    
        return redirect('/')->with('message', 'Your Response has been successfully stored');
    }
}

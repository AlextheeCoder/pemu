<div class="form-section" id="section3">
    <h2>Training and Extension Services</h2>
<div class="part">
    <label for="interest-training">Interest in Training Services:</label>
    <select class="form-select form-select-lg mb-3" id="interest-training" name="interest_training">
        <option value="very-interested">Very interested</option>
        <option value="somewhat-interested">Somewhat interested</option>
        <option value="neutral">Neutral</option>
        <option value="not-very-interested">Not very interested</option>
        <option value="not-interested">Not interested</option>
    </select>
</div>



<div class="part">
    <label for="training-areas">Desired Training Areas:</label>
    <div class="checkbox-group">
        <label class="checkbox">
            <input type="checkbox" id="training-area-input-1" name="training_areas[]" value="soil-health">
            <span class="checkmark"></span>
            <span class="text">Soil health</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="training-area-input-2" name="training_areas[]" value="crop-diversification">
            <span class="checkmark"></span>
            <span class="text">Crop diversification</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="training-area-input-3" name="training_areas[]" value="pest-disease-management">
            <span class="checkmark"></span>
            <span class="text">Pest/disease management</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="training-area-input-4" name="training_areas[]" value="water-conservation">
            <span class="checkmark"></span>
            <span class="text">Water conservation</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="training-area-input-5" name="training_areas[]" value="market-access">
            <span class="checkmark"></span>
            <span class="text">Market access</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="training-area-input-6" name="training_areas[]" value="farming-technology">
            <span class="checkmark"></span>
            <span class="text">Farming technology</span>
        </label>
        <label class="checkbox">
            <input type="checkbox" id="training-area-input-7" name="training_areas[]" value="none">
            <span class="checkmark"></span>
            <span class="text">None of the Above</span>
        </label>
    </div>
</div>


<div class="part">
    <label for="pay-for-training">Willingness to Pay for Training:</label>
    <div class="radio-group">
        <div class="custom-radio">
            <input type="radio" id="pay-for-training-yes" name="pay_for_training" value="yes">
            <label class="radio-label" for="pay-for-training-yes">
                <div class="radio-circle"></div>
                <span class="radio-text">Yes</span>
            </label>

            <input type="radio" id="pay-for-training-no" name="pay_for_training" value="no">
            <label class="radio-label" for="pay-for-training-no">
                <div class="radio-circle"></div>
                <span class="radio-text">No</span>
            </label>

            <input type="radio" id="pay-for-training-depends" name="pay_for_training" value="depends-on-cost">
            <label class="radio-label" for="pay-for-training-depends">
                <div class="radio-circle"></div>
                <span class="radio-text">Depends on cost</span>
            </label>
        </div>
    </div>
</div>



<div class="part">
    <label for="join-digital-platform">Likelihood to Join Digital Platform:</label>
<select class="form-select form-select-lg mb-3"  id="join-digital-platform" name="join_digital_platform">
    <option value="very-likely">Very likely</option>
    <option value="likely">Likely</option>
    <option value="unsure">Unsure</option>
    <option value="unlikely">Unlikely</option>
    <option value="very-unlikely">Very unlikely</option>
</select>
</div>


<div class="part">
    <label for="find-operators">Challenges in Finding Operators:</label>
    <select class="form-select form-select-lg mb-3" id="find-operators" name="find_operators">
        <option value="frequently">Frequently</option>
        <option value="sometimes">Sometimes</option>
        <option value="rarely">Rarely</option>
        <option value="not-at-all">Not at all</option>
    </select>
</div>



<div class="part">
    <label for="upskill-operators">Interest in Upskilling Operators:</label>
    <select class="form-select form-select-lg mb-3" id="upskill-operators" name="upskill_operators">
        <option value="very-interested">Very interested</option>
        <option value="somewhat-interested">Somewhat interested</option>
        <option value="neutral">Neutral</option>
        <option value="not-very-interested">Not very interested</option>
        <option value="not-interested">Not interested</option>
    </select>
</div>

<div class="button-group">
    <button class="btn btn-warning" onclick="prevSection('section3', 'section2')">Previous</button>
    <button  class="btn btn-success" onclick="nextSection('section3', 'section4')">Next</button>
</div>
</div>
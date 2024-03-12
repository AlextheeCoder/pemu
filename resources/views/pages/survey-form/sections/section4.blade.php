<div class="form-section" id="section4">
    <h2>Business Operations and Financial Management</h2>

<div class="part">
    <label for="farm-operation">Farm Operation as a Business:</label>
    <select class="form-select form-select-lg mb-3" id="farm-operation" name="farm_operation">
        <option value="fully-business">Fully as a business</option>
        <option value="partially-business">Partially as a business</option>
        <option value="subsistence">Subsistence</option>
        <option value="hobby">Hobby/personal use</option>
    </select>
</div>


<div class="part">
    <label for="record-keeping">Record-Keeping:</label>
    <select class="form-select form-select-lg mb-3" id="record-keeping" name="record_keeping">
        <option value="detailed-records">Detailed records</option>
        <option value="some-records">Some records</option>
        <option value="no-records">No records</option>
    </select>
</div>


<div class="part">
    <label for="profitability-analysis">Profitability Analysis:</label>
    <select class="form-select form-select-lg mb-3" id="profitability-analysis" name="profitability_analysis">
        <option value="frequently">Frequently</option>
        <option value="occasionally">Occasionally</option>
        <option value="rarely">Rarely</option>
        <option value="never">Never</option>
    </select>
</div>

<div class="part">
    <label for="long-term-strategy">Long-term Strategy/Plan:</label>
    <select class="form-select form-select-lg mb-3" id="long-term-strategy" name="long_term_strategy">
        <option value="detailed-plan">Detailed plan</option>
        <option value="general-idea">General idea</option>
        <option value="no-plan">No plan</option>
    </select>
</div>

<div class="part">
    <label for="sources-of-finance">Sources of Finance:</label>
    <div class="checkbox-group">
        <label class="checkbox">
            <input type="checkbox" id="finance-source-1" name="sources_of_finance[]" value="personal-savings">
            <span class="checkmark"></span>
            <span class="text">Personal savings</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-source-2" name="sources_of_finance[]" value="bank-loans">
            <span class="checkmark"></span>
            <span class="text">Bank loans</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-source-3" name="sources_of_finance[]" value="microfinance">
            <span class="checkmark"></span>
            <span class="text">Microfinance</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-source-4" name="sources_of_finance[]" value="government-grants">
            <span class="checkmark"></span>
            <span class="text">Government grants</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-source-5" name="sources_of_finance[]" value="friends-family-loans">
            <span class="checkmark"></span>
            <span class="text">Friends/family loans</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-source-6" name="sources_of_finance[]" value="crowdfunding">
            <span class="checkmark"></span>
            <span class="text">Crowdfunding</span>
        </label>
        <label class="checkbox">
            <input type="checkbox" id="finance-source-7" name="sources_of_finance[]" value="none">
            <span class="checkmark"></span>
            <span class="text">None of the Above</span>
        </label>
    </div>
</div>


<div class="part">
    <label for="borrowing-habits">Borrowing Habits:</label>
    <div class="radio-group">
        <div class="custom-radio">
            <input type="radio" id="borrowing-yes" name="borrowing_habits" value="yes">
            <label class="radio-label" for="borrowing-yes">
                <div class="radio-circle"></div>
                <span class="radio-text">Yes, in past year</span>
            </label>
        </div>

        <div class="custom-radio">
            <input type="radio" id="borrowing-no" name="borrowing_habits" value="no">
            <label class="radio-label" for="borrowing-no">
                <div class="radio-circle"></div>
                <span class="radio-text">No</span>
            </label>
        </div>
    </div>
</div>


<div class="part">
    <label for="finance-access-challenges">Challenges in Finance Access:</label>
    <div class="checkbox-group">
        <label class="checkbox">
            <input type="checkbox" id="finance-access-challenge-1" name="finance_access_challenges[]" value="high-interest-rates">
            <span class="checkmark"></span>
            <span class="text">High interest rates</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-access-challenge-2" name="finance_access_challenges[]" value="stringent-criteria">
            <span class="checkmark"></span>
            <span class="text">Stringent criteria</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-access-challenge-3" name="finance_access_challenges[]" value="complex-processes">
            <span class="checkmark"></span>
            <span class="text">Complex processes</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-access-challenge-4" name="finance_access_challenges[]" value="limited-financial-knowledge">
            <span class="checkmark"></span>
            <span class="text">Limited financial knowledge</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="finance-access-challenge-5" name="finance_access_challenges[]" value="lack-of-suitable-products">
            <span class="checkmark"></span>
            <span class="text">Lack of suitable products</span>
        </label>
        <label class="checkbox">
            <input type="checkbox" id="finance-access-challenge-6" name="finance_access_challenges[]" value="none">
            <span class="checkmark"></span>
            <span class="text">None of the Above</span>
        </label>
    </div>
</div>



    <div class="button-group">
        <button class="btn btn-warning" onclick="prevSection('section4', 'section3')">Previous</button>
        <button class="btn btn-success" onclick="nextSection('section4', 'section5')">Next</button>
    </div>   
</div>
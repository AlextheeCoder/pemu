<div class="form-section" id="section5">

    <h2>Sales and Marketing</h2>

    <div class="part">
        <label for="sales-channels">Sales Channels:</label>
        <div class="checkbox-group">
            <label class="checkbox">
                <input type="checkbox" id="sales-channel-1" name="sales_channels[]" value="direct-to-consumers">
                <span class="checkmark"></span>
                <span class="text">Direct to consumers</span>
            </label>
    
            <label class="checkbox">
                <input type="checkbox" id="sales-channel-2" name="sales_channels[]" value="cooperatives-groups">
                <span class="checkmark"></span>
                <span class="text">Cooperatives/groups</span>
            </label>
    
            <label class="checkbox">
                <input type="checkbox" id="sales-channel-3" name="sales_channels[]" value="local-retailers">
                <span class="checkmark"></span>
                <span class="text">Local retailers</span>
            </label>
    
            <label class="checkbox">
                <input type="checkbox" id="sales-channel-4" name="sales_channels[]" value="wholesalers">
                <span class="checkmark"></span>
                <span class="text">Wholesalers</span>
            </label>
    
            <label class="checkbox">
                <input type="checkbox" id="sales-channel-5" name="sales_channels[]" value="online-platforms">
                <span class="checkmark"></span>
                <span class="text">Online platforms</span>
            </label>
            <label class="checkbox">
                <input type="checkbox" id="sales-channel-6" name="sources_of_finance[]" value="none">
                <span class="checkmark"></span>
                <span class="text">None of the Above</span>
            </label>

           
        </div>
    </div>
    

<div class="part">
    <label for="market-reliability">Market Reliability:</label>
    <select class="form-select form-select-lg mb-3" id="market-reliability" name="market_reliability">
        <option value="consistently-reliable">Consistently reliable</option>
        <option value="mostly-reliable">Mostly reliable</option>
        <option value="often-struggle">Often struggle</option>
        <option value="no-reliable-market">No reliable market</option>
    </select>
</div>


<div class="part">
    <label for="selling-challenges">Selling Challenges:</label>
    <div class="checkbox-group">
        <label class="checkbox">
            <input type="checkbox" id="selling-challenge-1" name="selling_challenges[]" value="price-fluctuations">
            <span class="checkmark"></span>
            <span class="text">Price fluctuations</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="selling-challenge-2" name="selling_challenges[]" value="access-to-markets">
            <span class="checkmark"></span>
            <span class="text">Access to markets</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="selling-challenge-3" name="selling_challenges[]" value="competition">
            <span class="checkmark"></span>
            <span class="text">Competition</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="selling-challenge-4" name="selling_challenges[]" value="transportation-logistics">
            <span class="checkmark"></span>
            <span class="text">Transportation/logistics</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="selling-challenge-5" name="selling_challenges[]" value="quality-standards">
            <span class="checkmark"></span>
            <span class="text">Quality standards</span>
        </label>

        <label class="checkbox">
            <input type="checkbox" id="selling-challenge-6" name="selling_challenges[]" value="marketing-skills">
            <span class="checkmark"></span>
            <span class="text">Marketing skills</span>
        </label>
        <label class="checkbox">
            <input type="checkbox" id="selling-challenge-7" name="sources_of_finance[]" value="none">
            <span class="checkmark"></span>
            <span class="text">None of the Above</span>
        </label>
    </div>
</div>





    <div class="button-group">
        <button class="btn btn-warning" onclick="prevSection('section5', 'section4')">Previous</button>
        <button class="btn btn-success" onclick="nextSection('section5', 'section6')">Next</button>
    </div> 
</div>
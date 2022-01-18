    <!-- search part -->
    <div class="container">
        <input type="text" id="search_input" class="form-control" placeholder="Search a patient" onkeyup="showSuggestionToEnter(event)">
        <button id="seacrch_btn" onclick="showSuggestions()">Search</button>
        <button onclick="reset()">Clear</button>
        <p>Matches: <span id="search_result" style="font-weight:bold"></span></p>
        <a href="#"></a>
    </div>

    <!-- add this as a card -->
    <div class="container" >
        <h3>Total patients assigned to you: <?php echo $count;?></h3>
        <br>
    </div>
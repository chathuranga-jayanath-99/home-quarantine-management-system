const URLROOT = "http://localhost/home-isolation-system";

function showSuggestions(){
    var search_input = document.getElementById('search_input');
    var search_output = document.getElementById('search_result');
    var str = search_input.value;

    if (str.length == 0){
        search_output.innerHTML  = '';
    }
    else{
        // AJAX req
        var xhr = new XMLHttpRequest();

        xhr.open("GET", URLROOT+"/doctor/search-patient?name="+str, true);
        xhr.onload = function(){
            if (this.status == 200){
                var patients = JSON.parse(this.responseText);
                // console.log(patients);
                var output = '';
                var res = [];
                
                if (patients['adult'].length > 0 || patients['child'].length > 0){
                    for (var i in patients['adult']){
                        $patient = patients['adult'][i];
                        res.push('<a href="'+URLROOT+
                        '/doctor/check-patient?id='+ $patient.id + '&type=adult">'+
                        $patient.name +'</a>');
                    }
                    for (var i in patients['child']){
                        $patient = patients['child'][i];
                        res.push('<a href="'+URLROOT+
                        '/doctor/check-patient?id='+ $patient.id + '&type=child">'+
                        $patient.name +'</a>');
                    }
    
                    $output = res.join(',');
                }
                else{
                    $output='No matches found.'
                }
                
                search_output.innerHTML = $output;
            }
        }
        xhr.send();
    }
}

function reset(){
    var search_input = document.getElementById('search_input');
    var search_output = document.getElementById('search_result');
    search_input.value = '';
    search_output.innerHTML = '';
}

function showSuggestionToEnter(event){
    console.log(event);
    if (event.keyCode === 13){
        showSuggestions();
    }
}

function endQuarantinePeriod(patinetId, patinetType){
    var xhr = new XMLHttpRequest();

    var params = "id="+patinetId+"&type="+patinetType;

    if (patinetType == 'child'){
        xhr.open("POST", URLROOT+"/child-patient/end-quarantine-period?id="+patinetId, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
        xhr.onload = function (){
            if (this.status == 200){
                console.log(this.responseText);
            }
            
        }
    
        xhr.send(params);
    }
    else if (patinetType == 'adult'){
        xhr.open("POST", URLROOT+"/adult-patient/end-quarantine-period?id="+patinetId, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
        xhr.onload = function (){
            if (this.status == 200){
                console.log(this.responseText);
            }
            
        }
    
        xhr.send(params);
    }


}

function extendQuarantineDate(extended_date, patinetId, patinetType){
    var xhr = new XMLHttpRequest();

    var params = "id="+patinetId+"&type="+patinetType+"&extended_date="+extended_date;

    xhr.open("POST", URLROOT+"/doctor/extend-quarantine-date", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if (this.status == 200){
            console.log(this.responseText);
            
        }
    }

    xhr.send(params);
}


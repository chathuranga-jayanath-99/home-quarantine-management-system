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

                output = res.join(',');
                search_output.innerHTML = output;
            }
        }
        xhr.send();
    }
};

function reset(){
    var search_input = document.getElementById('search_input');
    var search_output = document.getElementById('search_result');
    search_input.value = '';
    search_output.innerHTML = '';
};



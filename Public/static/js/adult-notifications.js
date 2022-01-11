const URLROOT = "http://localhost/home-isolation-system";

function markAsRead(msgID) {
    var xhr = new XMLHttpRequest();
    var params = "msg_id=" + msgID;

    xhr.open("POST", URLROOT + "/adult-patient/notification-read", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function (){
        if (this.status == 200){
            console.log(this.responseText);
        }
    }

    xhr.send(params);
    return true;
}

function markAllAsRead() {
    var xhr = new XMLHttpRequest();
    var params = "";

    xhr.open("GET", URLROOT + "/adult-patient/notification-read-all", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function (){
        if (this.status == 200){
            console.log(this.responseText);
        }
    }

    xhr.send(params);
    return true;
}

var validator = {

    validateName : function (name){
        var reg = /^[a-z ]+$/i;
        return reg.test(name);
    },
    validateEmail : function(email){
        var reg = /^([a-zA-Z0-9\._]+)@([a-zA-Z0-9]+)\.([a-zA-Z]+)(\.[a-zA-Z]+)*$/
        return reg.test(email);
    }

};

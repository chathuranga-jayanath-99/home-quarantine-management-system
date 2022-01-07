var validator = {

    validateName : function (name){
        var reg = /^[a-z ]+$/i;
        var res = reg.test(name);
        return res;
    },

};

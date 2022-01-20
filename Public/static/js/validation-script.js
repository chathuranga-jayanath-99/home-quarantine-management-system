var validator = {

    validateName : function (name){
        var reg = /^[a-z ]+$/i;
        return reg.test(name);
    },

    validateEmail : function(email){
        var reg = /^([a-zA-Z0-9\._]+)@([a-zA-Z0-9]+)\.([a-zA-Z]+)(\.[a-zA-Z]+)*$/
        return reg.test(email);
    },

    validateNIC : function(NIC) {
        var reg_1 = /^\d{2}(00[0-9]|0[0-9]{2}|1[0-9]{2}|2[0-9]{2}|3[0-5][0-9]|36[0-6]|50[0-9]|5[0-9]{2}|6[0-9]{2}|7[0-9]{2}|8[0-5][0-9]|86[0-6])\d{4}V$/;
        var reg_2 = /^(19[0-9]{2}|2[0-9]{3})(00[0-9]|0[0-9]{2}|1[0-9]{2}|2[0-9]{2}|3[0-5][0-9]|36[0-6]|50[0-9]|5[0-9]{2}|6[0-9]{2}|7[0-9]{2}|8[0-5][0-9]|86[0-6])\d{5}$/
        return reg_1.test(NIC) || reg_2.test(NIC);
    },

    validatePassword : function(password, limit){
        return password.length > limit;
    }

};

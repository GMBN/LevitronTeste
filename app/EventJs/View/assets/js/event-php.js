var php = {
    url: '/event-manager',
    type: 'POST',
    context:{},
    dataType: 'json',
    async:true,
    result: {},
    addContext: function(c){
        this.context[c]=c;
    },
    trigger: function (name, param, callback) {
        if(typeof param == 'function'){
            callback = param;
            param = [];
        }
        $.ajax({
            url: this.url,
            type: this.type,
            async: this.async,
            dataType: this.dataType,
            data: {context:this.context,event: name, param: param},
            success: function (data) {
                if (typeof callback !== 'undefined') {
                    callback(data);
                }
            }
        });

    }
};
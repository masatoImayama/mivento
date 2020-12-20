angular.module('notification', [])

.service('notification', [function(){
    this.showNotification = function(status, message) {
        var color = 1;
        var style_cls = "info";
        switch (status) {
            case "info" :
                color = 1;
                style_cls = "alert-info";
                break;
            case "success" :
                color = 2;
                style_cls = "alert-success";
                break;
            case "warning" :
                color = 3;
                style_cls = "alert-warning";
                break;
            case "danger" :
                color = 4;
                style_cls = "alert-danger";
                break;
        }
    
        $.notify({
            icon: "ti-info-alt",
            message: message
        },{
            type: status,
            timer: 10000,
            placement: {
                from: 'top',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            allow_dismiss: true,
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-' + status + '" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '</div>' 
        });
    }
}]);
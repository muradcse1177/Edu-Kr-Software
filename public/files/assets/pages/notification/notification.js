'use strict';
function notify(type, notifyMsg) {
    var animIn = "animated fadeInUp";
    var animOut = "animated fadeOutUp";
    $.growl({
        title: ' ',
        message: notifyMsg,
        url: ''
    }, {
        element: 'body',
        allow_dismiss: true,
        offset: {
            x: 30,
            y: 30
        },
        spacing: 10,
        z_index: 999999,
        delay: 3000,
        timer: 5000,
        url_target: '_blank',
        mouse_over: true,
        animate: {
            enter: animIn,
            exit: animOut
        },
        icon_type: 'class',
        template: '<div data-growl="container" class="alert" role="alert">' + '<button type="button" class="close" data-growl="dismiss">' + '<span aria-hidden="true">&times;</span>' + '<span class="sr-only">Close</span>' + '</button>' + '<span data-growl="icon"></span>' + '<span data-growl="title"></span>' + '<span data-growl="message"></span>' + '<a href="#" data-growl="url"></a>' + '</div>'
    });
}
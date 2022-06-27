var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
var eventer = window[eventMethod];
var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

// Listen to message from child window
eventer(messageEvent,function(e) {
    if (typeof e.data.height != 'undefined') {
        jQuery('#ecwid-frame').css('height', e.data.height + 'px');
    }
});
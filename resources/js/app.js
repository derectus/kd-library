
require('./bootstrap');
require('./datepicker');
window.$ = window.jQuery = require('jquery');

$(document).ready(function () {

    // Remove title in the menu
    if ($(window).width() < 500) {
        $('a.navbar-brand').remove();
    }

});

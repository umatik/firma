require('bootstrap-sass');
require('./admin-lte.js');
require('admin-lte/plugins/input-mask/jquery.inputmask.js');

window.$ = require('jquery');

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(':input').inputmask();
});
require('bootstrap-sass');
require('./admin-lte.js');
require('admin-lte/plugins/input-mask/jquery.inputmask.js');

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(':input').inputmask();
});
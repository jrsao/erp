$(document).ready(function(){
    trRef();
     $( ".datepicker" ).datepicker();
});

var trRef = function() { 
        $('table tr').click(function(){
        window.location = $(this).data('href');
        return false;
    });
};
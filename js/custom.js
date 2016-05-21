
$(function () {
    //Date range picker
    $('#reservation').daterangepicker();
    
    //Flat red color scheme for iCheck
    

    // Initialize tablesorter
    // ***********************
});


$(document).ready(function(){
    
    // Modal Trigger
//    $('.visitor-detail').click(function() {
//        // Same initializing per every showing
//        $('#modal').plainModal('open', {duration: 500});
//    });
    $('.paypal-modal').click(function() {
        // Same initializing per every showing
        $('#paypal').plainModal('open', {duration: 500});
    });
    $('.stripe-modal').click(function() {
        // Same initializing per every showing
        $('#stripe').plainModal('open', {duration: 500});
    });
});

// Loader Trigger
//jQuery(window).load(function(e){
//    jQuery('.loader').hide();
//});


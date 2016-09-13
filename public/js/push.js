$(document).ready(function(){
    
    // initialize
    toogleDeleteButton();
    
    // when checkbox changed status
    $('.mess-check').on("change", function() {
        toogleDeleteButton();
    });
    
    // when checkall checkbox was checked / or unchecked
    $('#checkall').change(function() {
        if ($(this).is(':checked')) {
            $('td input[type="checkbox"]').prop('checked', true);
        } else {
            $('td input[type="checkbox"]').prop('checked', false);
        }
        
        toogleDeleteButton();
    });
    
    function toogleDeleteButton() {
        var elem_checked_num = $('.mess-check:checked').length;
        
        if(elem_checked_num) {
            $('#delete-btn2').removeAttr('disabled');
            $('#delete-btn2').removeClass('btn-disabled');
        }else {
            $('#delete-btn2').attr('disabled', 'disabled');
            $('#delete-btn2').addClass('btn-disabled');
        }
    }
});
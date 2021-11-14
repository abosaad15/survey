
// Q1 - Handlers 1
$('.q1-sub-1-branch').click(e => {
    $('.q1-sub-1').css('display', 'block')
    $('.q1-sub-1-select').attr('data-parsley-excluded', 'false')
    $('.q1-sub-1-select').prop('disabled', false)
    // $('.q1').after(q1_sub_1)
});
// 
$('.q1-yes').click(e => {
    $('.q1-sub-1').css('display', 'none')
    $('.q1-sub-1-select').attr('data-parsley-excluded', 'true')
    $('.q2, .q3, .q4').css('display', 'block')
    // $('.q2, .q3, .q4').attr('data-parsley-excluded', 'false')
    // $('.q1-sub-1').remove();
});

$('.q1-sub-1-select').on('change', e => {
    console.log($(e.target).val())
    if ($(e.target).val() === 'No Usage') {
        $('.q1-end-comment').css('display', 'block')
        $('.q1-end-comment input').attr('data-parsley-excluded', 'false')
        $('.q2, .q3,  .q3-sub-1, .q3-sub-2, .q3-sub-2-sub-1, .q3-sub-3, .q3-sub-3-sub-1, .q4, .q4-sub-1').css('display', 'none')
        $('.q2 input, .q3-select,  .q3-sub-1 input, .q3-sub-2 input, .q3-sub-2-sub-1 input, .q3-sub-3-select, .q3-sub-3-sub-1-select, .q4 input, .q4-sub-1 input').attr('data-parsley-excluded', 'true')
    } else {
        $('.q1-end-comment').css('display', 'none')
        $('.q1-end-comment input').attr('data-parsley-excluded', 'true')
        $('.q2, .q3, .q4').css('display', 'block')
        // $('.q2, .q3, .q4').attr('data-parsley-excluded', 'false')
        // $('.q2 input, .q3-select,  .q3-sub-1 input, .q3-sub-2 input, .q3-sub-2-sub-1 input, .q3-sub-3-select, .q3-sub-3-sub-1-select, .q4 input, .q4-sub-1 input').attr('data-parsley-excluded', 'true')
        $('.q3-sub-1 input, .q3-sub-2 input, .q3-sub-2-sub-1 input, .q3-sub-3-select, .q3-sub-3-sub-1-select, .q4-sub-1 input').attr('data-parsley-excluded', 'true')
    }
});


// Q3 - Handlers 
$('.q3-select').change(e => {
    if ($(e.target).val() === "Im not aware that I can take it") {
        $('.q3-sub-1').css('display', 'block')
        $('.q3-sub-1 input').attr('data-parsley-excluded', 'false')
        $('.q3-sub-2, .q3-sub-3, .q3-comment, .q3-sub-3-sub-1').css('display', 'none')
        $('.q3-sub-2 input, .q3-sub-3-select, .q3-comment input, .q3-sub-3-sub-1-select').attr('data-parsley-excluded', 'true')
    } else if ($(e.target).val() === "No cabinet Available in the New Area"){
        $('.q3-sub-2').css('display', 'block')
        $('.q3-sub-2 input').attr('data-parsley-excluded', 'false')
        $('.q3-sub-1, .q3-sub-3, .q3-comment, .q3-sub-3-sub-1').css('display', 'none')
        $('.q3-sub-1 input, .q3-sub-3-select, .q3-comment input, .q3-sub-3-sub-1-select').attr('data-parsley-excluded', 'true')
    } else if ($(e.target).val() === "ive got a replacement"){
        $('.q3-sub-3').css('display', 'block')
        $('.q3-sub-3-select').attr('data-parsley-excluded', 'false')
        $('.q3-sub-1, .q3-sub-2, .q3-comment, .q3-sub-3-sub-1').css('display', 'none')
        $('.q3-sub-1 input, .q3-sub-2 input, .q3-comment input, .q3-sub-3-sub-1-select').attr('data-parsley-excluded', 'true')
    } else if ($(e.target).val() === "Other"){
        $('.q3-comment').css('display', 'block')
        $('.q3-comment input').attr('data-parsley-excluded', 'false')
        $('.q3-sub-1, .q3-sub-2, .q3-sub-3, .q3-sub-3-sub-1').css('display', 'none')
        $('.q3-sub-1 input, .q3-sub-2 input, .q3-sub-3-select, .q3-sub-3-sub-1-select').attr('data-parsley-excluded', 'true')
    } else {
        $('.q3-sub-1, .q3-sub-2, .q3-sub-3, .q3-comment, .q3-sub-3-sub-1').css('display', 'none')
        $('.q3-sub-1 input, .q3-sub-2 input, .q3-sub-3-select, .q3-comment input, .q3-sub-3-sub-1-select').attr('data-parsley-excluded', 'true')
    }
});


$('.q3-sub-2-yes').click(e => {
    $('.q3-sub-2-sub-1').css('display', 'none')
    $('.q3-sub-2-sub-1 input').attr('data-parsley-excluded', 'true')
});

$('.q3-sub-2-no-coverage').click(e => {
    $('.q3-sub-2-sub-1').css('display', 'none')
    $('.q3-sub-2-sub-1 input').attr('data-parsley-excluded', 'true')
});

$('.q3-sub-2-sub-1-branch').click(e => {
    $('.q3-sub-2-sub-1').css('display', 'block')
    $('.q3-sub-2-sub-1 input').attr('data-parsley-excluded', 'false')
}); 

$('.q3-sub-3-select').change(e => {
    if ($(e.target).val() === "stc") {
        $('.q3-sub-3-sub-1').css('display', 'block')
        $('.q3-sub-3-sub-1-select').attr('data-parsley-excluded', 'false')
    } else {
        $('.q3-sub-3-sub-1').css('display', 'none')
        $('.q3-sub-3-sub-1-select').attr('data-parsley-excluded', 'true')
    }
});


// Q4 - Handlers 
$('.q4-sub-1-branch').click(e => {
    $('.q4-sub-1').css('display', 'block')
    $('.q4-sub-1 input').attr('data-parsley-excluded', 'false')
}); 

$('.q4-no').click(e => {
    $('.q4-sub-1').css('display', 'none')
    $('.q4-sub-1 input').attr('data-parsley-excluded', 'true')
}); 

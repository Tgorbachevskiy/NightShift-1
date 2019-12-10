
$('#showMail').click(function () {
    $('#mail').toggle();
});

// $(".preloader-background").click(function () {
//     $('.preloader-background').fadeOut(3000);
//     $('.preloader-wrapper').fadeOut(1000);
// });

$(window).on("load", function(){
    $('.preloader-background').delay(1700).fadeOut('slow');
    $('.preloader-wrapper')
        .delay(1700)
        .fadeOut();
});

// function disappear(){
//     debugger;
//     $('.preloader-background').fadeOut(3000);
//     $('.preloader-wrapper').fadeOut(1000);
// }
//
// $(window).load( disappear );
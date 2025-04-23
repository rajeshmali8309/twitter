$(document).ready(function () {
    $('.create-account').click(function (e) {
        e.preventDefault();
        $('.signup-form').fadeIn();
        $('body').css('overflow', 'hidden'); // background scroll disable
        $('<div class="popup-bg-blocker"></div>').appendTo('body'); // overlay create
    });

    $('.close-form').click(function () {
        $('.signup-form').fadeOut();
        $('body').css('overflow', 'auto'); // scroll allow again
        $('.popup-bg-blocker').remove(); // remove overlay
    });

    // Signin popup
    $('.sign-in-account').click(function (e) {
        e.preventDefault();
        $('.signin-form').fadeIn();
        $('body').css('overflow', 'hidden');
    });

    $('.close-signin').click(function () {
        $('.signin-form').fadeOut();
        $('body').css('overflow', 'auto');
    });

    // Prevent clicks on background when popup is open
    $(document).on('click', '.popup-bg-blocker', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    $('.signup-form, .signin-form').on('click', function (e) {
        e.stopPropagation();
    });
});
$(function () {
    let
        faqTitle = $('.faq-title'),
        chevron = $('.faq-title .fas');

    faqTitle.on('click', function () {
        $(this).toggleClass('active');
        $(this).children('.fas').toggleClass('chevron-open');
        if ($(this).children('.fas').hasClass('chevron-open')) {
            $(this).next().slideDown(600);
        }else{
            $(this).next().slideUp(600);
        }
    })

})
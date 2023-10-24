$(function () {
    let plusBox1 = $('#plusBox1');
    let noteBox1 = $('#noteBox1');
    let closeBox1 = $('#closeBox1');
    let plusBox2 = $('#plusBox2');
    let noteBox2 = $('#noteBox2');
    let closeBox2 = $('#closeBox2');
    let plusBox3 = $('#plusBox3');
    let noteBox3 = $('#noteBox3');
    let closeBox3 = $('#closeBox3');
    let pagin = $('.pagin');
    let pagin1 = $('#pagin1');
    let pagin2 = $('#pagin2');
    let pagin3 = $('#pagin3');
    let slide1 = $('#slide1');
    let slide2 = $('#slide2');
    let slide3 = $('#slide3');

    plusBox1.on('click', function () {
        noteBox1.css("transform", "translate(0, 0)");
        $(this).css("opacity", 0)
    });

    closeBox1.on('click', function () {
        noteBox1.css("transform", "translate(-100%, 100%)");
        plusBox1.css("opacity", 1)
    });

    plusBox2.on('click', function () {
        noteBox2.css("transform", "translate(0, 0)");
        $(this).css("opacity", 0)
    });

    closeBox2.on('click', function () {
        noteBox2.css("transform", "translate(-100%, 100%)");
        plusBox2.css("opacity", 1)
    });

    plusBox3.on('click', function () {
        noteBox3.css("transform", "translate(0, 0)");
        $(this).css("opacity", 0)
    });

    closeBox3.on('click', function () {
        noteBox3.css("transform", "translate(-100%, 100%)");
        plusBox3.css("opacity", 1)
    });

    pagin1.on('click', function () {
        $(this).addClass('pagin-active');
        pagin2.removeClass('pagin-active');
        pagin3.removeClass('pagin-active');
        slide1.fadeIn(600);
        slide2.fadeOut(600);
        slide3.fadeOut(600);
    });
    pagin2.on('click', function () {
        $(this).addClass('pagin-active');
        pagin1.removeClass('pagin-active');
        pagin3.removeClass('pagin-active');
        slide2.fadeIn(600);
        slide1.fadeOut(600);
        slide3.fadeOut(600);
    });
    pagin3.on('click', function () {
        $(this).addClass('pagin-active');
        pagin1.removeClass('pagin-active');
        pagin2.removeClass('pagin-active');
        slide3.fadeIn(600);
        slide1.fadeOut(600);
        slide2.fadeOut(600);
    });

});
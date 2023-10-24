$(function() {
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

    $("#slide2").fadeOut(100);
    $("#slide3").fadeOut(100);

    setTimeout(() => {
        $("#slide1").fadeOut(300);
        $("#slide3").fadeOut(300);
        $("#slide2").fadeIn(1000);
    }, 5000);

    setTimeout(() => {
        $("#slide1").fadeOut(300);
        $("#slide2").fadeOut(300);
        $("#slide3").fadeIn(1000);
    }, 10000);

    setTimeout(() => {
        $("#slide2").fadeOut(300);
        $("#slide3").fadeOut(300);
        $("#slide1").fadeIn(1000);
    }, 15000);

    setTimeout(() => {
        pagin1.fadeIn(600);
        pagin2.fadeIn(600);
        pagin3.fadeIn(600);
    }, 15000)

    function stopSlider() {
        pagin1.on('click', function () {
            $(this).addClass('pagin-active');
            pagin2.removeClass('pagin-active');
            pagin3.removeClass('pagin-active');
            slide1.fadeIn(600);
            slide2.fadeOut(600);
            slide3.fadeOut(600);
            clearInterval(intervalId);
        });
        pagin2.on('click', function () {
            $(this).addClass('pagin-active');
            pagin1.removeClass('pagin-active');
            pagin3.removeClass('pagin-active');
            slide2.fadeIn(600);
            slide1.fadeOut(600);
            slide3.fadeOut(600);
            clearInterval(intervalId);
        });
        pagin3.on('click', function () {
            $(this).addClass('pagin-active');
            pagin1.removeClass('pagin-active');
            pagin2.removeClass('pagin-active');
            slide3.fadeIn(600);
            slide1.fadeOut(600);
            slide2.fadeOut(600);
            clearInterval(intervalId);
        });
    }

    const intervalId = setInterval(function(){

        stopSlider();

        setTimeout(() => {
            $("#slide1").fadeOut(300);
            $("#slide3").fadeOut(300);
            $("#slide2").fadeIn(1000);
            pagin2.addClass('pagin-active');
            pagin1.removeClass('pagin-active');
            pagin3.removeClass('pagin-active');
        }, 5000);

        setTimeout(() => {
            $("#slide1").fadeOut(300);
            $("#slide2").fadeOut(300);
            $("#slide3").fadeIn(1000);
            pagin3.addClass('pagin-active');
            pagin1.removeClass('pagin-active');
            pagin2.removeClass('pagin-active');
        }, 10000);

        setTimeout(() => {
            $("#slide2").fadeOut(300);
            $("#slide3").fadeOut(300);
            $("#slide1").fadeIn(1000);
            pagin1.addClass('pagin-active');
            pagin2.removeClass('pagin-active');
            pagin3.removeClass('pagin-active');
        }, 15000);

    }, 15000);


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

});

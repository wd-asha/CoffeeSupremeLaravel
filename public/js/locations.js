$(function () {
    let
        location = $('.locations-list .location'),
        location1 = $('#locations1'),
        location2 = $('#locations2'),
        location3 = $('#locations3'),
        location4 = $('#locations4'),
        location5 = $('#locations5'),
        location6 = $('#locations6'),
        locationsText1 = $('#locationsText1'),
        locationsText2 = $('#locationsText2'),
        locationsText3 = $('#locationsText3'),
        locationsText4 = $('#locationsText4'),
        locationsText5 = $('#locationsText5'),
        locationsText6 = $('#locationsText6'),
        locationsImg1 = $('#locationsImg1'),
        locationsImg2 = $('#locationsImg2'),
        locationsImg3 = $('#locationsImg3'),
        locationsImg4 = $('#locationsImg4'),
        locationsImg5 = $('#locationsImg5'),
        locationsImg6 = $('#locationsImg6');

    location.on('click', function () {
        location.each(function () {
           location.removeClass('active');
        });

        $(this).addClass('active');
        if(this.id === "location1") {
            locationsText2.fadeOut(10);
            locationsText3.fadeOut(10);
            locationsText4.fadeOut(10);
            locationsText5.fadeOut(10);
            locationsText6.fadeOut(10);
            locationsText1.fadeIn(600);
            locationsImg2.fadeOut(10);
            locationsImg3.fadeOut(10);
            locationsImg4.fadeOut(10);
            locationsImg5.fadeOut(10);
            locationsImg6.fadeOut(10);
            locationsImg1.fadeIn(600);
        }

        if(this.id === "location2") {
            locationsText1.fadeOut(10);
            locationsText3.fadeOut(10);
            locationsText4.fadeOut(10);
            locationsText5.fadeOut(10);
            locationsText6.fadeOut(10);
            locationsText2.fadeIn(600);
            locationsImg1.fadeOut(10);
            locationsImg3.fadeOut(10);
            locationsImg4.fadeOut(10);
            locationsImg5.fadeOut(10);
            locationsImg6.fadeOut(10);
            locationsImg2.fadeIn(600);
        }

        if(this.id === "location3") {
            locationsText1.fadeOut(10);
            locationsText2.fadeOut(10);
            locationsText4.fadeOut(10);
            locationsText5.fadeOut(10);
            locationsText6.fadeOut(10);
            locationsText3.fadeIn(600);
            locationsImg1.fadeOut(10);
            locationsImg2.fadeOut(10);
            locationsImg4.fadeOut(10);
            locationsImg5.fadeOut(10);
            locationsImg6.fadeOut(10);
            locationsImg3.fadeIn(600);
        }

        if(this.id === "location4") {
            locationsText1.fadeOut(10);
            locationsText2.fadeOut(10);
            locationsText3.fadeOut(10);
            locationsText5.fadeOut(10);
            locationsText6.fadeOut(10);
            locationsText4.fadeIn(600);
            locationsImg1.fadeOut(10);
            locationsImg2.fadeOut(10);
            locationsImg3.fadeOut(10);
            locationsImg5.fadeOut(10);
            locationsImg6.fadeOut(10);
            locationsImg4.fadeIn(600);
        }

        if(this.id === "location5") {
            locationsText1.fadeOut(10);
            locationsText2.fadeOut(10);
            locationsText3.fadeOut(10);
            locationsText4.fadeOut(10);
            locationsText6.fadeOut(10);
            locationsText5.fadeIn(600);
            locationsImg1.fadeOut(10);
            locationsImg2.fadeOut(10);
            locationsImg3.fadeOut(10);
            locationsImg4.fadeOut(10);
            locationsImg6.fadeOut(10);
            locationsImg5.fadeIn(600);
        }

        if(this.id === "location6") {
            locationsText1.fadeOut(10);
            locationsText2.fadeOut(10);
            locationsText3.fadeOut(10);
            locationsText4.fadeOut(10);
            locationsText5.fadeOut(10);
            locationsText6.fadeIn(600);
            locationsImg1.fadeOut(10);
            locationsImg2.fadeOut(10);
            locationsImg3.fadeOut(10);
            locationsImg4.fadeOut(10);
            locationsImg5.fadeOut(10);
            locationsImg6.fadeIn(600);
        }
    })
});

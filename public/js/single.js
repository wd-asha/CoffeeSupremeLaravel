$(function () {
    let
        grindItem = $('.grind-item'),
        weightItem = $('.weight-item'),
        quantityItem = $('.quantity-has-select'),
        quantity = $('#quantity'),
        heart = $('.heart i'),
        weightH = $('#weightH'),
        priceNew = $('#priceNew'),
        priceR = $('#priceR'),
        grindH = $('#grindH'),
        qtyH = $('#qtyH');

    heart.on('click', function () {
        heart.toggleClass('active')
    });

    grindItem.on('click', function () {
        /*делаем выбранный помол активным*/
        grindItem.removeClass('select-grind');
        $(this).addClass('select-grind');
        /*устанавливаем новый помол (для контроллера)*/
        grindH.val(this.innerHTML);
    });

    weightItem.on('click', function () {
        /*устанавливаем первоначальную цену*/
        priceNew.text(parseInt(priceR.val()));
        /*делаем выбранный вес активным*/
        weightItem.removeClass('select-weight');
        $(this).addClass('select-weight');
        /*устанавливаем новую цену (для контроллера)*/
        weightH.val(parseInt(this.innerHTML));
        /*меняем цену (для пользователя)*/
        if(this.innerHTML === "150g") {
            priceNew.text(parseInt(priceNew.text()) * 0.61);
        }
        if(this.innerHTML === "500g") {
            priceNew.text(parseInt(priceNew.text()) * 2);
        }
        if(this.innerHTML === "1000g") {
            priceNew.text(parseInt(priceNew.text()) * 4);
        }
    });

    quantityItem.on('click', function () {
        $(this).addClass('quantity-select')
            .delay(500)
            .queue(function () {
                $(this).removeClass('quantity-select').dequeue()
            });

        if ($(this).text() === "+") {
            quantityInt = parseInt(quantity.text());
            quantity.text(String(quantityInt + 1));
            qtyH.val(parseInt(qtyH.val()) + 1);
        }

        if ( ($(this).text() === "-") && (parseInt(quantity.text()) > 1) ) {
            quantityInt = parseInt(quantity.text());
            quantity.text(String(quantityInt - 1));
            qtyH.val(parseInt(qtyH.val()) - 1);
        }
    })

});
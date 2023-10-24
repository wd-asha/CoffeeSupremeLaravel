let
    addToCart = document.querySelectorAll('.add-to-cart'),
    btnBack = document.querySelector('#btnBack');

    /*console.log( window.getComputedStyle(btnBack).width);*/

    function ActiveBtnBack(e) {
        let btn = this;
        /*e.preventDefault();*/
        btnBack.style.width = "100%";
        btn.style.color = "white";
        setTimeout(function(){
                btnBack.style.opacity = "0";
                btn.style.color = "rgba(210, 34, 38, 1)"; },
            700);
        setTimeout(function(){
                btnBack.style.width = "0"; },
            1000);
        setTimeout(function(){
                btnBack.style.opacity = "1"; },
            1400);
    }

    addToCart.forEach(function (e) {
        e.addEventListener("click", ActiveBtnBack);
    });
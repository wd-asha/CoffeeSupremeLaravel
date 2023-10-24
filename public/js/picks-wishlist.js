let
    addToCarts = document.querySelectorAll('.add-to-cart'),
    personalSubmit = document.querySelector('.personal_submit'),
    changeSubmit = document.querySelector('.change_submit'),
    shippingSubmit = document.querySelector('.shipping_submit');

    function ActiveBtnBack() {
        let btn = this;
        /*e.preventDefault();*/
        btn.nextElementSibling.style.width = "100%";
        btn.style.color = "white";
        setTimeout(function(){
                btn.nextElementSibling.style.opacity = "0";
                btn.style.color = "rgba(210, 34, 38, 1)"; },
            700);
        setTimeout(function(){
                btn.nextElementSibling.style.width = "0"; },
            1000);
        setTimeout(function(){
                btn.nextElementSibling.style.opacity = "1"; },
            1400);
    }

function ApplyBtnBack(e) {
    let btn = this;
    e.preventDefault();
    btn.children[0].style.width = "100%";
    btn.style.color = "white";
    setTimeout(function(){
            btn.children[0].style.opacity = "0";
            btn.style.color = "rgba(210, 34, 38, 1)"; },
        700);
    setTimeout(function(){
            btn.children[0].style.width = "0"; },
        1000);
    setTimeout(function(){
            btn.children[0].style.opacity = "1"; },
        1400);
}

    addToCarts.forEach(function (e) {
        e.addEventListener("click", ActiveBtnBack);
    });

    personalSubmit.addEventListener("click", ActiveBtnBack);
    changeSubmit.addEventListener("click", ActiveBtnBack);
    shippingSubmit.addEventListener("click", ActiveBtnBack);

$(function () {
    let
        menuPanel = $('#menuPanel'),
        coffeePanel = $('#coffeePanel'),
        equipmentPanel = $('#equipmentPanel'),
        menuPanelCoffee = $('#menuPanelCoffee'),
        menuPanelEquipment = $('#menuPanelEquipment'),
        menuPanelSubscript = $('#menuPanelSubscript'),
        menuPanelMerchandise = $('#menuPanelMerchandise'),
        menuPanelPantry = $('#menuPanelPantry'),
        backMenu = $('.menu-panel i.back'),
        shop = $('#shop'),
        subscriptions = $('#subscriptions'),
        overlaySearch = $('#overlaySearch'),
        searchMenu = $('#searchMenu'),
        searchClose = $('#searchClose');

    searchMenu.on('click', function (e) {
        e.preventDefault();
        overlaySearch.fadeIn(600);
    });

    searchClose.on('click', function () {
        overlaySearch.fadeOut(600);
    });

    subscriptions.on('click', function (e) {
        e.preventDefault();
    });

    coffeePanelHeight = coffeePanel.height();
    menuPanel.height(coffeePanelHeight);

    backMenu.on('click', function () {
        coffeePanel.removeClass('coffee-panel-show');
        equipmentPanel.removeClass('equipment-panel-show');
        menuPanel.removeClass('menu-panel-show')
    });

    shop.on('click', function (e) {
        e.preventDefault();
        menuPanel.toggleClass('menu-panel-show');
        coffeePanel.removeClass('coffee-panel-show');
        menuPanel.css('pointer-events', 'auto')
    });

    menuPanelCoffee.hover(function () {
        coffeePanel.addClass('coffee-panel-show');
        equipmentPanel.removeClass('equipment-panel-show')
    });

    menuPanelEquipment.hover(function () {
        coffeePanel.removeClass('coffee-panel-show');
        equipmentPanel.addClass('equipment-panel-show')
    });

    menuPanelSubscript.hover(function () {
        coffeePanel.removeClass('coffee-panel-show');
        equipmentPanel.removeClass('equipment-panel-show')
    });

    menuPanelMerchandise.hover(function () {
        coffeePanel.removeClass('coffee-panel-show');
        equipmentPanel.removeClass('equipment-panel-show')
    });

    menuPanelPantry.hover(function () {
        coffeePanel.removeClass('coffee-panel-show');
        equipmentPanel.removeClass('equipment-panel-show')
    });

    coffeePanel.mouseleave(function () {
        coffeePanel.removeClass('coffee-panel-show')
    });

    equipmentPanel.mouseleave(function () {
        equipmentPanel.removeClass('equipment-panel-show')
    });

    let cartBox = $('#cartBox');
    let basket = $('#basket');
    let cartClose = $('#cartClose');
    let overlay = $('#overlay');

    basket.on('click', function (e) {
        e.preventDefault();
        overlay.fadeIn(600);
        cartBox.css("transform", "translateX(0)");
    });

    cartClose.on('click', function (e) {
        e.preventDefault();
        cartBox.css("transform", "translateX(100%)");
        overlay.fadeOut(600);
    });

});
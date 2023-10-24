<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['App\Http\Controllers\FrontController', 'index'])->name('front');

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('admin/index', ['App\Http\Controllers\Admin\AdminDashboardController', 'index'])->name('admin.index');
    Route::get('user/destroy/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'destroyUser'])->name('destroy.user');
    Route::get('user/restore/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'restoreUser'])->name('restore.user');
});
Route::group(['middleware' => ['auth', 'author']], function(){
    Route::get('author/index', ['App\Http\Controllers\Author\AuthorDashboardController', 'index'])->name('author.index');
});

Route::get('shop/coffees', ['App\Http\Controllers\ShopCoffeeController', 'index'])->name('shop.coffees');
Route::get('shop/pantries', ['App\Http\Controllers\ShopEquipmentController', 'pantry'])->name('shop.pantries');
Route::get('shop/merchandise', ['App\Http\Controllers\ShopEquipmentController', 'merchandise'])->name('shop.merchandise');
Route::get('shop/coffee/{id}', ['App\Http\Controllers\ShopCoffeeController', 'coffeeSingle'])->name('shop.coffee-single');
Route::get('shop/equipments', ['App\Http\Controllers\ShopEquipmentController', 'index'])->name('shop.equipments');
Route::get('shop/equipment/{id}', ['App\Http\Controllers\ShopEquipmentController', 'equipmentSingle'])->name('shop.equipment-single');
Route::get('shop/subscribe', ['App\Http\Controllers\Admin\SubscriberController', 'subscribe'])->name('shop.subscribe');
Route::get('shop/unsubscribe/{subscriber}', ['App\Http\Controllers\Admin\SubscriberController', 'unsubscribe'])->name('shop.unsubscribe');

Route::get('password/reset/form', ['App\Http\Controllers\Auth\PasswordResetController', 'showForm'])->name('password.reset.form');
Route::post('reset/password', ['App\Http\Controllers\Auth\PasswordResetController', 'store'])->name('reset.password');

Route::get('forgot-password', ['App\Http\Controllers\Auth\ForgotPasswordController', 'create'])->name('password.reque');
Route::post('forgot-password', ['App\Http\Controllers\Auth\ForgotPasswordController', 'store'])->name('password.email');
Route::get('/password/reset/{token}', ['App\Http\Controllers\Auth\ResetPasswordController', 'create'])->name('password.reset');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('user/personal/update', [App\Http\Controllers\UserController::class, 'personal'])->name('personal.update');
Route::post('user/shipping/update', [App\Http\Controllers\UserController::class, 'shipping'])->name('shipping.update');

//Admin Subscribers
Route::get('admin/subscribers', ['App\Http\Controllers\Admin\SubscriberController', 'index'])->name('admin.subscribers');
Route::get('admin/subscriber/delete/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'delete'])->name('delete.subscriber');
Route::get('admin/subscriber/destroy/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'destroy'])->name('destroy.subscriber');
Route::get('admin/subscriber/restore/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'restore'])->name('restore.subscriber');
Route::get('admin/subscriber/formMail/{userEmail}/{userName}', ['App\Http\Controllers\Admin\SubscriberController', 'formMail'])->name('formMail.subscriber');
Route::post('admin/subscriber/sendMail', ['App\Http\Controllers\Admin\SubscriberController', 'sendMail'])->name('sendMail.subscriber');
Route::post('admin/alerts/sendMail', ['App\Http\Controllers\Admin\AlertsController', 'sendMail'])->name('sendMail.alerts');

//Alerts


//Admin Category
Route::get('admin/categories', ['App\Http\Controllers\Admin\CategoryController', 'index'])->name('admin.categories');
Route::post('admin/category/store', ['App\Http\Controllers\Admin\CategoryController', 'store'])->name('admin.category.store');
Route::get('admin/category/delete/{id}', ['App\Http\Controllers\Admin\CategoryController', 'delete'])->name('admin.category.delete');

//Admin SubCategory
Route::get('admin/subcategories', ['App\Http\Controllers\Admin\SubCategoryController', 'index'])->name('admin.subcategories');
Route::post('admin/subcategory/store', ['App\Http\Controllers\Admin\SubCategoryController', 'store'])->name('admin.subcategory.store');
Route::get('admin/subcategory/delete/{id}', ['App\Http\Controllers\Admin\SubCategoryController', 'delete'])->name('admin.subcategory.delete');

//Admin Brands
Route::get('admin/brands', ['App\Http\Controllers\Admin\BrandController', 'index'])->name('admin.brands');
Route::post('admin/brand/store', ['App\Http\Controllers\Admin\BrandController', 'store'])->name('admin.brand.store');
Route::get('admin/brand/delete/{id}', ['App\Http\Controllers\Admin\BrandController', 'delete'])->name('admin.brand.delete');

//Admin Firms
Route::get('admin/firms', ['App\Http\Controllers\Admin\FirmaController', 'index'])->name('admin.firms');
Route::post('admin/firma/store', ['App\Http\Controllers\Admin\FirmaController', 'store'])->name('admin.firma.store');
Route::get('admin/firma/delete/{id}', ['App\Http\Controllers\Admin\FirmaController', 'delete'])->name('admin.firma.delete');

//Admin Grinds
Route::get('admin/grinds', ['App\Http\Controllers\Admin\GrindController', 'index'])->name('admin.grinds');
Route::post('admin/grind/store', ['App\Http\Controllers\Admin\GrindController', 'store'])->name('admin.grind.store');
Route::get('admin/grind/delete/{id}', ['App\Http\Controllers\Admin\GrindController', 'delete'])->name('admin.grind.delete');

//Admin Weights
Route::get('admin/weights', ['App\Http\Controllers\Admin\WeightController', 'index'])->name('admin.weights');
Route::post('admin/weight/store', ['App\Http\Controllers\Admin\WeightController', 'store'])->name('admin.weight.store');
Route::get('admin/weight/delete/{id}', ['App\Http\Controllers\Admin\WeightController', 'delete'])->name('admin.weight.delete');

//Admin Coffee
Route::get('admin/coffees', ['App\Http\Controllers\Admin\CoffeeController', 'index'])->name('admin.coffees');
Route::get('admin/coffeesA', ['App\Http\Controllers\Admin\CoffeeController', 'indexA'])->name('admin.coffeesA');
Route::get('admin/coffee/show/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'show'])->name('admin.coffee.show');
Route::get('admin/coffee/create', ['App\Http\Controllers\Admin\CoffeeController', 'create'])->name('admin.coffee.create');
Route::post('admin/coffee/store', ['App\Http\Controllers\Admin\CoffeeController', 'store'])->name('admin.coffee.store');
Route::get('admin/coffee/edit/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'edit'])->name('admin.coffee.edit');
Route::post('admin/coffee/update/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'update'])->name('admin.coffee.update');
Route::post('admin/coffee/updatePhoto/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'updatePhoto'])->name('admin.coffee.updatePhoto');
Route::get('admin/coffee/delete/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'delete'])->name('admin.coffee.delete');
Route::get('coffee/active/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'active'])->name('coffee.active');
Route::get('coffee/inactive/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'inactive'])->name('coffee.inactive');
Route::get('coffee/destroy/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'destroy'])->name('destroy.coffee');
Route::get('coffee/restore/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'restore'])->name('restore.coffee');
Route::post('coffee/coffee/amount/{id}', ['App\Http\Controllers\Admin\CoffeeController', 'amount'])->name('amount.coffee');

//Admin Equipment
Route::get('admin/equipments', ['App\Http\Controllers\Admin\EquipmentController', 'index'])->name('admin.equipments');
Route::get('admin/equipmentsS', ['App\Http\Controllers\Admin\EquipmentController', 'indexS'])->name('admin.equipmentsS');
Route::get('admin/equipmentsF', ['App\Http\Controllers\Admin\EquipmentController', 'indexF'])->name('admin.equipmentsF');
Route::get('admin/equipmentsA', ['App\Http\Controllers\Admin\EquipmentController', 'indexA'])->name('admin.equipmentsA');
Route::get('admin/equipment/show/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'show'])->name('admin.equipment.show');
Route::get('admin/equipment/create', ['App\Http\Controllers\Admin\EquipmentController', 'create'])->name('admin.equipment.create');
Route::post('admin/equipment/store', ['App\Http\Controllers\Admin\EquipmentController', 'store'])->name('admin.equipment.store');
Route::get('equipment/active/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'active'])->name('equipment.active');
Route::get('equipment/inactive/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'inactive'])->name('equipment.inactive');
Route::get('admin/equipment/edit/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'edit'])->name('admin.equipment.edit');
Route::post('admin/equipment/update/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'update'])->name('admin.equipment.update');
Route::post('admin/equipment/updatePhoto/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'updatePhoto'])->name('admin.equipment.updatePhoto');

Route::get('admin/equipment/delete/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'delete'])->name('admin.equipment.delete');
Route::get('equipment/restore/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'restore'])->name('restore.equipment');
Route::post('equipment/equipment/amount/{id}', ['App\Http\Controllers\Admin\EquipmentController', 'amount'])->name('amount.equipment');


//Admin Posts
Route::get('admin/post/create', ['App\Http\Controllers\Admin\PostController', 'create'])->name('admin.post.create');
Route::get('admin/posts', ['App\Http\Controllers\Admin\PostController', 'index'])->name('admin.posts');
Route::get('admin/post/edit/{id}', ['App\Http\Controllers\Admin\PostController', 'edit'])->name('admin.post.edit');
Route::get('admin/post/delete/{id}', ['App\Http\Controllers\Admin\PostController', 'delete'])->name('admin.post.delete');
Route::get('admin/post/restore/{id}', ['App\Http\Controllers\Admin\PostController', 'restore'])->name('admin.post.restore');
Route::post('admin/post/store', ['App\Http\Controllers\Admin\PostController', 'store'])->name('admin.post.store');
Route::post('admin/post/update/{id}', ['App\Http\Controllers\Admin\PostController', 'update'])->name('admin.post.update');
Route::post('admin/post/updatePhoto/{id}', ['App\Http\Controllers\Admin\PostController', 'updatePhoto'])->name('admin.post.updatePhoto');

//Admin Team
Route::get('admin/teams', ['App\Http\Controllers\Admin\TeamController', 'index'])->name('admin.teams');
Route::get('admin/team/create', ['App\Http\Controllers\Admin\TeamController', 'create'])->name('admin.team.create');
Route::post('admin/team/store', ['App\Http\Controllers\Admin\TeamController', 'store'])->name('admin.team.store');
Route::get('admin/team/delete/{id}', ['App\Http\Controllers\Admin\TeamController', 'delete'])->name('admin.team.delete');
Route::get('admin/team/restore/{id}', ['App\Http\Controllers\Admin\TeamController', 'restore'])->name('admin.team.restore');

//Cart
Route::post('coffee/addCart/{id}', ['App\Http\Controllers\CartController', 'addCart'])->name('coffee.addCart');
Route::post('equipment/addCart/{id}', ['App\Http\Controllers\CartController', 'addCartEquipment'])->name('equipment.addCart');
Route::get('cart/delete/{rowId}', ['App\Http\Controllers\CartController', 'delete'])->name('cart.delete');
Route::get('cart', ['App\Http\Controllers\CartController', 'index'])->name('cart');
Route::post('cart/update', ['App\Http\Controllers\CartController', 'update'])->name('cart.update');
Route::post('check', ['App\Http\Controllers\CartController', 'check'])->name('check');

//Wishlist
Route::get('wishlist', ['App\Http\Controllers\WishlistController', 'index'])->name('wishlist');
Route::post('wishlist/add', ['App\Http\Controllers\WishlistController', 'add'])->name('wishlist.add');
Route::get('wishlist/destroy/{id}', ['App\Http\Controllers\WishlistController', 'destroy'])->name('wishlist.destroy');
Route::get('favorite/{single_id}', ['App\Http\Controllers\WishlistController', 'favorite'])->name('favorite');
Route::get('favoriteEquipment/{single_id}', ['App\Http\Controllers\WishlistController', 'favoriteEquipment'])->name('favoriteEquipment');
Route::get('wishlist/delete/{id}', ['App\Http\Controllers\WishlistController', 'destroy'])->name('wishlist.destroy');

//Admin Orders
Route::get('admin/neworders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.neworders');
Route::get('admin/order/delete/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderDelete'])->name('admin.order.delete');
Route::get('admin/order/show/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.order.show');
Route::get('admin/order/pending/{id}', [App\Http\Controllers\Admin\OrderController::class, 'pending'])->name('admin.order.pending');
Route::get('admin/orders/process', [App\Http\Controllers\Admin\OrderController::class, 'ordersProcess'])->name('admin.orders.process');
Route::get('admin/order/process/{id}', [App\Http\Controllers\Admin\OrderController::class, 'process'])->name('admin.order.process');
Route::get('admin/orders/delivered', [App\Http\Controllers\Admin\OrderController::class, 'ordersDelivered'])->name('admin.orders.delivered');
Route::get('admin/order/delivered/{id}', [App\Http\Controllers\Admin\OrderController::class, 'delivered'])->name('admin.order.delivered');
Route::get('admin/order/canceled/{id}', [App\Http\Controllers\Admin\OrderController::class, 'canceled'])->name('admin.order.canceled');
Route::get('admin/orders/canceled', [App\Http\Controllers\Admin\OrderController::class, 'ordersCanceled'])->name('admin.orders.canceled');

//static pages
Route::get('wholesale', [App\Http\Controllers\FrontController::class, 'wholesale'])->name('front.wholesale');
Route::get('locations', [App\Http\Controllers\FrontController::class, 'locations'])->name('front.locations');
Route::get('carriers', [App\Http\Controllers\FrontController::class, 'carriers'])->name('front.carriers');
Route::get('ourpurpose', [App\Http\Controllers\FrontController::class, 'ourpurpose'])->name('front.ourpurpose');
Route::get('journal', [App\Http\Controllers\FrontController::class, 'journal'])->name('front.journal');
Route::get('post/post/{id}', [App\Http\Controllers\FrontController::class, 'showPost'])->name('front.post');
Route::get('filter/{id}', [App\Http\Controllers\FrontController::class, 'filtering'])->name('filter');
Route::get('filterTeam/{id}', [App\Http\Controllers\FrontController::class, 'filteringTeam'])->name('filterTeam');
Route::get('contacts', [App\Http\Controllers\FrontController::class, 'contacts'])->name('contacts');
Route::get('help', [App\Http\Controllers\FrontController::class, 'help'])->name('front.help');
Route::get('office', [App\Http\Controllers\FrontController::class, 'office'])->name('front.office');
Route::get('policy', [App\Http\Controllers\FrontController::class, 'policy'])->name('front.policy');
Route::get('history', [App\Http\Controllers\FrontController::class, 'history'])->name('front.history');
Route::get('delivery', [App\Http\Controllers\FrontController::class, 'delivery'])->name('front.delivery');
Route::get('teams', [App\Http\Controllers\FrontController::class, 'teams'])->name('front.teams');
Route::get('keeping', [App\Http\Controllers\FrontController::class, 'keeping'])->name('front.keeping');

Route::get('file-import-export', [App\Http\Controllers\Admin\FirmaController::class, 'fileImportExport']);
Route::post('file-import', [App\Http\Controllers\Admin\FirmaController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [App\Http\Controllers\Admin\FirmaController::class, 'fileExport'])->name('file-export');

<?php

use Illuminate\Support\Facades\Route;
use Spatie\ResponseCache\Middlewares\CacheResponse;

use App\Http\Controllers\Admin\MenuController;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::group(['middleware'=>'CacheResponse:60'], function ()
{*/
  Route::group(['middleware'=>'app'], function() {
    Route::get('/', 'MainController@index')->name('main.index');
    Route::get('/uslugi/', 'UslugiController@index')->name('uslugi.index');
    Route::get('/price/', 'PriceController@index')->name('price.index');
    Route::get('/gallery/', 'GalleryController@index')->name('gallery.index');
    Route::get('/contacts/', 'ContactsController@index')->name('contacts.index');
    Route::get('/uslugi/{service}/', 'UslugiController@service')->name('service.index');
    Route::get('/uslugi/{service}/{category}/', 'UslugiController@category')->name('category.index');
    Route::get('/blog/{blog}', 'BlogController@index')->name('blog.index');
    Route::get('/reviews/', 'ReviewController@index')->name('reviews.index');
    Route::get('/franchise/', 'MainController@franchise')->name('main.franchise');
    Route::get('/vacancies-office/', 'MainController@vacanciesLanding')->name('main.vacanciesLanding');
    Route::get('/vacancies-objects/', 'MainController@vacanciesLanding2')->name('main.vacanciesLanding2');
    Route::get('/vacancies/', 'VacancyController@index')->name('vacancy.index');
    Route::get('/vacancies/filter/', 'VacancyController@filter')->name('vacancy.filter');
    Route::get('/vacancy/{vacancy}', 'VacancyController@show')->name('vacancy.show');
    Route::get('/vacancies/category/{vacancyCategory}', 'VacancyController@showCategory')->name('vacancy.category');
    Route::get('/geo', function () {
        //dd(\App\Models\Application::all());
        /*foreach(\App\Models\Sale::all() as $item) {
            if(file_exists(public_path() . '/img/sales/x-360-' . $item->src)) {
                deleteImgCrops('sales', $item->src);
                //continue;
            }
            \App\Events\ImageUploaded::dispatch(public_path() . '/img/sales/', $item->src);
        }  */ 
        //dd(\App\Models\Service::all());
        /*foreach(Cache::get('services') as $s) {
            $new = $s->replicate();
            $new->save();
        }
        dd(\App\Models\Service::all());
        dd(Cache::get('services'));*/
        //Cache::add('key', '123', now()->addHours(4));
        //Cache::add('services', \App\Models\Service::all(), now()->addHours(4));
     
      $location = Location::get($_SERVER['REMOTE_ADDR']);
      return "
        Данные модуля местоположения <br>
        Ваша страна: $location->countryName <br>
        Ваш город: $location->cityName
      ";
    });
  });
    //});


//ADMIN
//Route::resource('admin/menu', MenuController::class);
Route::group(['namespace' => 'Admin', 'prefix' => 'admin/', 'middleware'=>'admin'], function()
{

  Route::group(['namespace' => 'Vacancy', 'prefix' => 'vacancy', 'name' => 'admin.vacancy.', 'middleware' => 'redactor'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.vacancy.index');
        Route::get('/resumes', 'IndexController@resumes')->name('admin.vacancy.resumes');
        Route::post('/resumes/{app}', 'IndexController@getResume')->name('admin.vacancy.getResume');
        Route::get('/create', 'IndexController@create')->name('admin.vacancy.create');
        Route::post('', 'IndexController@store')->name('admin.vacancy.store');
        Route::get('/{vacancy}', 'IndexController@show')->name('admin.vacancy.show');
        Route::get('/{vacancy}/edit', 'IndexController@edit')->name('admin.vacancy.edit');
        Route::patch('/{vacancy}', 'IndexController@update')->name('admin.vacancy.update');
        Route::delete('/{vacancy}', 'IndexController@destroy')->name('admin.vacancy.destroy');
        Route::delete('/resume/{resume}', 'IndexController@destroyResume')->name('admin.resume.destroy');
    });

    Route::group(['prefix' => 'vacancy_category', 'middleware' => 'redactor'], function()
    {
        Route::get('/', 'VacancyCategoryController@index')->name('admin.vc.index');
        Route::get('/create', 'VacancyCategoryController@create')->name('admin.vc.create');
        Route::post('', 'VacancyCategoryController@store')->name('admin.vc.store');
        Route::get('/{vc}/edit', 'VacancyCategoryController@edit')->name('admin.vc.edit');
        Route::patch('/{vc}', 'VacancyCategoryController@update')->name('admin.vc.update');
        Route::delete('/{vc}', 'VacancyCategoryController@destroy')->name('admin.vc.destroy');
    });

    Route::group(['prefix' => 'form_types', 'middleware' => 'redactor'], function()
    {
        Route::get('/', 'FormTypeController@index')->name('admin.formtype.index');
        Route::get('/{type}/edit', 'FormTypeController@edit')->name('admin.formtype.edit');
        Route::patch('/{type}', 'FormTypeController@update')->name('admin.formtype.update');
    });

  //Route::resource('menu', 'MenuController');
  //Route::resource('menu', MenuController::class);

  /*Route::group(['namespace' => 'Menu', 'prefix' => 'menu'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.review.index');
    });*/

    Route::group(['namespace' => 'Review', 'prefix' => 'review'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.review.index');
        Route::get('/create', 'CreateController@index')->name('admin.review.create');
        Route::post('', 'StoreController@index')->name('admin.review.store');
        Route::get('/{review}', 'ShowController@index')->name('admin.review.show');
        Route::get('/{review}/edit', 'EditController@index')->name('admin.review.edit');
        Route::patch('/{review}', 'UpdateController@index')->name('admin.review.update');
        Route::delete('/{review}', 'DestroyController@index')->name('admin.review.destroy');
    });

    Route::group(['namespace' => 'FAQ', 'prefix' => 'faq'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.faq.index');
        Route::get('/create', 'CreateController@index')->name('admin.faq.create');
        Route::post('', 'StoreController@index')->name('admin.faq.store');
        Route::get('/{question}', 'ShowController@index')->name('admin.faq.show');
        Route::get('/{question}/edit', 'EditController@index')->name('admin.faq.edit');
        Route::patch('/{question}', 'UpdateController@index')->name('admin.faq.update');
        Route::delete('/{question}', 'DestroyController@index')->name('admin.faq.destroy');
    });

    Route::group(['namespace' => 'Service', 'prefix' => 'service'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.service.index');
        Route::get('/create', 'CreateController@index')->name('admin.service.create');
        Route::post('', 'StoreController@index')->name('admin.service.store');
        Route::get('/{service}', 'ShowController@index')->name('admin.service.show');
        Route::get('/{service}/edit', 'EditController@index')->name('admin.service.edit');
        Route::patch('/{service}', 'UpdateController@index')->name('admin.service.update');
        Route::delete('/{service}', 'DestroyController@index')->name('admin.service.destroy');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.category.index');
        Route::get('/create', 'CreateController@index')->name('admin.category.create');
        Route::post('', 'StoreController@index')->name('admin.category.store');
        Route::get('/{category}', 'ShowController@index')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController@index')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController@index')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController@index')->name('admin.category.destroy');
    });

    // resource controller ?
    Route::group(['namespace' => 'Page', 'prefix' => 'page'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.page.index');
        Route::get('/create', 'IndexController@create')->name('admin.page.create');
        Route::post('', 'IndexController@store')->name('admin.page.store');
        Route::get('/{category}', 'IndexController@show')->name('admin.page.show');
        Route::get('/{category}/edit', 'IndexController@edit')->name('admin.page.edit');
        Route::patch('/{category}', 'IndexController@update')->name('admin.page.update');
        Route::delete('/{category}', 'IndexController@destroy')->name('admin.page.destroy');
        Route::delete('/destroySlider/{category_slider}', 'IndexController@destroySlider')->name('admin.page.destroySlider');
        Route::delete('/destroySliderAjax/{category_slider}', 'IndexController@destroySliderAjax')->name('admin.page.destroySliderAjax');
    });

    

  Route::group(['prefix' => 'menu', /*'name' => 'admin.menu.'*/], function()
    {
        Route::get('/', 'MenuController@index')->name('admin.menu.index');
        Route::get('/create', 'MenuController@create')->name('admin.menu.create');
        Route::post('', 'MenuController@store')->name('admin.menu.store');
        //Route::get('/{menu}', 'MenuController@show')->name('show');
        Route::get('/{menu}/edit', 'MenuController@edit')->name('admin.menu.edit');
        Route::patch('/{menu}', 'MenuController@update')->name('admin.menu.update');
        Route::delete('/{menu}', 'MenuController@destroy')->name('admin.menu.destroy');
    });

  Route::group(['prefix' => 'dynamic-page', /*'name' => 'admin.menu.'*/], function()
  {
      Route::put('/{page}', 'DynamicPageController@update')->name('admin.dynamic-page.update');
  });

    Route::group(['namespace' => 'Category_slider', 'prefix' => 'category_slider'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.category_slider.index');
        Route::get('/create', 'CreateController@index')->name('admin.category_slider.create');
        Route::post('', 'StoreController@index')->name('admin.category_slider.store');
        Route::get('/{category_slider}/edit', 'EditController@index')->name('admin.category_slider.edit');
        Route::patch('/{category_slider}', 'UpdateController@index')->name('admin.category_slider.update');
        Route::delete('/{category_slider}', 'DestroyController@index')->name('admin.category_slider.destroy');
    });

    Route::group(['namespace' => 'Service_slider', 'prefix' => 'service_slider'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.service_slider.index');
        Route::get('/create', 'CreateController@index')->name('admin.service_slider.create');
        Route::post('', 'StoreController@index')->name('admin.service_slider.store');
        Route::get('/{service_slider}/edit', 'EditController@index')->name('admin.service_slider.edit');
        Route::patch('/{service_slider}', 'UpdateController@index')->name('admin.service_slider.update');
        Route::delete('/{service_slider}', 'DestroyController@index')->name('admin.service_slider.destroy');
    });

    Route::group(['namespace' => 'Price', 'prefix' => 'price'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.price.index');
        Route::get('/create', 'CreateController@index')->name('admin.price.create');
        Route::post('', 'StoreController@index')->name('admin.price.store');
        Route::get('/{price}', 'ShowController@index')->name('admin.price.show');
        Route::get('/{price}/edit', 'EditController@index')->name('admin.price.edit');
        Route::patch('/{price}', 'UpdateController@index')->name('admin.price.update');
        Route::delete('/{price}', 'DestroyController@index')->name('admin.price.destroy');
    });

    Route::group(['namespace' => 'Contact', 'prefix' => 'contact'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.contact.index');
        Route::get('/create', 'CreateController@index')->name('admin.contact.create');
        Route::post('', 'StoreController@index')->name('admin.contact.store');
        Route::get('/{contact}', 'ShowController@index')->name('admin.contact.show');
        Route::get('/{contact}/edit', 'EditController@index')->name('admin.contact.edit');
        Route::patch('/{contact}', 'UpdateController@index')->name('admin.contact.update');
        Route::delete('/{contact}', 'DestroyController@index')->name('admin.contact.destroy');
    });

    Route::group(['namespace' => 'Sale', 'prefix' => 'sale'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.sale.index');
        Route::get('/create', 'CreateController@index')->name('admin.sale.create');
        Route::post('', 'StoreController@index')->name('admin.sale.store');
        Route::get('/{sale}', 'ShowController@index')->name('admin.sale.show');
        Route::get('/{sale}/edit', 'EditController@index')->name('admin.sale.edit');
        Route::patch('/{sale}', 'UpdateController@index')->name('admin.sale.update');
        Route::delete('/{sale}', 'DestroyController@index')->name('admin.sale.destroy');
    });

    Route::group(['namespace' => 'Gallery', 'prefix' => 'gallery'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.gallery.index');
        Route::get('/create', 'CreateController@index')->name('admin.gallery.create');
        Route::post('', 'StoreController@index')->name('admin.gallery.store');
        Route::get('/{gallery}', 'ShowController@index')->name('admin.gallery.show');
        Route::get('/{gallery}/edit', 'EditController@index')->name('admin.gallery.edit');
        Route::patch('/{gallery}', 'UpdateController@index')->name('admin.gallery.update');
        Route::delete('/{gallery}', 'DestroyController@index')->name('admin.gallery.destroy');
    });

  	Route::group(['namespace' => 'Users', 'prefix' => 'user', 'middleware' => 'redactor'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.user.index');
        Route::get('/create', 'CreateController@index')->name('admin.user.create');
        Route::post('', 'StoreController@index')->name('admin.user.store');
        Route::get('/{user}', 'ShowController@index')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController@index')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController@index')->name('admin.user.update');
        Route::delete('/{user}', 'DestroyController@index')->name('admin.user.destroy');
    });


    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function()
    {

        Route::group(['namespace' => 'Header', 'prefix' => 'header'], function()
        {
		    Route::get('/', 'IndexController@index')->name('admin.main.header.index');
            Route::get('/{header}', 'ShowController@index')->name('admin.main.header.show');
            Route::get('/{header}', 'ShowController@index')->name('admin.main.header.show');
            Route::get('/{header}/edit', 'EditController@index')->name('admin.main.header.edit');
            Route::patch('/{header}', 'UpdateController@index')->name('admin.main.header.update');
        });

        Route::group(['namespace' => 'About', 'prefix' => 'about'], function()
        {
            Route::get('/', 'IndexController@index')->name('admin.main.about.index');
            Route::get('/{about}', 'ShowController@index')->name('admin.main.about.show');
            Route::get('/{about}/edit', 'EditController@index')->name('admin.main.about.edit');
            Route::patch('/{about}', 'UpdateController@index')->name('admin.main.about.update');
        });

        Route::group(['namespace' => 'Cards', 'prefix' => 'welcome_cards'], function()
        {
            Route::get('/', 'IndexController@index')->name('admin.main.welcome_cards.index');
            Route::get('/create', 'CreateController@index')->name('admin.main.welcome_cards.create');
            Route::post('', 'StoreController@index')->name('admin.main.welcome_cards.store');
            Route::get('/{WelcomeCards}', 'ShowController@index')->name('admin.main.welcome_cards.show');
            Route::get('/{WelcomeCards}/edit', 'EditController@index')->name('admin.main.welcome_cards.edit');
            Route::patch('/{WelcomeCards}', 'UpdateController@index')->name('admin.main.welcome_cards.update');
            Route::delete('/{WelcomeCards}', 'DestroyController@index')->name('admin.main.welcome_cards.destroy');
        });

        Route::group(['namespace' => 'Why', 'prefix' => 'why_cards'], function()
        {
            Route::get('/', 'IndexController@index')->name('admin.main.why_cards.index');
            Route::get('/create', 'CreateController@index')->name('admin.main.why_cards.create');
            Route::post('', 'StoreController@index')->name('admin.main.why_cards.store');
            Route::get('/{WhyCards}', 'ShowController@index')->name('admin.main.why_cards.show');
            Route::get('/{WhyCards}/edit', 'EditController@index')->name('admin.main.why_cards.edit');
            Route::patch('/{WhyCards}', 'UpdateController@index')->name('admin.main.why_cards.update');
            Route::delete('/{WhyCards}', 'DestroyController@index')->name('admin.main.why_cards.destroy');
        });

        Route::group(['namespace' => 'MainText', 'prefix' => 'main_text'], function()
        {
            Route::get('/', 'IndexController@index')->name('admin.main.main_text.index');
            Route::get('/{text}', 'ShowController@index')->name('admin.main.main_text.show');
            Route::get('/{text}/edit', 'EditController@index')->name('admin.main.main_text.edit');
            Route::patch('/{text}', 'UpdateController@index')->name('admin.main.main_text.update');
        });

    });// /MAIN

    Route::group(['prefix' => 'counter', 'middleware' => 'redactor'], function()
    {
        Route::get('/', 'CounterController@index')->name('admin.counter.index');
        Route::post('/', 'CounterController@store')->name('admin.counter.store');
    });

    Route::group(['namespace' => 'Application', 'prefix' => 'application', 'middleware' => 'redactor'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.application.index');
        Route::get('/{application}', 'ShowController@index')->name('admin.application.show');
        Route::delete('/{application}', 'DestroyController@index')->name('admin.application.destroy');
    });

    Route::group(['namespace' => 'NewReview', 'prefix' => 'new_review', 'middleware' => 'redactor'], function()
    {
        Route::get('/', 'IndexController@index')->name('admin.new_reviews.index');
        Route::get('/{application}', 'ShowController@index')->name('admin.new_reviews.show');
        Route::delete('/{application}', 'DestroyController@index')->name('admin.new_reviews.destroy');
    });

        Route::group(['namespace' => 'SEO', 'prefix' => 'seo'], function()
        {
            Route::get('/', 'IndexController@index')->name('admin.seo.index');
            Route::get('/create', 'CreateController@index')->name('admin.seo.create');
            Route::post('', 'StoreController@index')->name('admin.seo.store');
            Route::get('/{seo}', 'ShowController@index')->name('admin.seo.show');
            Route::get('/{seo}/edit', 'EditController@index')->name('admin.seo.edit');
            Route::patch('/{seo}', 'UpdateController@index')->name('admin.seo.update');
            Route::delete('/{seo}', 'DestroyController@index')->name('admin.seo.destroy');
        });

        Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function()
        {
            Route::get('/', 'IndexController@index')->name('admin.blog.index');
            Route::get('/create', 'CreateController@index')->name('admin.blog.create');
            Route::post('', 'StoreController@index')->name('admin.blog.store');
            Route::get('/{blog}', 'ShowController@index')->name('admin.blog.show');
            Route::get('/{blog}/edit', 'EditController@index')->name('admin.blog.edit');
            Route::patch('/{blog}', 'UpdateController@index')->name('admin.blog.update');
            Route::delete('/{blog}', 'DestroyController@index')->name('admin.blog.destroy');
        });

});// /ADMIN


//FORM
Route::post('/locale/change/', 'MainController@locale')->name('locale.change');

Route::post('/form/store/', 'MainController@form')->name('form.store');
Route::post('/city/store/', 'MainController@city')->name('city.store');
Route::post('/review/store/', 'ReviewController@add_review')->name('review.store');
Route::post('/resume/store/', 'VacancyController@form')->name('resume.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


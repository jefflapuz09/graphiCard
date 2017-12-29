<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
use App\ServiceCategory;
use App\ServiceType;
use App\CompanyInfo;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $nav = DB::table('service_categories')
               ->where('isActive',1)
               ->get();
        $typenav = DB::table('service_subcategory')
                ->select('service_subcategory.categoryId as categoryId','service_subcategory.*')
                ->where('isActive',1)
                ->get();
        $model = ServiceCategory::with('Type')->where('isActive',1)->limit(4)
        ->get();
        $comp = CompanyInfo::find(1);
        View::share('comp',$comp);
        View::share('nav',$nav);
        View::share('model',$model);
      
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

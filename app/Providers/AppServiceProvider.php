<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 分配前台通用的数据
        view()->composer('home/*',function($view){
            // 获取分类导航
            $category = Category::select('id', 'name')->get();
            $assign = [
                'cid'      => 'index',
                'category' => $category,
            ];
            $view->with($assign);
        });

        // 分配后台通用的左侧导航数据
        view()->composer('admin/*',function($view){
            // 分配登录用户的数据
            $loginUserData = [
                'name' => 'Sen'
            ];
            $view->with('loginUserData', $loginUserData);
        });
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

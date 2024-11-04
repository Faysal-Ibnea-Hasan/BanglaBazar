<?php

namespace App\Repositories\Dashboard;

use App\Models\Bid;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function user_count()
    {
        return User::count();
    }
    public function order_count()
    {
        return Order::count();
    }
    public function product_count()
    {
        return Product::count();
    }
    public function bids_count()
    {
        return Bid::count();
    }
    public function categories_count()
    {
        return Category::count();
    }
    public function sub_categories_count()
    {
        return SubCategory::count();
    }
    public function dynamic()
    {
        $boxes = [];
        $data = [];
        $users = $this->user_count();
        $orders = $this->order_count();
        $products = $this->product_count();
        $bids = $this->bids_count();
        $categories = $this->categories_count();
        $subCategories = $this->sub_categories_count();
        $data = [
            'users' => $users,
            'orders' => $orders,
            'products' => $products,
            'bids' => $bids,
            'categories' => $categories,
            'subCategories' => $subCategories,
        ];
        foreach ($data as $type => $count) {
            switch ($type) {
                case 'orders':
                    $boxes[] = [
                        'route' => route('users.index'),
                        'count' => $count,
                        'title' => 'Orders',
                        'color' => 'bg-info',
                        'icon' => 'fa fa-shopping-bag',
                    ];
                    break;

                case 'users':
                    $boxes[] = [
                        'route' => route('users.index'),
                        'count' => $count,
                        'title' => 'Users',
                        'color' => 'bg-success',
                        'icon' => 'fas fa-users',
                    ];
                    break;

                case 'products':
                    $boxes[] = [
                        'route' => route('users.index'),
                        'count' => $count,
                        'title' => 'Products',
                        'color' => 'bg-warning',
                        'icon' => 'fas fa-gift',
                    ];
                    break;
                case 'bids':
                    $boxes[] = [
                        'route' => route('users.index'),
                        'count' => $count,
                        'title' => 'Bids',
                        'color' => 'bg-primary',
                        'icon' => 'fab fa-btc',
                    ];
                    break;
                case 'categories':
                    $boxes[] = [
                        'route' => route('categories.index'),
                        'count' => $count,
                        'title' => 'Categories',
                        'color' => 'bg-secondary',
                        'icon' => 'fas fa-tag',
                    ];
                    break;
                case 'subCategories':
                    $boxes[] = [
                        'route' => route('users.index'),
                        'count' => $count,
                        'title' => 'Sub Categories',
                        'color' => 'bg-secondary bg-opacity-10',
                        'icon' => 'fas fa-tags',
                    ];
                    break;

                    // Add more cases as needed
            }
        }
        return $boxes;
    }
}

<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use App\Models\Inventory;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Contracts\AttributeContract;
use App\Repositories\AttributeRepository;
use App\Contracts\BatteryGroupContract;
use App\Repositories\BatteryGroupRepository;
use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;
use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;
use App\Contracts\BannerContract;
use App\Repositories\BannerRepository;
use App\Contracts\PostContract;
use App\Repositories\PostRepository;
use App\Contracts\BatteryFinderContract;
use App\Repositories\BatteryFinderRepository;
use App\Contracts\FaqContract;
use App\Repositories\FaqRepository;
use App\Contracts\TestimonialContract;
use App\Repositories\TestimonialRepository;
use App\Contracts\CouponContract;
use App\Repositories\CouponRepository;
use App\Contracts\ReturnProductContract;
use App\Repositories\ReturnProductRepository;
use App\Contracts\SaleContract;
use App\Repositories\SaleRepository;
use App\Contracts\InventoryContract;
use App\Repositories\InventoryRepository;
use App\Contracts\CapacityContract;
use App\Repositories\CapacityRepository;
use App\Contracts\UserContract;
use App\Repositories\UserRepository;
use App\Contracts\AffiliateContract;
use App\Repositories\AffiliateRepository;
use App\Contracts\ReferralContract;
use App\Repositories\ReferralRepository;
use App\Contracts\ProductReviewContract;
use App\Repositories\ProductReviewRepository;
use App\Contracts\ProductShippingInfoContract;
use App\Repositories\ProductShippingInfoRepository;
use App\Contracts\VideoContract;
use App\Repositories\VideoRepository;
use App\Contracts\AffiliateDashboardContract;
use App\Repositories\AffiliateDashboardRepository;
use App\Contracts\WishlistContract;
use App\Repositories\WishlistRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class                 =>          CategoryRepository::class,
        AttributeContract::class                =>          AttributeRepository::class,
        BatteryGroupContract::class             =>          BatteryGroupRepository::class,
        ProductContract::class                  =>          ProductRepository::class,
        OrderContract::class                    =>          OrderRepository::class,
        BannerContract::class                   =>          BannerRepository::class,
        PostContract::class                     =>          PostRepository::class,
        BatteryFinderContract::class            =>          BatteryFinderRepository::class,
        FaqContract::class                      =>          FaqRepository::class,
        TestimonialContract::class              =>          TestimonialRepository::class,
        CouponContract::class                   =>          CouponRepository::class,
        ReturnProductContract::class            =>          ReturnProductRepository::class,
        SaleContract::class                     =>          SaleRepository::class,
        InventoryContract::class                =>          InventoryRepository::class,
        CapacityContract::class                 =>          CapacityRepository::class,
        UserContract::class                     =>          UserRepository::class,
        AffiliateContract::class                =>          AffiliateRepository::class,
        ReferralContract::class                 =>          ReferralRepository::class,
        ProductReviewContract::class            =>          ProductReviewRepository::class,
        ProductShippingInfoContract::class      =>          ProductShippingInfoRepository::class,
        VideoContract::class                    =>          VideoRepository::class,
        AffiliateDashboardContract::class       =>          AffiliateDashboardRepository::class,
        WishlistContract::class                 =>          WishlistRepository::class

    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}

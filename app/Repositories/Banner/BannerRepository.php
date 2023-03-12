<?php

namespace App\Repositories\Banner;

use App\Interfaces\Banner\BannerRepositoryInterface;
use App\Models\Banner\Banner;

class BannerRepository implements BannerRepositoryInterface
{
    public function getAllBanner()
    {
        return Banner::all();
    }
    public function getBannerById($bannerId)
    {
        return Banner::findOrFail($bannerId);
    }
    public function deleteBanner($bannerId)
    {
        Banner::destroy($bannerId);
    }
    public function createBanner(array $bannerDetails)
    {
        return Banner::create($bannerDetails);
    }
    public function updateBanner($bannerId, array $newDetails)
    {
        return Banner::whereId($bannerId)->update($newDetails);
    }
    
}
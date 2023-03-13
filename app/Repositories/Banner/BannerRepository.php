<?php

namespace App\Repositories\Banner;

use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        try {
            Banner::destroy($bannerId);
        } catch (Exception $e) {
            DB::rollBack();
            // TODO: throw new InvalidArgumentException('Unable to delete post data');
        }
        DB::commit();
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
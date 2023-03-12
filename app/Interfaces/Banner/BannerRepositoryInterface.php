<?php

namespace App\Interfaces\Banner;

interface BannerRepositoryInterface
{
    public function getAllBanner();
    public function getBannerById($bannerId);
    public function deleteBanner($bannerId);
    public function createBanner(array $bannerDetails);
    public function updateBanner($bannerId, array $newDetails);
}
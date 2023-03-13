<?php

namespace App\Http\Controllers\Backoffice\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Banner\BannerResource;
use App\Interfaces\Banner\BannerRepositoryInterface;

class BannerController extends Controller
{
    private BannerRepositoryInterface $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = $this->bannerRepository->getAllBanner();
        return BannerResource::collection($banner);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = $this->bannerRepository->getBannerById($id);
        return BannerResource::collection($banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

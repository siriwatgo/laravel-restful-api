<?php

namespace App\Http\Controllers\Backoffice\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\Banner\BannerResource;
use App\Interfaces\Banner\BannerRepositoryInterface;
use App\Http\Requests\Banner\StoreRequest;
use App\Http\Requests\Banner\UpdateRequest;

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
    public function store(StoreRequest $request)
    {
        $banner = $this->bannerRepository->createBanner($request);
        return BannerResource::collection($banner);
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
    public function update(UpdateRequest $request, string $id)
    {
        $banner = $this->bannerRepository->updateBanner($id, $request);
        return BannerResource::collection($banner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bannerRepository->deleteBanner($id);
        return response()->json()->setStatusCode(Response::HTTP_OK);
    }
}

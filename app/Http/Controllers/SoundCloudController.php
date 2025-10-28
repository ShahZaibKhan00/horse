<?php

namespace App\Http\Controllers;

use App\Services\SoundCloudService;
use Illuminate\Http\Request;

class SoundCloudController extends Controller
{
    protected $soundCloudService;

    public function __construct(SoundCloudService $soundCloudService)
    {
        $this->soundCloudService = $soundCloudService;
    }

    public function getAllTracks()
    {
        $tracks = $this->soundCloudService->getAllTracks();
        return response()->json($tracks);
    }
}

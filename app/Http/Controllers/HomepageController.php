<?php

namespace App\Http\Controllers;

use App\Interface\ApplicationRepositoryInterface;
use Illuminate\Contracts\View\View;

class HomepageController extends Controller
{
    public function __construct(protected ApplicationRepositoryInterface $applicationRepository){}
    public function getAll(): View
    {
        $apps = $this->applicationRepository->getAllVisible();
        return view('app_index', ['apps' => $apps]);
    }
}

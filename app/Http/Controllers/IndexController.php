<?php

namespace App\Http\Controllers;
use App\Interface\ApplicationRepositoryInterface;
use Illuminate\Http\Requests;

class IndexController extends Controller
{
    public function __construct(protected ApplicationRepositoryInterface $applicationRepository){}
    public function index()
    {
        $apps = $this->applicationRepository->getAllVisible();
        return view('app_index', ['apps' => $apps]);
    }
}

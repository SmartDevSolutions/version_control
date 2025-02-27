<?php

namespace App\Repository;

use App\Interface\ApplicationRepositoryInterface;
use App\Models\Application;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    public function getAllVisible(): array{
        return Application::where('is_visible', 1)->get()->toArray();
    }
}

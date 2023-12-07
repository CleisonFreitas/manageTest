<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ListLivrosContract
{
    public function index(): JsonResponse;
}

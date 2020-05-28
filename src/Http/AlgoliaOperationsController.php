<?php

namespace Dottd\NovaAlgolia\Http;

use Illuminate\Routing\Controller;
use Dottd\NovaAlgolia\Clients\AlgoliaClient;

class AlgoliaOperationsController extends Controller
{
    public function index()
    {
        $operations = (new AlgoliaClient)->getSearchStats();

        return response()->json(['operations' => $operations]);
    }
}

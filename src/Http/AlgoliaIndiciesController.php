<?php

namespace Dottd\NovaAlgolia\Http;

use Illuminate\Routing\Controller;
use Dottd\NovaAlgolia\Clients\AlgoliaClient;

class AlgoliaIndiciesController extends Controller
{
    public function index()
    {
        $indicies = (new AlgoliaClient)->listIndicies();

        foreach($indicies as $key => $value)
        {
            $indicies[$key]['queries'] = (new AlgoliaClient)->getIndexSearchCount($value['name']);
        }

        return response()->json(['indicies' => $indicies]);
    }
}

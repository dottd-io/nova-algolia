<?php

namespace Dottd\NovaAlgolia\Clients;

use Exception;
use Algolia\AlgoliaSearch\SearchClient;

class AlgoliaClient
{
    public function listIndicies()
    {
        $client = SearchClient::create(
            config('scout.algolia.id'),
            config('scout.algolia.secret')
        );

        try
        {
            return $client->listIndices()['items'];
        }
        catch (Exception $e) {}
    }

    public function getIndexSearchCount($indexName)
    {
        // Create a stream
        $opts = [
            'http'  =>  [
                'method' => "GET",
                'header' => "X-Algolia-Application-Id: " . config('scout.algolia.id') ."\r\n" . "X-Algolia-API-Key: " . config('scout.algolia.secret') ."\r\n"
            ]
        ];

        $context = stream_context_create($opts);

        // Open the file using the HTTP headers set above
        $data = file_get_contents('https://usage.algolia.com/1/usage/multi_queries_operations/period/month/' . $indexName, false, $context);

        $currentTotal = 0;

        foreach(json_decode($data)->multi_queries_operations as $currentDay)
        {
            $currentTotal += $currentDay->v;
        }

        return $currentTotal;
    }

    public function getSearchStats()
    {
        // Create a stream
        $opts = [
            'http'  =>  [
                'method' => "GET",
                'header' => "X-Algolia-Application-Id: " . config('scout.algolia.id') ."\r\n" . "X-Algolia-API-Key: " . config('scout.algolia.secret') ."\r\n"
            ]
        ];

        $context = stream_context_create($opts);

        // Open the file using the HTTP headers set above
        $data = file_get_contents('https://usage.algolia.com/1/usage/multi_queries_operations/period/month', false, $context);

        $returnData = [];

        foreach(json_decode($data)->multi_queries_operations as $currentDay)
        {
            array_push($returnData, ['date' => date("M d", ($currentDay->t / 1000)), 'value' => $currentDay->v]);
        }

        return $returnData;
    }
}

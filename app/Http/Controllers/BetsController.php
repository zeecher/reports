<?php

namespace App\Http\Controllers;


class BetsController extends Controller
{
    public function index()
    {


        /**
         * For docs visit @link : https://www.elastic.co/guide/en/elasticsearch/client/php-api/6.0/_overview.html
         */

        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id'
        ];

        // Get doc at /my_index/my_type/my_id
        $response = $this->client->get($params);



        return $this->response->setJsonContent([

            'data' => __METHOD__
        ]);
    }

    public function show($id) {


        return $this->response->setJsonContent([

            'data' => __METHOD__ . $id
        ]);
    }

    public function store() {


        return $this->response->setJsonContent([

            'data' => __METHOD__
        ]);
    }

    public function update($id) {

        return $this->response->setJsonContent([

            'data' => __METHOD__ . $id
        ]);
    }

    public function patch($id) {

        return $this->response->setJsonContent([

            'data' => __METHOD__ . $id
        ]);
    }

    public function delete($id) {

        return $this->response->setJsonContent([

            'data' => __METHOD__ . $id
        ]);
    }
}

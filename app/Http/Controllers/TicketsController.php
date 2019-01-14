<?php

namespace App\Http\Controllers;

class TicketsController extends Controller
{
    public function index()
    {

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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EventsService;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    protected $event_service;

    public function __construct(EventsService $eventService)
    {
        $this->event_service = $eventService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response['code'] = 200;
            $response['data'] = $this->event_service->getAll();
        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'start_date', 'end_date', 'description']);

        $response['code'] = 201;
        $response['data'] = [];

        try {
            $result = $this->event_service->createEvent($data);

            if (isset($result['code']) && !empty($result['code'])) {
                $response['code'] = $result['code'];
                $response['data'] = $result['data'];
            } else {
                $response['data'] = $result;
            }

        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $response['code'] = 200;
            $response['data'] = $this->event_service->getEvent($id);
        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'start_date', 'end_date', 'description']);

        $response['code'] = 200;
        $response['data'] = [];

        try {
            $result = $this->event_service->updateEvent($data, (int) $id);

            if (isset($result['code']) && !empty($result['code'])) {
                $response['code'] = $result['code'];
                $response['data'] = $result['data'];
            } else {
                $response['data'] = $result;
            }

        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $response['code'] = 200;
            $response['data'] = $this->event_service->deleteEvent($id);
        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }
}

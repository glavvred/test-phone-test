<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Phone[]|Collection
     */
    public function index()
    {
        return Phone::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $this->validate($request, [
                'phone' => 'required|string',
                'name' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error',
                'message' => 'validation_error',
                'validation_response' => $e,
            ], 200);
        }
        $contact = new Phone();
        $contact->name = $request->input('name');
        $contact->name = $request->input('phone');
        $contact->save();

        return response()->json([
            'status' => 'success',
            'id' => $contact->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Phone $phone
     * @return Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Phone $phone
     * @return Response
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Phone $phone
     * @return Response
     */
    public function update(Request $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Phone $phone
     * @return Response
     */
    public function destroy(Phone $phone)
    {
        //
    }
}

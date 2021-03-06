<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Database\Eloquent\Collection;
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
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Phone[]|Collection
     */
    public function get(Request $request)
    {
        try {
            $this->validate($request, [
                'phone_id' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error',
                'message' => 'validation_error',
                'validation_response' => $e,
            ], 200);
        }
        $phone = Phone::find($request->input('phone_id'));
        if (!empty($phone))
            return $phone;
        else {
            return response()->json([
                'status' => 'not found',
                'id' => $request->input('phone_id')]);
        }
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
        $contact->phone = $request->input('phone');
        $contact->save();

        return response()->json([
            'status' => 'success',
            'id' => $contact->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        try {
            $this->validate($request, [
                'phone_id' => 'required|integer',
                'phone' => 'required|string',
                'name' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error',
                'message' => 'validation_error',
                'validation_response' => $e,
            ], 200);
        }

        $contact = Phone::findOrFail($request->input('phone_id'));
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->save();

        return response()->json([
            'status' => 'success',
            'id' => $contact->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request)
    {
        try {
            $this->validate($request, [
                'phone_id' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error',
                'message' => 'validation_error',
                'validation_response' => $e,
            ], 200);
        }

        $contact = Phone::findOrFail($request->input('phone_id'));
        $contact->delete();

        return response()->json([
            'status' => 'success',
            'id' => $contact->id]);
    }
}

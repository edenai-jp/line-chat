<?php

namespace App\Http\Controllers;

use App\Models\LineUser;
use Illuminate\Http\Request;

class LineUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lineUser = new LineUser;

        $lineUser->name = $request->line_user_name;
        $lineUser->line_id = $request->line_id;
        $lineUser->token = $request->token;

        $lineUser->save();

        return response()->json([
            'error_no' => 0,
            'message' => 'LineUser created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(LineUser $lineUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LineUser $lineUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LineUser $lineUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LineUser $lineUser)
    {
        //
    }
}

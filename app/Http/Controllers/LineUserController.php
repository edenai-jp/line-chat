<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\LineUser;
use App\Models\Topic;
use Illuminate\Http\Request;

class LineUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json([
            'error_no' => 0,
            'message'  => '',
            'data'     => [
                "characters" => Character::select('name', 'avatar', 'intro')->get(),
                "topics"     => Topic::select('title', 'avatar', 'intro')->get(),
            ],
        ], 200);
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
        $data = [
            'line_id' => $request->line_id,
            'name'    => $request->line_user_name,
            'token'   => $request->token,
        ];
        LineUser::firstOrCreate(['line_id' => $data['line_id']], $data);

        return response()->json([
            'error_no' => 0,
            'message'  => 'LineUser created successfully',
            'data'     => [],
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

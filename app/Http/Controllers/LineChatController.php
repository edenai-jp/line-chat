<?php

namespace App\Http\Controllers;

use App\Models\LineChat;
use Illuminate\Http\Request;

class LineChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $records = LineChat::getLatestRecords($request->line_id, $request->characterId);
        if ($records->isEmpty()) {
            return response()->json([
                'error_no' => 0,
                'message' => '',
                'data' => [["","こんにちは！お元気ですか？"]]
            ], 200);
        }
        return response()->json([
                'error_no' => 0,
                'message' => '',
                'data' => $records->toArray()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LineChat $lineChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LineChat $lineChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LineChat $lineChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LineChat $lineChat)
    {
        //
    }
}

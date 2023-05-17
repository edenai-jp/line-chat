<?php

namespace App\Http\Controllers;

use App\Models\LineChat;
use App\Services\ChatGPT;
use Illuminate\Http\Request;

class LineChatController extends Controller
{

    /**
     * The ChatGPT service instance.
     *
     * @var \App\Services\ChatGPT
     */
    protected $chatGPT;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\ChatGPT  $chatGPT
     * @return void
     */
    public function __construct(ChatGPT $chatGPT)
    {
        $this->chatGPT = $chatGPT;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $records = LineChat::getLatestRecords($request->line_id, $request->character_id);
        if (empty($records)) {
            return response()->json([
                'error_no' => 0,
                'message' => '',
                'data' => [["","こんにちは！お元気ですか？"]]
            ], 200);
        }
        return response()->json([
                'error_no' => 0,
                'message' => '',
                'data' => $records
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function chat(Request $request)
    {
        // 获取输入的消息
        $question = $request->question;
        $characterId = $request->character_id;

        // 使用 ChatGPT 服务
        $answer = $this->chatGPT->chat($question);

        // 创建新的 LineChat 记录
        LineChat::create([
            'line_id' => $request->line_id,  // 这里需要替换成实际的 line_id
            'character_id' => $characterId,  // 这里需要替换成实际的 character_id
            'question' => $question,
            'answer' => $answer,
            'answer_by' => 'ChatGPT',
        ]);
        // 返回响应
        return response()->json([
            'error_no' => 0,
            'message' => '',
            'data' => $answer
        ], 200);
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

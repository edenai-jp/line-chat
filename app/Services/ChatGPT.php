<?php

namespace App\Services;
use OpenAI;

class ChatGPT
{
    /**
     * The chat method for the ChatGPT service.
     *
     * @param  string  $message
     * @return string
     */
    public function chat(string $message): string
    {
        $openaiApiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($openaiApiKey);

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $message],
            ],
        ]);

        $response->id; // 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq'
        $response->object; // 'chat.completion'
        $response->created; // 1677701073
        $response->model; // 'gpt-3.5-turbo-0301'

        foreach ($response->choices as $result) {
            $result->index; // 0
            $result->message->role; // 'assistant'
            $result->message->content; // '\n\nHello there! How can I assist you today?'
            $result->finishReason; // 'stop'
        }

        $response->usage->promptTokens; // 9,
        $response->usage->completionTokens; // 12,
        $response->usage->totalTokens; // 21

        $answer = $response->toArray(); // ['id' => 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq', ...]        // 在这里实现你的聊天逻辑
        return $answer['choices'][0]['message']['content'];
    }
}

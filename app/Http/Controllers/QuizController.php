<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\QuizAttempt;
use App\Models\QuizQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function index()
    {
        $quiz_attempts = QuizAttempt::where('user_id', Auth::id())->latest()->paginate(25);

        $languages = Language::all();

        return view('quiz.index', get_defined_vars());
    }
    public function attempt(Request $request)
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
 "model": "gpt-3.5-turbo",
 "messages": [{"role": "system", "content": "Generate 5 quiz questions for learning ' . $request->language . ' language with different vocabulary, phrases, or basic grammar in each question. Avoid repeating questions about basic greetings or the meaning of \'hello.\' Instead, cover different common situations, including: Simple introductions,Asking for directions, Ordering food or drinks, Basic verbs and their conjugations . Structure the response in JSON format with the following structure in english language:[{\'question\': \'Question text\',\'options\': [\'Option 1\', \'Option 2\', \'Option 3\', \'Option 4\'],\'correct_answer\': \'Correct Option\'},].Please ensure each question is on a different topic and that questions do not repeat within the same response. Return only valid JSON format. Ensure no extra comments, text, or formatting issues outside the JSON structure."}]
 }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . env('CHATGPT_KEY'),
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode($response, true);

            // dd($response);
            if (isset($response['choices'][0]['message']['content'])) {

                // dd($response['choices'][0]['message']['content']);
                $questions = json_decode(trim($response['choices'][0]['message']['content']), true);

                if (!$questions) {
                    $questions = json_decode($this->sanitizeJsonString($response['choices'][0]['message']['content']));
                }

                $language = $request->language;

                return view('quiz.attempt', get_defined_vars());
            }

            return redirect()->route('dashboard')->withErrors(['danger' => "Something went wrong. Please try again in few minutes"]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
        }
    }

    public function result($uuid)
    {
        $quiz_attempt = QuizAttempt::where('uuid', $uuid)
            ->with('user')->first();
        return view('quiz.result', get_defined_vars());
    }

    public function markResult(Request $request)
    {
        try {
            DB::beginTransaction();

            $quiz_attempt = new QuizAttempt;
            $quiz_attempt->uuid = Str::uuid();
            $quiz_attempt->user_id = Auth::id();
            $quiz_attempt->language = $request->language;
            $quiz_attempt->total_question = $request->total_question;
            $quiz_attempt->correct = $request->correct;
            $quiz_attempt->wrong = $request->wrong;
            $quiz_attempt->average = ($request->correct / $request->total_question) * 100;
            $quiz_attempt->save();

            $questions = [];
            $now = Carbon::now()->toDateTimeString();
            foreach ($request->questions as $question) {
                $questions[] = [
                    'quiz_attempt_id' => $quiz_attempt->id,
                    'question' => $question['question'],
                    'options' => json_encode($question['options']),
                    'correct_answer' => $question['correct_answer'],
                    'selected_answer' => $question['selected_answer'],
                    'updated_at' => $now,
                    'created_at' => $now,
                ];
            }

            QuizQuestion::insert($questions);

            $url = route('quiz.result', ['uuid' => $quiz_attempt->uuid]);
            DB::commit();

            return response()->json($url);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage(), 400);
        }
    }

    public function sanitizeJsonString($json)
    {
        // Replace single quotes with double quotes for JSON compatibility
        $json = str_replace("'", '"', $json);

        // Remove extra trailing commas before closing braces/brackets
        $json = preg_replace('/,\s*([\]}])/m', '$1', $json);

        return $json;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use App\Models\Question;
use App\Models\Exam;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::get();
        //converting the string correct_answer to array
        foreach ($questions as $question) {
            $question->correct_answer = explode(',', $question->correct_answer);
        }
        // dd($questions);
        return view('questions.list', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::orderBy('id', 'asc')->get();
        return view('questions.create', ['exams' => $exams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionStoreRequest $request)
    {
        // dd($request->all());
        $question = new Question();

        $question->question = $request->question;
        $question->exam_id = $request->exam;
        $question->option1 = $request->option1;
        $question->option2 = $request->option2;
        $question->option3 = $request->option3;
        $question->option4 = $request->option4;
        $question->correct_answer = implode(',', $request->checkboxes);

        //save to DB
        $question->save();

        //After saving redirect to display of all categories
        return redirect()->route('questions.list')->with('success', 'Question created successfully');
    }

    // public function to download pdf of show questions
    public function downloadPDF($exam)
    {
        $exam = Exam::findOrFail($exam);
        $questions = Question::where('exam_id', $exam->id)->get();
        //converting the string correct_answer to array
        foreach ($questions as $question) {
            $question->correct_answer = explode(',', $question->correct_answer);
        }
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf.question', ['questions' => $questions, 'exam' => $exam->name]);

        $filename = "{$exam->name}_exams_questions.pdf";
        // return $pdf->stream($filename);

        return $pdf->download($filename);
    }



    /**
     * Display the specified resource.
     */
    public function show($exam)
    {
        $exam = Exam::findOrFail($exam);
        $questions = Question::where('exam_id', $exam->id)->get();
        //if questions is empty then redirect back
        // dd($questions);
        //converting the string correct_answer to array
        foreach ($questions as $question) {
            $question->correct_answer = explode(',', $question->correct_answer);
        }
        return view('questions.list', ['questions' => $questions, 'exam' => $exam->name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }


}

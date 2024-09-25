<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ExamStoreRequest;
use Illuminate\Support\Facades\DB;


class ExamController extends Controller
{
    public function index(Request $request)
    {

        $searchterm = $request->search;
        $query = Exam::query();

        $query->when($searchterm, function ($query) use ($searchterm) {
            $query->where('name', 'like', '%' . $searchterm . '%')
                ->orWhere('description', 'like', '%' . $searchterm . '%')
                ->orWhereHas('category', function ($query) use ($searchterm) {
                    $query->where('categories.name', 'like', '%' . $searchterm . '%');
                });
        });

        $exams = $query->with('category')->get();
        
        // dd($exams);
        return view('exams.list', ['exams' => $exams]);
    }

    //for ajax request
    public function getExams()
    {
        // $exams = Exam::select('exams.id', 'image_path', 'exams.name', 'exams.description', 'categories.name', 'exam_date', 'price')->join('categories', 'categories.id', '=', 'exams.category_id')->get();
        $exams = DB::table('categories as c')
        ->join('exams as e', 'c.id', '=', 'e.category_id')
        ->select('e.id', 'e.image_path', 'e.name', 'e.description', 'c.name as category_name','e.exam_date', 'e.price')
        ->get();
        foreach($exams as $exam) {
            $exam->exam_date = date('jS F Y', strtotime($exam->exam_date));
        }

        
        // dd(response()->json($exams));
        if($exams) {
            return response()->json([
                'message' => "Data Found",
                "code"    => 200,
                "data"  => $exams
            ]);
        } else  {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('exams.create', ['categories' => $categories]);
    }

    public function store(ExamStoreRequest $request)
    {

        //DB Insertion
        $exam = new Exam();
        $exam->name = $request->name;
        $exam->description = $request->description;
        $exam->exam_date = $request->exam_date;
        $exam->price = $request->price;
        $exam->category_id = $request->category;


        //instead of public uploads folder, storage folder should be used.

        if ($request->image != "") {
            //Image moving to uploads folder
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $image_path = time() . '.' . $ext;
            // $image->move(public_path('uploads/exams'), $image_name);
            //put file in storage
            Storage::putFileAs('exams', $image, $image_path);

            //Save uploads path to DB
            $exam->image_path = $image_path;
        }

        //save to DB
        $exam->save();

        //After saving redirect to display of all categories
        return redirect()->route('exams.list')->with('success', 'Exam created successfully');
    }

    public function edit($id)
    {
        //dd() to the check the method which was used to access this route i.e POST, PUT
        //dd(request()->method());
        //find the exam from db
        $exam = Exam::findorfail($id);

        //return the view with the found exam
        $categories = Category::orderBy('id', 'asc')->get();
        return view('exams.edit', ['exam' => $exam, 'categories' => $categories]);
    }

    public function update($id, ExamStoreRequest $request)
    {
        //find exam from db
        $exam = Exam::findOrFail($id);

        //update exam name
        $exam->name = $request->name;
        //update exam description
        $exam->description = $request->description;

        //only update date if changed
        if ($request->exam_date != null) {
            $exam->exam_date = $request->exam_date;
        }

        //update exam price
        $exam->price = $request->price;

        //update exam category
        $exam->category_id = $request->category;

        //only update image if changed
        if ($request->image != null) {
            //delete the old image
            Storage::delete($exam->image_path);

            //New Image moving to uploads folder
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $image_path = time() . '.' . $ext;
            Storage::putFileAs('exams', $image, $image_path);

            //Save new image path to DB
            $exam->image_path = $image_path;
        }

        $exam->save();

        //After updating redirect to display of all categories
        return redirect()->route('exams.list')->with('success', 'Exam updated successfully.');

    }

    public function destroy($id)
    {
        //find the exam from db
        $exam = Exam::findorfail($id);

        //deleet file from storage
        // dd($exam->image_path);
        Storage::delete($exam->image_path);

        //remove the exam from db
        $exam->delete();

        //redirect to list after successful deletion
        return redirect()->route('exams.list')->with('success', 'Exam deleted successfully');
    }


    public function search(Request $request)
    {
        // dd($request);
        $searchterm = $request->search;
        //search for exams where name and description is like the search query
        $exams = Exam::where('name', 'like', '%' . $searchterm . '%')->orWhere('description', 'like', '%' . $searchterm . '%')->orWhereHas('category', function ($query) use ($searchterm) {
            $query->where('categories.name', 'like', "%{$searchterm}%");
        })->with('category')->get();
        return view('exams.list', ['exams' => $exams]);
    }

    public function purchasedExams()
    {
        // Get those exams for which the user has an order and payment exists
        $payments = auth()->user()->payments;
        $orders = auth()->user()->orders;

        $ordersWithPayments = $orders->filter(function ($order) use ($payments) {
            return $payments->contains('order_id', $order->id);
        });
        foreach ($ordersWithPayments as $order) {
            $exam = $order->orderitems->first()->exam;
            //adding each exam into exams array
            $exams[] = $exam;
        }

        //convert array to collection
        $exams = collect($exams);



        return view('exams.list', ['exams' => $exams]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ExamStoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Exports\ExamsExport;
use Maatwebsite\Excel\Facades\Excel;


class ExamController extends Controller
{
    //to display exams view
    public function index(Request $request)
    {
        return view('exams.list');
    }

    //to display questions view
    public function purchasedExams()
    {
        return view('exams.purchased');

    }

    //for ajax request
    public function getExams(Request $request)
    {
        //Data from datatable using ajax request
        $data = $request->all();
        $page_number = $data['start'] / $data['length'] + 1;
        $page_length = $data['length'];
        $skip = ($page_number - 1) * $page_length;

        //query to get exams with category name
        $query = DB::table('categories as c')
            ->join('exams as e', 'c.id', '=', 'e.category_id')
            ->select('e.id', 'e.image_path', 'e.name', 'e.description', 'c.name as category_name', 'e.exam_date', 'e.price');

        // search using search term from datatable
        if (!empty($data['search']['value'])) {
            $search = $data['search']['value'];
            $query->where(function ($q) use ($search) {
                $q->where('e.name', 'like', "%{$search}%")
                    ->orWhere('e.description', 'like', "%{$search}%")
                    ->orWhere('c.name', 'like', "%{$search}%")
                    ->orWhere('e.exam_date', 'like', "%{$search}%")
                    ->orWhere('e.price', 'like', "%{$search}%");
            });
        }

        // get records based on category name
        if (!empty($data['category'])) {
            $query->where('c.name', $data['category']);
        }

        // total records count
        $recordsTotal = $query->count();

        // sorting based on column name and column direction(asc,desc)
        if (!empty($data['order'])) {
            $columnIndex = $data['order'][0]['column'];
            $columnName = $data['columns'][$columnIndex]['data'];
            $columnSortOrder = $data['order'][0]['dir'];
            $query->orderBy($columnName, $columnSortOrder);
        }

        // get records based on page length and skip previous pagination data
        $exams = $query->skip($skip)->take($page_length)->get();

        //format date and add buttons
        foreach ($exams as $exam) {
            $exam->exam_date = date('jS F Y', strtotime($exam->exam_date));
            $exam->buttons = view('partials.exam_buttons', ['exam' => $exam])->render();
        }

        // ajax response back to datatable
        $response = [
            'draw' => $data['draw'],
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => $exams,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function getPurchased()
    {
        // Get those exams for which the user has an order and payment exists
        $user = auth()->user();
        $exams = [];

        $ordersWithPayments = auth()->user()->orders->filter(function ($order) use ($user) {
            return $user->payments->contains('order_id', $order->id);
        });

        foreach ($ordersWithPayments as $order) {
            $exam = $order->orderitems->first()->exam;
            $exam->category_name = $exam->category->name;
            $exam->exam_date = date('jS F Y', strtotime($exam->exam_date));
            $exam->buttons = view('partials.exam_buttons', ['exam' => $exam])->render();
            $exams[] = $exam;
        }

        if (!empty($exams)) {
            return response()->json([
                'message' => "Data Found",
                "code" => 200,
                "data" => $exams
            ]);
        } else {
            return response()->json([
                'message' => "No Data Found",
                "code" => 404
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
            $image_path = $request->file('image')->store('exams');

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
            $image_path = $request->file('image')->store('exams');
            //Save uploads path to DB
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



    public function export()
    {
        return Excel::download(new ExamsExport, 'all-exams.xlsx');
    }
}

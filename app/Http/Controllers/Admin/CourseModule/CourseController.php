<?php

namespace App\Http\Controllers\Admin\CourseModule;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Course;
use App\Models\CoursePackage;
use App\Models\CourseInstructor;
use App\Models\CourseClass;
use App\Models\CourseType;
use App\Models\Level;
use App\Models\SchoolVenue;
use App\Models\SchoolVenueFacility;
use App\Models\CoachDetail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportCourses;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cms');
    }

    public function index()
    {
        $course_type = CourseType::get();
        $levels = Level::get();
        $venues = SchoolVenue::get();
        $coaches = CoachDetail::get();
        $coaches = $coaches->map(function ($coach) {
            return ['id' => $coach->id,'name' => $coach->user->name];
        });

        return view('theme::admin.course-module.list', ['course_types' => $course_type, 'levels' => $levels, 'venues' => $venues, 'coaches' => $coaches]);
    }

    public function viewClass(Request $request, $package_id)
    {
        $course_package = CoursePackage::where('id', $package_id)->first();

        if(!$course_package) {
            return back()->with([
                'success' => false,
                'message' => 'Course Package not found. Please try again.',
                'message_type' => 'danger'
            ]);
        }

        $classes = CourseClass::where('package_id', $course_package->id)->get();
        $coaches = CourseInstructor::where('course_id', $course_package->course->id)->get();

        return view('theme::admin.course-module.class', ['classes' => $classes, 'course_package' => $course_package, 'coaches' => $coaches]);
    }

    public function listCourse(Request $request)
    {
        $coursePackages = CoursePackage::get();

        $data = $coursePackages->map(function ($coursePackage) {

            $courseInstructors = CourseInstructor::where('course_id', $coursePackage->course->id)->get();

            $coaches = $courseInstructors->map(function ($coach) {
                return $coach->coachDetail->user->name;
            });

            $string = $coursePackage->course->level->name;

            // Split the string into an array of words
            $words = str_word_count($string, 1);

            // Iterate through the words and extract the first letter
            $firstLetters = array_map(function ($word) {
                return substr($word, 0, 1);
            }, $words);

            // Convert the first letters array to a string
            $firstLettersString = strtoupper(implode('', $firstLetters));

            $course_code = $coursePackage->schoolVenue->name.'-'.$firstLettersString.'-'.str_pad($coursePackage->course->id, 5, "0", STR_PAD_LEFT);

            // if(auth()->user()->role->name != 'superadmin')
            // {
            //     if($coursePackage->course->course_status != 'deleted') {
            //         return [
            //             'course_id' => $coursePackage->course->id,
            //             'package_id' => $coursePackage->id,
            //             'course_code' => $course_code,
            //             'course_level' => $coursePackage->course->level->name,
            //             'class_size' => $coursePackage->course->course_size,
            //             'venue' => $coursePackage->schoolVenue->name,
            //             'facility' => $coursePackage->schoolVenueFacility->name,
            //             'total_fee' => $coursePackage->course->course_full_price ?? 0.00,
            //             'coaches' => implode(", ", $coaches->toArray()),
            //             'status' => $coursePackage->course->course_status
            //         ];
            //     }

            //     return;
            // }

            return [
                'course_id' => $coursePackage->course->id,
                'package_id' => $coursePackage->id,
                'course_code' => $course_code,
                'course_level' => $coursePackage->course->level->name,
                'class_size' => $coursePackage->course->course_size,
                'venue' => $coursePackage->schoolVenue->name,
                'facility' => $coursePackage->schoolVenueFacility->name,
                'total_fee' => $coursePackage->course->course_full_price ?? 0.00,
                'coaches' => implode(", ", $coaches->toArray()),
                'status' => $coursePackage->course->course_status
            ];

        });

        return response()->json([
                'data' => $data,
                'success' => true,
                'message' => 'Courses Retrieved.',
            ]);
    }

    public function getCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please try again.',
            ]);
        }

        $course = Course::where('id', $request->course_id)->first();

        if(!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found. Please try again.',
            ]);
        }

        return response()->json([
                'data' => $course,
                'success' => true,
                'message' => 'Course retrieved successfully.',
            ]);
    }

    public function getCoursePackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please try again.',
            ]);
        }

        $course_package = CoursePackage::where('id', $request->package_id)->first();

        if(!$course_package) {
            return response()->json([
                'success' => false,
                'message' => 'Course Package not found. Please try again.',
            ]);
        }

        $course = Course::where('id', $course_package->course_id)->first();
        $venue = SchoolVenue::where('id', $course_package->venue)->first();
        $facility = schoolVenueFacility::where('id', $course_package->facility)->first();

        $data = [
            'course_package' => $course_package,
            'course' => $course,
            'venue' => $venue,
            'facility' => $facility
        ];

        return response()->json([
                'data' => $data,
                'success' => true,
                'message' => 'Course package retrieved successfully.',
            ]);
    }

    public function addCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'course_name' => 'required|string',
            // 'course_abbr' => 'required|string',
            'class_full_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            // 'course_full_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            // 'course_sale_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'course_size' => 'required|integer',
            'course_status' => 'required|string',
            'course_remarks' => 'string',
            'course_level' => 'required|integer',

            'course_type' => 'required|integer',
            'venue' => 'required|integer',
            'facility' => 'required|integer'

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->with([
                'success' => false,
                'message' => 'Validation failed. Please try again.<br>'. implode(', ', $errors),
                'message_type' => 'danger'
            ]);
        }

    	$course = new Course;
    	// $course->course_name = $request->course_name;
    	// $course->course_abbreviation = $request->course_abbr;
    	$course->class_full_price = $request->class_full_price;
    	// $course->course_full_price = $request->course_full_price;
    	// $course->course_sale_price = $request->course_sale_price;
    	$course->course_size = $request->course_size;
    	$course->course_status = $request->course_status;
    	$course->course_remarks = $request->course_remarks;
        $course->course_level = $request->course_level;
    	$course->save();

    	$course_package = new CoursePackage;
    	$course_package->course_id = $course->id;
    	$course_package->course_type = $request->course_type;
    	$course_package->venue = $request->venue;
    	$course_package->facility = $request->facility;
    	$course_package->save();

        $string = $course->level->name;

        // Split the string into an array of words
        $words = str_word_count($string, 1);
        // Iterate through the words and extract the first letter
        $firstLetters = array_map(function ($word) {
            return substr($word, 0, 1);
        }, $words);
        // Convert the first letters array to a string
        $firstLettersString = strtoupper(implode('', $firstLetters));

        $course_code = $course_package->schoolVenue->name.'-'.$firstLettersString.'-'.str_pad($course->id, 5, "0", STR_PAD_LEFT);

        $course->course_name = $course_code;
        $course->course_abbreviation = $course_code;
        $course->save();

    	foreach ($request->course_coaches as $key => $coach_id) {
    		$course_coach = new CourseInstructor;
	    	$course_coach->course_id = $course->id;
	    	$course_coach->coach_id = $coach_id;
	    	$course_coach->save();
    	}
    	
        $total_fee = 0;
    	foreach ($request->course_class as $key => $class) {
    		$course_class = new CourseClass;
    		// $course_class->class_name = is_array($class) ? $class['class_name'] : $class->class_name;
    		$course_class->package_id = $course_package->id;
    		$course_class->class_date = is_array($class) ? $class['class_date'] : $class->class_date;
    		$course_class->class_start = is_array($class) ? $class['class_start'] : $class->class_start;
    		$course_class->class_end = is_array($class) ? $class['class_end'] : $class->class_end;
    		$course_class->save();

            $course_class->class_name = $course_code . '-' . str_pad($course_class->id, 5, "0", STR_PAD_LEFT);
            $course_class->save();

            $total_fee += $request->class_full_price;
    	}

        $course->course_full_price = $total_fee;
        $course->save();

        return back()->with([
                'success' => true,
                'message' => 'Course added successfully.',
                'message_type' => 'success'
            ]);
    }

    public function addBulkCourse(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            $file = $request->file('excel_file');

            // Process the Excel file
            Excel::import(new ImportCourses, $file);

            // Optionally, you can return a response or redirect after processing
            return response()->json(['success' => true, 'message' => 'File uploaded and processed successfully']);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded']);
    }

    public function updateCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'course_id' => 'required|integer',
            // 'course_name' => 'required|string',
            // 'course_abbr' => 'required|string',
            'class_full_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            // 'course_full_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            // 'course_sale_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'course_size' => 'required|integer',
            'course_status' => 'required|string',
            'course_remarks' => 'string',
            'course_level' => 'required|integer',

            'course_type' => 'required|integer',
            'venue' => 'required|integer',
            'facility' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return back()->with([
                'success' => false,
                'message' => 'Validation failed. Please try again.',
                'message_type' => 'danger'
            ]);
        }

        $course = Course::where('id', $request->course_id)->first();

        if(!$course) {
            return back()->with([
                'success' => false,
                'message' => 'Course not found. Please try again.',
                'message_type' => 'danger'
            ]);
        }

        // $course->course_name = $request->course_name;
        // $course->course_abbreviation = $request->course_abbr;
        $course->class_full_price = $request->class_full_price;
        // $course->course_full_price = $request->course_full_price;
        // $course->course_sale_price = $request->course_sale_price;
        $course->course_size = $request->course_size;
        $course->course_status = $request->course_status;
        $course->course_remarks = $request->course_remarks;
        $course->course_level = $request->course_level;
        $course->save();

        CoursePackage::where('course_id', $course->id)->delete();

        $course_package = new CoursePackage;
        $course_package->course_id = $course->id;
        $course_package->course_type = $request->course_type;
        $course_package->venue = $request->venue;
        $course_package->facility = $request->facility;
        $course_package->save();

        $string = $course->level->name;

        // Split the string into an array of words
        $words = str_word_count($string, 1);
        // Iterate through the words and extract the first letter
        $firstLetters = array_map(function ($word) {
            return substr($word, 0, 1);
        }, $words);
        // Convert the first letters array to a string
        $firstLettersString = strtoupper(implode('', $firstLetters));

        $course_code = $course_package->schoolVenue->name.'-'.$firstLettersString.'-'.str_pad($course->id, 5, "0", STR_PAD_LEFT);

        $course->course_name = $course_code;
        $course->course_abbreviation = $course_code;
        $course->save();

        CourseInstructor::where('course_id', $course->id)->delete();

        foreach ($request->course_coaches as $key => $coach_id) {
            $course_coach = new CourseInstructor;
            $course_coach->course_id = $course->id;
            $course_coach->coach_id = $coach_id;
            $course_coach->save();
        }
        
        CourseClass::where('package_id', $course_package->id)->delete();

        $total_fee = 0;
        foreach ($request->course_class as $key => $class) {
            $course_class = new CourseClass;
            // $course_class->class_name = is_array($class) ? $class['class_name'] : $class->class_name;
            $course_class->package_id = $course_package->id;
            $course_class->class_date = is_array($class) ? $class['class_date'] : $class->class_date;
            $course_class->class_start = is_array($class) ? $class['class_start'] : $class->class_start;
            $course_class->class_end = is_array($class) ? $class['class_end'] : $class->class_end;
            $course_class->save();

            $course_class->class_name = $course_code . '-' . str_pad($course_class->id, 5, "0", STR_PAD_LEFT);
            $course_class->save();

            $total_fee += $request->class_full_price;
        }

        $course->course_full_price = $total_fee;
        $course->save();

        return back()->with([
            'success' => true,
            'message' => 'Course updated successfully.',
            'message_type' => 'success'
        ]);
    }

    public function archieveCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id_del' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return back()->with([
                'success' => false,
                'message' => 'Validation failed. Please try again.',
                'message_type' => 'danger'
            ]);
        }

        $course_package = CoursePackage::where('id', $request->package_id_del)->first();

        if(!$course_package) {
            return back()->with([
                'success' => false,
                'message' => 'Course Package not found. Please try again.',
                'message_type' => 'danger'
            ]);
        }

        $course = Course::where('id', $course_package->course_id)->first();

        if(!$course) {
            return back()->with([
                'success' => false,
                'message' => 'Course not found. Please try again.',
                'message_type' => 'danger'
            ]);
        }

        $course->course_status = 'deleted';
        $course->save();

        $course_package->delete();

        return back()->with([
                'success' => true,
                'message' => 'Course archieved successfully.',
                'message_type' => 'success'
            ]);
    }

    public function unarchieveCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please try again.',
            ]);
        }

        $course = Course::where('id', $request->course_id)->first();

        if(!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found. Please try again.',
            ]);
        }

        $course->course_status = 'Published';
        $course->save();

        return response()->json([
                'success' => true,
                'message' => 'Course unarchieved successfully.',
            ]);
    }

    function warFunction() {
        return "hello world";
    }

}

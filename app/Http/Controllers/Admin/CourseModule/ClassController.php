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
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportCourses;

class ClassController extends Controller
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
        return view('theme::admin.course-module.classList');
    }

    public function listClass(Request $request)
    {
        $classes = CourseClass::get();

        $data = $classes->map(function ($class) {

            return [
                'class_name' => $class->id,
                'course_name' => $class->coursePackage->course->name,
                'class_date' => $class->class_date,
                'class_start' => $class->class_start,
                'class_end' => $class->class_end,
                'venue' => $class->coursePackage->schoolVenue->name
            ];

        });

        return response()->json([
                'data' => $data,
                'success' => true,
                'message' => 'Classes Retrieved.',
            ]);
    }

    public function getClass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please try again.',
            ]);
        }

        $class = CourseClass::where('id', $request->class_id)->first();

        if(!$class) {
            return response()->json([
                'success' => false,
                'message' => 'Class not found. Please try again.',
            ]);
        }

        return response()->json([
                'data' => $class,
                'success' => true,
                'message' => 'Class added successfully.',
            ]);
    }

    public function addClass(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'course_name' => 'required|string',
            'course_abbr' => 'required|string',
            'class_full_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'course_full_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'course_sale_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'course_size' => 'required|integer',
            'course_status' => 'required|string',
            'course_remarks' => 'string',
            'course_level' => 'required|integer',

            'course_type' => 'required|integer',
            'venue' => 'required|integer',
            'facility' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please try again.',
            ]);
        }

    	$course = new Course;
    	$course->course_name = $request->course_name;
    	$course->course_abbreviation = $request->course_abbr;
    	$course->class_full_price = $request->class_full_price;
    	$course->course_full_price = $request->course_full_price;
    	$course->course_sale_price = $request->course_sale_price;
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

    	foreach ($request->course_coaches as $key => $coach_id) {
    		$course_coach = new CourseInstructor;
	    	$course_coach->course_id = $course->id;
	    	$course_coach->coach_id = $coach_id;
	    	$course_coach->save();
    	}
    	
    	foreach ($request->course_class as $key => $class) {
    		$course_class = new CourseClass;
    		$course_class->class_name = is_array($class) ? $class['class_name'] : $class->class_name;
    		$course_class->package_id = $course_package->id;
    		$course_class->class_date = is_array($class) ? $class['class_date'] : $class->class_date;
    		$course_class->class_start = is_array($class) ? $class['class_start'] : $class->class_start;
    		$course_class->class_end = is_array($class) ? $class['class_end'] : $class->class_end;
    		$course_class->save();
    	}

        return response()->json([
                'success' => true,
                'message' => 'Course added successfully.',
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
            'course_name' => 'required|string',
            'course_abbr' => 'required|string',
            'class_full_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'course_full_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'course_sale_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'course_size' => 'required|integer',
            'course_status' => 'required|string',
            'course_remarks' => 'string',
            'course_level' => 'required|integer',

            'course_type' => 'required|integer',
            'venue' => 'required|integer',
            'facility' => 'required|integer'

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

        $course->course_name = $request->course_name;
        $course->course_abbreviation = $request->course_abbr;
        $course->class_full_price = $request->class_full_price;
        $course->course_full_price = $request->course_full_price;
        $course->course_sale_price = $request->course_sale_price;
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

        CourseInstructor::where('course_id', $course->id)->delete();

        foreach ($request->course_coaches as $key => $coach_id) {
            $course_coach = new CourseInstructor;
            $course_coach->course_id = $course->id;
            $course_coach->coach_id = $coach_id;
            $course_coach->save();
        }
        
        CourseClass::where('package_id', $course_package->id)->delete();

        foreach ($request->course_class as $key => $class) {
            $course_class = new CourseClass;
            $course_class->class_name = is_array($class) ? $class['class_name'] : $class->class_name;
            $course_class->package_id = $course_package->id;
            $course_class->class_date = is_array($class) ? $class['class_date'] : $class->class_date;
            $course_class->class_start = is_array($class) ? $class['class_start'] : $class->class_start;
            $course_class->class_end = is_array($class) ? $class['class_end'] : $class->class_end;
            $course_class->save();
        }

        return response()->json([
                'success' => true,
                'message' => 'Course updated successfully.',
            ]);
    }

    public function archieveCourse(Request $request)
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

        $course->course_status = 'deleted';
        $course->save();

        return response()->json([
                'success' => true,
                'message' => 'Course archieved successfully.',
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
}

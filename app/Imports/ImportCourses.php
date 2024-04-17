<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Course;
use App\Models\CoursePackage;
use App\Models\CourseInstructor;
use App\Models\CourseClass;
use Carbon\Carbon;

class ImportCourses implements ToCollection
{
	protected $processedData = [];

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //

        foreach ($collection as $row) {
            // Process and save each row of data to the database or perform actions as needed
            // Example:
            $course = new Course([
                'course_name' => $row[0], 
                'course_abbreviation' => $row[1], 
                'class_full_price' => $row[2], 
                'course_full_price' => $row[3],
                'course_sale_price' => $row[4], 
                'course_size' => $row[5],
                'course_status' => $row[6], 
                'course_remarks' => $row[7],
                'course_level' => $row[8],    
            ]);
            $course->save();

            $course_package = new CoursePackage([
            	'course_id' => $course->id,
            	'course_type' => $row[9],
                'venue' => $row[10], 
                'facility' => $row[11],
            ]);
            $course_package->save();

            $course_coach = new CourseInstructor([
            	'course_id' => $course->id,
            	'coach_id' => $row[12],
            ]);
            $course_coach->save();

            $formattedDate = Carbon::createFromDate(1900, 1, 1)->addDays($row[14] - 2)->format('Y-m-d');

            $course_class = new CourseClass([
            	'class_name' => $row[13],
            	'package_id' => $course_package->id,
            	'class_date' => $formattedDate,
                'class_start' => $row[15],
                'class_end' => $row[16],
            ]);
            $course_class->save();
      
        }
    }

    public function rules(): array
	{
	    return [
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
	    ];
	}
}

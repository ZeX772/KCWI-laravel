<?php

namespace App\Http\Controllers\Admin\FAQManagement;

use App\Http\Controllers\Controller;
use App\Models\Faq_Table;
use Illuminate\Http\Request;


class Admin_Faq_Web_Controller extends Controller
{
    
    //list question function
    public function listQuestions(){
        // Fetch FAQs from the database or any other source  
        $faqs = Faq_Table::all();   // Adjust this based on your Eloquent model
        // Pass the data to the view
        return view('themes.tailwind.admin.faq-module.list', compact('faqs'));
    }


    //add question function
    public function addQuestion(Request $request){

        try{
            //validate the request
            $this->validate($request, [
                //title of FAQ
                'question' => 'required|string',
                //content of FAQ
                'answer' => 'required|string'
            ]);

            //Retrieve the input data from the request
            $question = $request->input('question');
            $answer = $request->input('answer');

            //store the input data in the database using the Faq_Table model
            Faq_Table::create([
                'question' => $question,
                'answer' => $answer,
            ]);

            return redirect()->route('cms.faq-list');


        }catch(\Illuminate\Validation\ValidationException $e){
            //handle validation error
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        }catch(\Exception $e){
            //handle other errors
            return response()->json(['message' => 'Error adding question' . $e->getMessage()], 500);
        }

    }

    public function deleteQuestion($id){

        try{
            //Find the FAQ by Id
            $faq = Faq_Table::findOrFail($id);

            //Delete the FAQ
            $faq->delete();

            //Return a response indicating success
            return response()->json(['message' => 'FAQ deleted succesfully']);

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            //FAQ not found
            return response()->json(['message' => 'FAQ not found'], 404);
        }catch(\Exception $e){
            //Other unexpected errors
            return response()->json(['message' => 'Error deleting FAQ'], 500);
        }

    }


    //update question
    public function updateQuestion($id, Request $request){

        try{
            //validate the request
            $this->validate($request, [
                'question' => 'required|string',
                'answer' => 'required|string',
            ]);

            //update the FAQ in the database
            Faq_Table::where('id', $id)->update($request->all());

            //retrieve the updated FAQ data
            $updatedFaq = Faq_Table::find($id);

            // If the Question doesn't exist, return a 404 response
            if (!$updatedFaq) {
                return response()->json(['message' => 'Question not found'], 404);
            }

            //return a response indicating success along with the updated FAQ data
            return response()->json(['message' => 'FAQ updated succesfully', 'data' => $updatedFaq]);

        }catch(\Illuminate\Validation\ValidationException $e){
            //validation failed
            return response()->json(['message' => 'validation failed', 'errors' => $e->errors()], 422);

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            //FAQ not found
            return response()->json(['message' => 'FAQ not found'], 404);
        }catch(\Exception $e){
            //other unexpected errors
            return response()->json(['message' => 'Error updating FAQ'], 500);
        }
    }

    //get question by id
    public function getQuestionById($id)
    {
        try {
            // Retrieve the question by ID
            $question = Faq_Table::findOrFail($id);

            // Return the question as JSON
            return response()->json(['message' => 'Question retrieved successfully', 'data' => $question]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If the question is not found, return a 404 response
            return response()->json(['message' => 'Question not found'], 404);
        } catch (\Exception $e) {
            // Handle other unexpected errors
            return response()->json(['message' => 'Error retrieving question'], 500);
        }
    }



    
        
}

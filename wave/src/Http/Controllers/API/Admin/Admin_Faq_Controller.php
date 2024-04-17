<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq_Table;

class Admin_Faq_Controller extends Controller{

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
            $faq = Faq_Table::create([
                'question' => $question,
                'answer' => $answer,
            ]);

            //process the input data and perform any other actions
            return response()->json([
                'message' => 'Input received succesfully',
                'data' => [
                    'id' => $faq->id,
                    'question' => $question,
                    'answer' => $answer,
                    'created_at' => $faq->created_at,
                    'updated_at' => $faq->updated_at,
                ]

            ]);

        }catch(\Illuminate\Validation\ValidationException $e){
            //handle validation error
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        }catch(\Exception $e){
            //handle other errors
            return response()->json(['message' => 'Error adding question' . $e->getMessage()], 500);
        }

    }

    //list question
    public function listQuestion(){

        //try and catch block to handle error when retrieving faq_table
        try{
            //retrieve all the record from the database
            $faqlist = Faq_Table::all();

            //check if the faq_table is empty
            if($faqlist->isEmpty()){
                //return a JSON response with a message indicating that the faq_table is empty
                return response()->json(['message' => 'The faq_table is empty']);
            }

        }catch(\Exception $e){
            //return a JSON response with an error message
            return response()->json(['message' => 'Error retrieving faq_table records'], 500);
        }

        //return a JSON response with the faqlist data
        return response()->json(['data'=>$faqlist]);
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

    //delete question
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
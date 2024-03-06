<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Family;
use Exception;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
     //

     public function deleteExperience($id)
     {

          try {

               $data = Experience::find($id);
               $data->delete();

               return response()->json(['message' => 'Request processed successfully']);
          } catch (Exception $e) {
               return response()->json(['error' => 'An unexpected error occurred'], 500);
          }
     }
     public function deleteEducation($id)
     {

          try {

               $data = Education::find($id);
               $data->delete();

               return response()->json(['message' => 'Request processed successfully']);
          } catch (Exception $e) {
               return response()->json(['error' => 'An unexpected error occurred'], 500);
          }
     }
     public function deleteFamily($id)
     {

          try {

               $data = Family::find($id);
               $data->delete();

               return response()->json(['message' => 'Request processed successfully']);
          } catch (Exception $e) {
               return response()->json(['error' => 'An unexpected error occurred'], 500);
          }
     }
}

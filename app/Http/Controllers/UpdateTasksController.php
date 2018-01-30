<?php

namespace App\Http\Controllers;
use App\AdminTasks;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class UpdateTasksController extends Controller
{

    public function newupdate(Request $request, $id)
    {
        $this->validate($request, [
            'worknature' => '',
            'onskills' => '',
            'worktitle' => '',
            'workdescription' => '',
            'whatinitforme' => '',
            'usercredits' => '',
            'guidecredits' => '',
            'reviewercredits' => '',
            'uploads'=>'',
        ]);
        $product = new AdminTasks($request->file());
     
        if($file = $request->hasFile('uploads')) {
            return 'It has uploads' . $file;
           
           $file = $request->file('uploads');           
           $fileName = $file->getClientOriginalName();
           $destinationPath = public_path().'/uploads/';
           $file->move($destinationPath,$fileName);

           $file = public_path().'/uploads/'.$fileName;

            $requestData = $request->all();
            $requestData['uploads'] = $file;
            // $product->uploads = $file;        
        }else{
            $requestData = $request->all();
            return 'It has no uploads' ;
        }
        // return $requestData ;
        // AdminTasks::find($id)->update($requestData);
        // return redirect()->route('AdminTasks.index')
        //                 ->with('success','AdminTasks updated successfully');
    }





}

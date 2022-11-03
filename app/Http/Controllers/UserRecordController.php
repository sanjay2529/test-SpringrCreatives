<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user_record;
use App\Http\Requests;
use App\Http\Requests\Updateuser_recordRequest;
use DateTime;
class UserRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_record = user_record::all();
         // dd($user_record);
       return view('welcome',compact('user_record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeuser_recordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $file=$request->file('profile_img');          
        $file_name = $file->getClientOriginalName();   
        $file->getClientOriginalExtension();
        $file->getRealPath();
        $file->getSize();
        $file->getMimeType();
        $destinationPath = 'images';
        $file->move($destinationPath,$file->getClientOriginalName());
        $file_path='/images/'.$file_name;
        $data = $request->input();
        if (isset($data['Still_Working'])) {
            $stillworking=$data['Still_Working'];
            $leavedate=date("Y-m-d");
        }else{
            $stillworking="false";
            $leavedate=$data['date_of_leaving'];
        }
        $user_record = new user_record;
        $user_record->email_id = $data['email'];
        $user_record->name = $data['name'];
        $user_record->joindate = $data['date_of_joining'];
        $user_record->leavedate = $leavedate;
        $user_record->stillwork = $stillworking;
        $user_record->profile_img =  $file_path;
        $user_record->save();
       return back()->with('success','File has been uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_record  $user_record
     * @return \Illuminate\Http\Response
     */
    public function show(user_record $user_record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_record  $user_record
     * @return \Illuminate\Http\Response
     */
    public function edit(user_record $user_record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_recordRequest  $request
     * @param  \App\Models\user_record  $user_record
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_recordRequest $request, user_record $user_record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_record  $user_record
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = user_record::where('id', $user_id)->firstorfail()->delete();
          echo ("User Record deleted successfully.");
          return back()->with('success','User Record deleted successfully.');
    }
}

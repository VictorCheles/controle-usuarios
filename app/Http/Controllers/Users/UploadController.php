<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Upload;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->files = new Upload();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($file,$user_id)
    {
        if($consulta = $this->files->where('user_id',$user_id)->first()){
            return $this->update($file,$consulta->id);
        }
        $this->files->url = $file->store('user_id_'.$user_id.'_'.uniqid(),'public');
        $this->files->user_id = $user_id;
        
        if($this->files->save()){
            return true;
        }
            return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = Upload::find($id);

        if(!$file){
            return response()->json(['errors' =>['error' =>'Nenhuma imagem localizada']], 400);
        }
        return response()->file(Storage::path($file->url));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($file, $id)
    {   
        $upload = Upload::find($id);

        if($upload->url !== null){
            $this->fileDelete($upload->url);
        }
        
        $upload->fill([
            'url' => $file->store('user_id_'.$upload->user_id.'_'.uniqid(),'public'),
            'user_id' => $upload->user_id
        ]);

        if($upload->save()){
            return true;
        }
            return false; 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        
        $photo = Upload::where('user_id',$user_id)->first();

        if($photo == null){
            return true;
        }

        $file_url = $photo->url;

        if($photo->delete() && $this->fileDelete($file_url)){

            return true;
        }

        return false;
    }

    public function fileDelete($file_url){

        if(!Storage::disk('public')->delete($file_url)){
            return false;
        }

        $dir = explode('/',$file_url);

        if(!Storage::disk('public')->deleteDirectory($dir[0])){
            return false;
        }

        return true;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Style;
use App\Models\StyleAttachment;
use Illuminate\Support\Facades\DB;

class StyleAttachmentController extends Controller{
    
    public function index(){

        $attachments = DB::table('style_attachments as sa')
        ->join('styles as s','s.id','=','sa.style_id')
        ->select('sa.id','s.code as style','sa.attachment')
        ->paginate(5);
        return view("pages.style_attachment.index",['attachments'=>$attachments]);
    }

    
    public function create(){
        $Style = Style::all();
        return view("pages.style_attachment.create",['Style'=>$Style]);
    }

    
    public function store(Request $request){

        //Validate Data
        $request->validate([
            'StyleId' => 'required|exists:styles,id',
            'attachment'=>'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Image Upload
        $attachmentName = time().'.'.$request->attachment->extension();
        $request->attachment->move(public_path('img'),$attachmentName);

        $SAttachment = new StyleAttachment;
        $SAttachment->attachment = $attachmentName;
        $SAttachment->style_id = $request->StyleId;

        $SAttachment->save();
        
        return back()->with('success','Created Successfully.');
    }

   
    public function show(string $id){
        $attachment = StyleAttachment::where('id',$id)->first();
        return view("pages.style_attachment.show",['attachment'=>$attachment]);
    }

   
    public function edit(string $id){
        $attachment = StyleAttachment::where('id',$id)->first();
        $style = Style::all();
        return view("pages.style_attachment.edit",['attachment'=>$attachment,'style'=>$style]);
    }

    
    public function update(Request $request, string $id){

        //Validate Data
        $request->validate([
            'StyleId' => 'required|exists:styles,id',
            'attachment'=>'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $SAttachment = StyleAttachment::where('id',$id)->first();

        //Image Upload
        if(isset($request->attachment)){
            $attachmentName = time().'.'.$request->attachment->extension();
            $request->attachment->move(public_path('img'),$attachmentName);
            $SAttachment->attachment = $attachmentName;
        };

        $SAttachment->style_id = $request->StyleId;
        $SAttachment->update();
        
        return back()->with('success','Updated Successfully.');
    }


    
    public function destroy(string $id){
        $SAttachment = StyleAttachment::where('id',$id)->first();
        $SAttachment->delete();

        return back()->with('success','Deleted Successfully.');
    }
    
}

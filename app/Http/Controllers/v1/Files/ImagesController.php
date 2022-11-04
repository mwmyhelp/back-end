<?php

namespace App\Http\Controllers\v1\Files;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\v1\Documents\Document;
use App\Models\v1\Files\FileObject;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Api;

class ImagesController extends Controller
{
    use ApiResponseHelpers;
    /**
     * Upload image to a document
     * This upload adaptor it's made for work with CKEditor 5
     */
    public function uploadToDocument(Document $document, Request $request){
        /**
         * TODO :: Validation of permission and access
         */
        // Get the File from de Request
        $file = $request->file('upload');
        // Get the File Contents
        $content = \Illuminate\Support\Facades\File::get($file);
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        // Get User Info
        $bee_account_id = \Auth::user()->bee_account_id;
        // Create Database Item
        $fileObject = new FileObject();
        // Fill data
        $fileObject->bee_account_id = $bee_account_id;
        $fileObject->document_id = $document->id;
        $fileObject->uploaded_by = \Auth::id();
        $fileObject->filetype = "document_image";
        $fileObject->title = $fileName;
        $fileObject->file_name = $fileName;
        $fileObject->file_extension = $fileExtension;
        $fileObject->file_size = $fileSize;
        // Save
        $fileObject->save();
        // Store data on Digital Ocean
        $path = "files/".$bee_account_id."/".$fileObject->id.".".$fileExtension;
        \Storage::disk('digitalocean')->put($path,$content);
        // Update the Object on Database
        $fileObject->src = $path;
        // Save Again
        $fileObject->save();
        // Return to CKEditor in their structure like in: https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/simple-upload-adapter.html
        return json_encode(["url" => "https://api.beeapp.com.br/v1/files/get/".$fileObject->id]);

    }

}

<?php

namespace App\Http\Controllers\v1\Files;

use App\Http\Controllers\Controller;
use App\Models\v1\Documents\Document;
use App\Models\v1\Files\FileObject;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    use ApiResponseHelpers;

    /**
     * Upload a File to a Document
     * This uploader works with a Sweet Alert File Input
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
        $fileObject->filetype = "document_file";
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
        // Return a api response
        return $this->respondWithSuccess($fileObject);
    }
    /**
     * Get just one file, with it mimetype
     */
    public function getFile(FileObject $file, Request $request){
        // TODO :: Some Validation in the access... but for now, just let the people get the files

        /**
         * Check the existence of the file
         */
        if(\Storage::disk('digitalocean')->exists($file->src)){
            /**
             * File Exist, get some data
             */
            // Get File Contents
            $contents = \Storage::disk('digitalocean')->get($file->src);
            // Get Mime Type
            $mimeType = \Storage::disk('digitalocean')->mimeType($file->src);
            // Returning a response for this call
            return Response::make($contents, 200)->header("Content-Type", $mimeType);
        }else{
            exit(404);
        }

        /**
         * Safe exit
         */
        exit(404);
    }
    /**
     * Get file list of this document (excep for images)
     */
    public function getFiles(Document $document, Request $request){
        // Returning a list of files
        return $this->respondWithSuccess($document->getFilesByType());
    }
    /**
     * Remove a file from a document
     */
    public function removeFile(Document $document, FileObject $file){
        // Check if File belongs do Document
        if($file->document_id != $document->id){
            // Error
            return $this->respondForbidden("Requisição inválida");
        }
        // Delete file from Disk
        if(\Storage::disk("digitalocean")->delete($file->src)){
            // Deleted, remove database reg
            $file->delete();
            // Return
            return $this->respondOk("Removido com sucesso");
        }
        // Respond error
        return $this->respondNoContent();
    }
}

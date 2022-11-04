<?php

namespace App\Http\Controllers\v1\Documents;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Documents\Document\documentActionsRequest;
use App\Models\v1\Documents\Document;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;

/**
 * This controller is responsible for actions and validations of Documents (Saved in Cloud)
 */

class DocumentController extends Controller
{
    // Use API Helpers
    use ApiResponseHelpers;
    /**
     * Method to get the document info and document file by his uuid
     */
    public function getDocument(Document $document, documentActionsRequest $request){
        // By default, document do not append the File Data, we have to do it
        $document->append(['html_file_data','author']);
        $document->makeHidden('creator'); // We do not need this info
        // Return the api response
        return $this->respondWithSuccess($document);
    }

    /**
     * Method to save changes on document
     */
    public function saveChanges(Document $document, documentActionsRequest $request){
        // Get Validated data
        $v = $request->validated();
        // Make a transaction
        \DB::beginTransaction();
        try {
            // Let's update the html file
            $document->updateHtmlFile($v['html_data']);
            $document->titulo = $v['title']; // TODO :: Replace for "title"
            // Save
            $document->save();
            // Commit
            \DB::commit();
            // Return positive
            return $this->respondOk("Updated");

        }catch (\Exception $exception){
            \DB::rollBack();
            // Return error
            return $this->respondError($exception->getMessage());
        }
        // Return error
        return $this->respondNoContent();
    }

    /**
     * Method to get all the documents based on a filter
     */
    public function allDocuments(){}
}

<?php

/**
 * We will separate the Old API and the New API Routes
 */

// v1 Controllers
use App\Http\Controllers\v1 as V1;
use Illuminate\Support\Facades\Route;

/** Group all on API Namespace */
Route::group(['namespace' => 'Api'], function () {

    /**
     * These routes don't need to auth
     */

    Route::prefix('files')->group(function(){
        /**
         * Those files routes don't need auth... but we have to think about security breachs
         */


        /**
         * Get Files (Just Get, not Download)
         */
        Route::get('get/{file}',[V1\Files\FileController::class,'getFile']);
    });

    /**
     * These routes need to auth
     **/
    Route::middleware('auth:api')->group(function () {
        /**
         * Routes for User Controller
         */

        // Users ????

        /**
         * Routes for Documents Controller
         */
        Route::prefix('documents')->group(function () {
            /**
             * Get Filtered Documents
             */
            // GET
            /**
             * Load Existing and Validated Document
             */
            Route::prefix('{document}')->group(function () {
                /**
                 * Get the document
                 */
                Route::get('', [V1\Documents\DocumentController::class, 'getDocument']);
                /**
                 * Save changes on Document
                 */
                Route::put('',[V1\Documents\DocumentController::class, 'saveChanges']);
            });
        });

        /**
         * Routes for File Manager
         */
        Route::prefix('files')->group(function(){
            /**
             * Manage Images
             */
            Route::prefix('images')->group(function(){
                /**
                 * Images for Documents
                 */
                Route::prefix('docs/{document}')->group(function(){
                    // Upload a Image
                    Route::post('upload',[V1\Files\ImagesController::class,'uploadToDocument']);
                });
            });

            /** Manage General Files **/
            Route::prefix('docs/{document}')->group(function(){
                // Upload a Image
                Route::post('upload',[V1\Files\FileController::class,'uploadToDocument']);
                // File List of this document
                Route::get('files',[V1\Files\FileController::class,'getFiles']);
                // Remove a File
                Route::delete('files/{file}',[V1\Files\FileController::class,'removeFile']);
            });

        });
    });

});

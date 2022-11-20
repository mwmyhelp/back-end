<?php

namespace App\Models\v1\Documents;

use App\Models\v1\Files\FileObject;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The model for the Document Object on Database
 */
class Document extends Model
{
    use HasFactory;
    use Uuids;

    // Define the Table
    protected $table = 'bee_doc';
    // Fillable fields
    protected $fillable = ['bee_conta', 'tipo', 'titulo', 'url_capa', 'emoji', 'status'];
    // Deprecated Hidden Fields
    protected $hidden = ['conteudo_publicado', 'conteudo_edicao', 'url_capa', 'titulo', 'bee_conta', 'tipo'];

    /**
     * Custom Attributes
     */
    // Get the main file path
    public function getHtmlFilePathAttribute()
    {
        // Main folder is beedocs, than de account id, than temporary the "preversion", at least the doc id with bap extension
        return "/beedocs/" . $this->bee_account_id . "/preversion/" . $this->id . ".bap";
    }

    // Get the main file
    public function getHtmlFileDataAttribute()
    {
        /**
         * Return the HTML content, loaded from the file
         */
        // Check if the file exists
        if (\Storage::disk('digitalocean')->exists($this->html_file_path)){
            $file = \Storage::disk('digitalocean')->get($this->html_file_path);
            // Check if the file is already in base64 (it's a migration v1 api problem)
            if($this->isBase64($file)){
                // Return the $file
                return $file;
            }
            // Let's encode before return
            return base64_encode($file);
        }
        // Return a empty data
        return "";
    }

    // Get few attributes as Author
    public function getAuthorAttribute(){
        if($this->creator){
            // Get only identification data
            return $this->creator->asAuthor();
        }else{
            // Get none
            return (object) [
                'id' => '0',
                'name' => 'Desconhecido',
                'image' => 'unknow'
            ];
        }
    }

    /**
     * Relationships
     */
    public function creator(){
        return $this->hasOne('App\Models\User','id','created_by'); // TODO :: Change to author_user_id
    }

    /**
     * Inner functions
     */
    private function isBase64($s)
    {
        // Check if have base64 characters
        if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $s))
            return true;

        // don't have
            return false;

    }

    public function updateHtmlFile($contents){
        /**
         * Save the $contents to the default file
         */
        // We don't need to check if file exists... if it's have a valid reg, must have a valid file.
        $handler = \Storage::disk('digitalocean')->put($this->html_file_path, base64_encode($contents));
        // Return the Handler
        return $handler;
    }

    public function getFilesByType($type = 'document_file'){
        /**
         * Get a list of file based on this document
         */
        return FileObject::select(['id','filetype','title','file_name','file_extension','file_size'])->where('document_id',$this->attributes['id'])->where('filetype',$type)->get();
    }
    /**
     * Deprecated:
     * The columns bee_conta tipo, titulo, url_capa will change in the future for english terms.
     * But for now we will use alias to already code in the new structure
     */

    // Set the map to use the english terms
    protected $maps = [
        'bee_conta' => 'bee_account_id',
        'tipo' => 'doctype',
        'titulo' => 'title',
        'url_capa' => 'cover_url'
    ];
    // Append the new terms on results
    protected $appends = ['bee_account_id', 'doctype', 'title', 'cover_url'];

    // Functions to Map the Get
    public function getBeeAccountIdAttribute()
    { // Bee Account ID
        return $this->attributes['bee_conta'];
    }

    public function getDoctypeAttribute()
    { // Document Type
        return $this->attributes['tipo'];
    }

    public function getTitleAttribute()
    { // Document Title
        return $this->attributes['titulo'];
    }

    public function getCoverUrlAttribute()
    { // Document Cover Image URL
        return $this->attributes['url_capa'];
    }

    /**
     * End Deprecated Session ↑↑↑↑↑
     */


}

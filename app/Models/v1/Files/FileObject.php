<?php

namespace App\Models\v1\Files;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileObject extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    protected $table = 'file_manager';
    protected $fillable = ['id','created_at','updated_at','deleted_at','bee_account_id','document_id','uploaded_by','src','filetype','title','description','file_name','file_extension','file_size'];

    protected $appends = ['permlink'];

    /**
     * Custom Attribute
     */

    public function getPermlinkAttribute(){
        // Return the FILE URL
        return "https://api.mwmyhelp.com.br/v1/files/get/".$this->attributes['id'];
    }


}

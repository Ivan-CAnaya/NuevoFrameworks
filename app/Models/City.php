<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    protected $table = 'city';

    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'state_id'
    ];

    public function state(){
        return $this->belongsTo('State');
    }

    public function person(){
        return $this->hasOne('Person');
    }
}

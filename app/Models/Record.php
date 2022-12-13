<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Record extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function recordSearch() 
    {
        $today = date('Y-m-d');
        $id = Auth::id();
        $records = Day::with('record')->where('user_id', Auth::id())
                                      ->where('status', 1)
                                      ->whereDate('day', date('Y-m-d'))
                                      ->get();


        $records = Record::where('user_id', $id)->where('created_at', 'like', '%' . $today . '%')->get();
        // dd($records);
        
        return $records;
    }
    
    public function days()
    {
      return $this->hasMany('App\Models\Day');
    }
}

<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class BlogPosts extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'markdown'
    ]
}

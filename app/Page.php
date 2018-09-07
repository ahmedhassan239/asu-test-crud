<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = ['id', 'title_en', 'title_ar', 'body_en', 'body_ar', 'page_link', 'tags_en', 'tags_ar', 'meta_desc', 'image_url', 'created_by', 'created_at', 'updated_at'];
    
}

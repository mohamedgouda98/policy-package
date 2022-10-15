<?php


namespace Unlimited\Policy\Models;


use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = ['title', 'description', 'policy_category_id'];

    public function policyCategory()
    {
        return $this->belongsTo(PolicyCategory::class, 'policy_category_id', 'id');
    }
}
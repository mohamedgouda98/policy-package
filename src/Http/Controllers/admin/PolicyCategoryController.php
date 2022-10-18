<?php


namespace Unlimited\Policy\Http\Controllers\admin;


use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Unlimited\Policy\Models\PolicyCategory;
use Illuminate\Support\Facades\Validator;

class PolicyCategoryController extends Controller
{

    public function index()
    {
        $policyCategories = PolicyCategory::get();
        return view('policyPackage::admin.policyCategory.index', compact('policyCategories'));
    }

    public function create()
    {
        return view('policyPackage::admin.policyCategory.create');
    }
    public function store()
    {
        $validator = Validator::make(request()->all(),[
            'title' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            return view('policyPackage::admin.policyCategory.create', compact('errors'));
        }

        PolicyCategory::create([
            'title' => request('title')
        ]);

        Alert::success('Policy Category', 'Policy Category Created Successfully');

        return redirect(route('policyPackage.index'));
    }

    public function edit($id)
    {
        $policyCategory = PolicyCategory::find($id);
        return ($policyCategory) ? view('policyPackage::admin.policyCategory.edit',compact('policyCategory')) : redirect()->back();
    }

    public function update()
    {
        request()->validate([
            'title' => 'required',
            'id' => 'required|exists:policy_categories,id'
        ]);

        PolicyCategory::find(request('id'))->update([
            'title' => request('title')
        ]);

        Alert::success('Policy Category', 'Policy Category Updated Successfully');

        return redirect(route('policyPackage.index'));
    }

    public function delete()
    {
        request()->validate([
            'id' => 'required|exists:policy_categories,id'
        ]);

        PolicyCategory::find(request('id'))->delete();
        Alert::success('Policy Category', 'Policy Category Deleted Successfully');

        return redirect(route('policyPackage.index'));
    }

}
<?php


namespace Unlimited\Policy\Http\Controllers\admin;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Unlimited\Policy\Models\Policy;
use Unlimited\Policy\Models\PolicyCategory;

class PolicyController extends Controller
{

    public function index()
    {
        $policies = Policy::with('policyCategory')->get();
        return view('policyPackage::admin.policy.index', compact('policies'));
    }

    public function create()
    {
        $policyCategories = PolicyCategory::get();
        return view('policyPackage::admin.policy.create', compact('policyCategories'));
    }
    public function store()
    {
        $validator = Validator::make(request()->all(),[
            'title' => 'required|min:3',
            'id' => 'required|exists:policy_categories,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            return view('policyPackage::admin.policy.create', compact('errors'));
        }

        Policy::create([
            'title' => request('title'),
            'description' => request('description'),
            'policy_category_id' => request('policy_category_id'),
        ]);

        Alert::success('Policy', 'Policy Created Successfully');

        return redirect(route('policy.index'));
    }

    public function edit($id)
    {
        $policy = Policy::find($id);
        $policyCategories = PolicyCategory::get();
        return ($policy) ? view('policyPackage::admin.policy.edit',compact('policy', 'policyCategories')) : redirect()->back();
    }

    public function update()
    {
        $validator = Validator::make(request()->all(),[
            'title' => 'required',
            'description' => 'required',
            'policy_category_id' => 'required|exists:policy_categories,id',
            'id' => 'required|exists:policies,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            $policy = Policy::find(request('id'));
            $policyCategories = PolicyCategory::get();
            return view('policyPackage::admin.policy.edit', compact(['errors', 'policy', 'policyCategories']));
        }


        Policy::find(request('id'))->update([
            'title' => request('title'),
            'description' => request('description'),
            'policy_category_id' => request('policy_category_id'),
        ]);

        Alert::success('Policy', 'Policy Updated Successfully');

        return redirect(route('policy.index'));
    }

    public function delete()
    {
        request()->validate([
            'id' => 'required|exists:policies,id'
        ]);

        Policy::find(request('id'))->delete();
        Alert::success('Policy', 'Policy Deleted Successfully');

        return redirect(route('policy.index'));
    }

}
<?php


namespace Unlimited\Policy\Http\Controllers\enduser;


use Illuminate\Routing\Controller;
use Unlimited\Policy\Models\Policy;

class PolicyEnduserController extends Controller
{

    public function index()
    {
        $policies = Policy::with('policyCategory')->get();
        return view('policyPackage::enduser.policy.policies', compact('policies'));
    }

}
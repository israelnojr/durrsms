<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Prediction;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\SubscriptionRequest;
use Symfony\Component\HttpFoundation\Session\Session;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subscriptions = Subscription::latest()->get();
        return view('admin.subscription.index', compact('subscriptions'));
    }

    public function create()
    {
        $id = Auth::user()->id;
        return view('admin.subscription.create', compact('id'));
        // return response()->json($subscriptions);
    }

    public function edit(Subscription $subscription)
    {
        $id = Auth::user()->id;
        return view('admin.subscription.edit', compact('subscription'));
    }

    public function store(SubscriptionRequest $request)
    {   
        $sub  = new Subscription();
        if($request->type == "economin_plan"){
            $sub->user_id = $request->user_id;
            $sub->type = $request->type;
            $sub->payment_type = $request->payment_type;
            $sub->amount = '50';
            $sub->started_at = Carbon::now()->addDays(7);
            $sub->save();

            if($request->payment_type == 'btc'){
                $id = Auth::user()->id;
                return view('admin.subscription.payment', compact('sub', 'id'));
            }
            else{
                $id = Auth::user()->id;
                return view('admin.subscription.payment', compact('sub', 'id'));
            }
        }
        else{
            $request->type == "first_class_plan";
            $sub->user_id = $request->user_id;
            $sub->type = $request->type;
            $sub->payment_type = $request->payment_type;
            $sub->amount = '100';
            $sub->started_at = Carbon::now()->addDays(7);
            $sub->save();

            $id = Auth::user()->id;
            return view('admin.subscription.payment', compact('sub', 'id'));
        }
    }
    public function updateImage(Request $request, Subscription $subscription)
    {
        $image = [
            'image' =>['required', 'image', 'max:1999'],
        ];
        $request->validate( $image);
        $image = $request->file('image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/subscription'))
            {
                mkdir('uploads/subscription', 0777 , true);
            }
            $image->move('uploads/subscription', $imagename);
        }
        else{
            return redirect()->back()->with('warning', 'Image Required');
        }

        $subscription->update(['image' => $imagename]);

        return redirect()->route('admin.subscriptions.create')
        ->with('success', 'You have successflly subscriped, our admins will aprove your payment shortly');
        // $imagePath = request('image')->store('uploads/subscription', 'public');
        // $image = Image::make(public_path('storage/'.$imagePath))->fit(400, 238);
        // $image->save();
    }

    public function status($id)
    {
        if(Gate::denies('edit-user')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
        $subscription = Subscription::findOrFail($id);
        if($subscription->status == true){
            $subscription->update(['status' => false]);
            $subscription->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        else 
        {
            $subscription->status = false;
            $subscription->update(['status' => true]);
            $subscription->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
    }
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('subscription.show', compact('subscription'));
    }
    public function update(SubscriptionRequest $request, $id)
    {
        $sub = Subscription::findOrFail($id);
        if($request->type == "weekly 5 odds"){
            $sub->type = $request->type;
            $sub->payment_type = $request->payment_type;
            $sub->amount = '5000';
            $sub->started_at = Carbon::now()->addDays(7);
            $sub->update();

            if($request->payment_type == 'btc'){
                $id = Auth::user()->id;
                return view('admin.subscription.payment', compact('sub', 'id'));
            }
            else{
                $id = Auth::user()->id;
                return view('admin.subscription.payment', compact('sub', 'id'));
            }
        }
        elseif($request->type == "weekly 3 odds"){
            $sub->type = $request->type;
            $sub->payment_type = $request->payment_type;
            $sub->amount = '3000';
            $sub->started_at = Carbon::now()->addDays(7);
            $sub->update();

            $id = Auth::user()->id;
            return view('admin.subscription.payment', compact('sub', 'id'));
        }
        else{
            $request->type == "weekly 10 odds";
            $sub->type = $request->type;
            $sub->payment_type = $request->payment_type;
            $sub->amount = '10000';
            $sub->started_at = Carbon::now()->addDays(7);
            $sub->update();

            $id = Auth::user()->id;
            return view('admin.subscription.payment', compact('sub', 'id'));
        }
        // $subscription->update($request->all());
        return redirect()->back()->with('success', 'Subscription updated successfully!');
    }

    public function destroy($id)
    {
        Subscription::destroy($id);
        return redirect()->back()->with('success', 'Subscription deleted successfully!');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = Auth::user();
        $subscription = Subscription::latest()->where('user_id', $id)->first();

        if($user->subscription){
            if($user->subscription->type == 'first_class_plan'){
                $predictions = Prediction::latest()->where([
                    ['isPremium', true], ['isEndded', false], ['plan', 'first_class_plan']
                ])->get()->take(5);
            }
            else
                {
                $predictions = Prediction::latest()->where([
                    ['isPremium', true], ['isEndded', false], ['plan', 'economin_plan']
                ])->get()->take(5);
            }
            $PastPrediction = Prediction::latest()->where([
                ['isPremium', true], ['isEndded', true]
            ])->get()->take(5);

            return view('admin.subscription.profile', compact('subscription','predictions','PastPrediction','user'));
        }

        return redirect()->back()->with('warning', 'You Do\'nt have acess, Subscribe to Gain Access - Subscribe to VIP');
    }
}
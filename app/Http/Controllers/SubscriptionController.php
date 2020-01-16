<?php


namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Prediction;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\SubscriptionRequest;

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
    public function store(SubscriptionRequest $request)
    {   $sub  = new Subscription();
        if($request->type == "weekly 5 odds"){
            $sub->user_id = $request->user_id;
            $sub->type = $request->type;
            $sub->payment_type = $request->payment_type;
            $sub->amount = '5000';
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
        elseif($request->type == "weekly 3 odds"){
            $sub->user_id = $request->user_id;
            $sub->type = $request->type;
            $sub->payment_type = $request->payment_type;
            $sub->amount = '3000';
            $sub->save();

            $id = Auth::user()->id;
            return view('admin.subscription.payment', compact('sub', 'id'));
        }
        else{
            $request->type == "weekly 10 odds";
            $sub->user_id = $request->user_id;
            $sub->type = $request->type;
            $sub->payment_type = $request->payment_type;
            $sub->amount = '10000';
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
        // return response()->json($subscription);
    }
    public function update(SubscriptionRequest $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return redirect()->back()->with('success', 'Subscription updated successfully!');
        // return response()->json($subscription, 200);
    }
    public function destroy($id)
    {
        Subscription::destroy($id);
        return redirect()->back()->with('success', 'Subscription deleted successfully!');
        // return response()->json(null, 204);
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $subscriptions = Subscription::latest()->where('user_id', $id)->get();
        $predictions = Prediction::latest()->where([
            ['isPremium', true], ['isEndded', false]
        ])->get()->take(5);
        $PastPrediction = Prediction::latest()->where([
            ['isPremium', true], ['isEndded', true]
        ])->get()->take(5);
        return view('admin.subscription.profile', compact('subscriptions','predictions','PastPrediction'));
    }
}
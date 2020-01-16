<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\SubscriptionRequest;
    
    use App\Subscription;

    class SubscriptionController extends Controller
    {
        public function index()
        {
            $subscriptions = Subscription::latest()->get();
            return view('subscription.create', compact('subscriptions'));
            // return response()->json($subscriptions);
        }
        public function store(SubscriptionRequest $request)
        {
            $subscription = Subscription::create($request->all());
            return redirect()->back()->with('success', 'Subscription created successfully!');
           // return response()->json($subscription, 201);
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
    }
<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\PredictionRequest;
    use App\Http\Controllers\Controller;
    use App\Prediction;
    use Illuminate\Support\Facades\Auth;

    class PredictionController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }
        public function index()
        {
            $predictions = Prediction::latest()->get();
            return view('admin.prediction.index', compact('predictions'));
            // return response()->json($predictions);
        }

        public function create()
        {
           $id = Auth::user()->id;
            return view('admin.prediction.create', compact('id'));
        }
        public function store(PredictionRequest $request)
        {
            // dd($request->all());
            $prediction = Prediction::create($request->all());
            return redirect()->back()->with('success', 'Prediction created successfully!');
           // return response()->json($prediction, 201);
        }

        public function edit($id)
        {
            $prediction = Prediction::findOrFail($id);
            $user_id = Auth::user()->id;
            return view('admin.prediction.edit', compact('prediction', 'user_id'));
            // return response()->json($prediction);
        }

        public function show($id)
        {
            $prediction = Prediction::findOrFail($id);
            return view('prediction.show', compact('prediction'));
            // return response()->json($prediction);
        }

        public function premium($id)
        {
            $prediction = Prediction::findOrFail($id);
            if($prediction->isPremium == true){
                $prediction->update(['isPremium' => false]);
                $prediction->save();
                return redirect()->back()->with('success', 'Updated Successfully');
            }
            else 
            {
                $prediction->isPremium = false;
                $prediction->update(['isPremium' => true]);
                $prediction->save();
                return redirect()->back()->with('success', 'Updated Successfully');
            }

        }
        
        public function update(PredictionRequest $request, $id)
        {
            if($request->isEndded == false && $request->result == 'won'){
                return redirect()->back()->with('warning', 'Ongoing Match Cannot have result WON');
            }elseif($request->isEndded == false && $request->result == 'lost'){
                return redirect()->back()->with('warning', 'Ongoing Match Cannot have result LOST');
            
            }elseif($request->isEndded == true && $request->result == 'ongoing'){
                return redirect()->back()->with('warning', 'Ended Match Cannot have result Ongoing');
            }
                else{
                $prediction = Prediction::findOrFail($id);
                $prediction->update($request->all());
                return redirect()->route('admin.predictions.index')->with('success', 'Prediction updated successfully!');
            }
            
        }
        public function destroy($id)
        {
            Prediction::destroy($id);
            return redirect()->back()->with('success', 'Prediction deleted successfully!');
            // return response()->json(null, 204);
        }
    }
<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\ChimeBankRequest;
    
    use App\ChimeBank;

    class ChimeBankController extends Controller
    {
        public function index()
        {
            // $chimebanks = ChimeBank::latest()->get();
            return view('chime.dashboard');
            // return response()->json($chimebanks);
        }
        public function store(ChimeBankRequest $request)
        {
            $chimebank = ChimeBank::create($request->all());
            return redirect()->back()->with('success', 'ChimeBank created successfully!');
           // return response()->json($chimebank, 201);
        }
        public function show($id)
        {
            $chimebank = ChimeBank::findOrFail($id);
            return view('chimebank.show', compact('chimebank'));
            // return response()->json($chimebank);
        }
        public function update(ChimeBankRequest $request, $id)
        {
            $chimebank = ChimeBank::findOrFail($id);
            $chimebank->update($request->all());
            return redirect()->back()->with('success', 'ChimeBank updated successfully!');
            // return response()->json($chimebank, 200);
        }
        public function destroy($id)
        {
            ChimeBank::destroy($id);
            return redirect()->back()->with('success', 'ChimeBank deleted successfully!');
            // return response()->json(null, 204);
        }
    }
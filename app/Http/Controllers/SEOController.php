<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\SEORequest;
    
    use App\SEO;

    class SEOController extends Controller
    {
        public function index()
        {
            $seos = SEO::latest()->get();
            return view('seo.create', compact('seos'));
            // return response()->json($seos);
        }
        public function store(SEORequest $request)
        {
            $seo = SEO::create($request->all());
            return redirect()->back()->with('success', 'SEO created successfully!');
           // return response()->json($seo, 201);
        }
        public function show($id)
        {
            $seo = SEO::findOrFail($id);
            return view('seo.show', compact('seo'));
            // return response()->json($seo);
        }
        public function update(SEORequest $request, $id)
        {
            $seo = SEO::findOrFail($id);
            $seo->update($request->all());
            return redirect()->back()->with('success', 'SEO updated successfully!');
            // return response()->json($seo, 200);
        }
        public function destroy($id)
        {
            SEO::destroy($id);
            return redirect()->back()->with('success', 'SEO deleted successfully!');
            // return response()->json(null, 204);
        }
    }
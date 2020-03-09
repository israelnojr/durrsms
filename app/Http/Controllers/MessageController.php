<?php
namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;

use App\Message;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        if(\Auth::user()->hasAnyRoles(['superadmin', 'admin'])){
            $messages = Message::latest()->get(); 
            }
        else{
            $messages = Message::where('user_id', Auth::user()->id)->latest()->get();
        }
        return view('messages', compact('messages'));
    }
    public function store(MessageRequest $request)
    {
        $message = Message::create($request->all());
        return redirect()->back()->with('success', 'Message created successfully!');
        // return response()->json($message, 201);
    }
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('message.show', compact('message'));
        // return response()->json($message);
    }
    public function update(MessageRequest $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update($request->all());
        return redirect()->back()->with('success', 'Message updated successfully!');
        // return response()->json($message, 200);
    }
    public function destroy($id)
    {
        Message::destroy($id);
        return redirect()->back()->with('success', 'Message deleted successfully!');
    }
}
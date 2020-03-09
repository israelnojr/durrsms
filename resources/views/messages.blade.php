@extends('layouts.front.app')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid" style="height: 85vh">
        <div class="card-header mb-3 d-flex align-items-center"> 
            <span>List of Users</span>
        </div>
      <!-- message will be here -->
        <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th class="th-sm">Recepient
            </th>
            <th class="th-sm">Sender
            </th>
            <th class="th-sm">Message
            </th>
            <th class="th-sm">Status
            </th>
            <th class="th-sm">Delete
            </th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
            <tr>
                <td>{{'+'.$message->shortcode.$message->mobile}}</td>
                <td>{{$message->sendfrom}}</td>
                <td>{{$message->message}}</td>
                <td>{{$message->status == true ? 'Delivered' : 'Failed'}}</td>
            <td>
                <form action="{{ route('messages.destroy', $message->id) }}" method="post">
                    @csrf() @method('delete')
                    <button type="submit" class="btn btn-primary ml-2">Delete</button>
                </form>
            </td>
            </tr>
            @empty 
                <p class="text-center">You have no messages</p>
            @endforelse
        </tbody>
        </table>
    </div>
</div>
@endsection

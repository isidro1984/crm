<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Show all clients
     *
     * @param  
     * @return View
     */
    public function index()
    {
        $clients = DB::table('clients')->paginate(10);
        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }  
    
    /**
     * Store a newly created client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:clients,email|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        /* We create a unique name and we move the file to the avatar folder */
        $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
        request()->avatar->move(public_path('img/avatar'), $imageName);

        $requestData = $request->all();
        $requestData['avatar'] = $imageName;
  
        Client::create($requestData);
   
        return redirect()->route('clients.index')
                        ->with('success','Client created successfully.');
    }

       
    /**
     * Display the specified client.
     *
     * @param  \App\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {        
        $id = $client->id;
        $transactions = $client->find($id)->transactions;
        return view('clients.show', ['client' => $client, 'transactions' => $transactions ]);
    }
   
    /**
     * Show the form for editing the specified client.
     *
     * @param  \App\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit',compact('client', $client));
    }
  
    /**
     * Update the specified client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $Client)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'avatar' => '|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $requestData = $request->all();       
 
        if (isset($requestData['avatar'])){ //We check if a new avatar is sent
            //New Avatar we create a new unique name and we move the file only if the avatar is new
            $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('img/avatar'), $imageName);
            $requestData['avatar'] = $imageName;
        }         
  
        $Client->update($requestData);
  
        return redirect()->route('clients.index')
                        ->with('success','Client updated successfully');
    }
  
    /**
     * Remove the specified client from storage.
     *
     * @param  \App\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $Client)
    {
        $Client->delete();
  
        return redirect()->route('clients.index')
                        ->with('success','Client deleted successfully');
    }
}

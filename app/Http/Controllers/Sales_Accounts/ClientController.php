<?php

namespace App\Http\Controllers\Sales_Accounts;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Sales_Accounts\Client;
use Illuminate\Support\Facades\Validator;
use App\Models\Sales_Accounts\ClientSetting;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10);
        return view('sales_accounts.client.client_info.index',compact('clients'));
    }
    public function create()
    {
        $clientcode=ClientSetting::all();
        return view('sales_accounts.client.client_info.create',compact('clientcode'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required',
            'client_code' => 'required|unique:clients',
            'client_name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'contact_number' => 'required',
        ]);
        $client = new Client;
        $client->client_code = $request->client_code;
        $client->name = $request->client_name;
        $client->address = $request->address;
        $client->contact_person = $request->contact_person;
        $client->contact_number = $request->contact_number;
        $client->save();

        $settings_id = $request->code;
        $getSettingsId = ClientSetting::find($settings_id);
        $i = $getSettingsId->increment_by;
        $n = $getSettingsId->last_number;
        $value = (int) $i + (int) $n;
        $getSettingsId->last_number = $value;
        $getSettingsId->save();


        return redirect()->route('acc.client_info_list');
    }
    public function settings()
    {
        $client_settings= ClientSetting::latest()->paginate(10);
        return view('sales_accounts.settings.client_settings',compact('client_settings'));
    }

    public function settings_store(Request $request)
    {
        $this->validate($request,[
            'title' =>'required',
            'prefix' => 'required|unique:client_settings',
            'increment_by' =>'required|integer|min:0',
            'last_number' =>'required|integer|min:0',
            'status'=>'required'
        ]);

        $client_settings= new ClientSetting;
        $client_settings->title= $request->title;
        $client_settings->prefix= $request->prefix;
        $client_settings->increment_by = $request->increment_by;
        $client_settings->last_number= $request->last_number;
        $client_settings->isActive = $request->status;
        $client_settings->save();


        return redirect()->route('acc.client_settings');
    }


    public function show (Client $client)
    {
        return view('sales_accounts.client.client_info.show',compact('client'));
       
    }

    public function edit(Client $client)
    {
        $clientcode=ClientSetting::all();
        return view('sales_accounts.client.client_info.update',compact('client','clientcode'));
    }

    public function update(Request $request, Client $client)
    {
        $this->validate($request,[
            'client_code' => 'required|unique:clients,client_code,'.$client->id,
            'client_name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'contact_number' => 'required',
        ]);
            $client->client_code = $request->client_code;
            $client->name = $request->client_name;
            $client->address = $request->address;
            $client->contact_person = $request->contact_person;
            $client->contact_number = $request->contact_number;
            $client->save();
         
        return redirect()->route('acc.client_info_list');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('acc.client_info_list');
    }

    public function deActive(Request $request, ClientSetting $clientsettings )
    {
       $clientsettings->isActive = false;
       $clientsettings->save();
       return redirect()->route('acc.client_settings');
      
    }

    public function Active(Request $request, ClientSetting $clientsettings )
    {
       $clientsettings->isActive = true;
       $clientsettings->save();
       return redirect()->route('acc.client_settings');
      
    }

    public function SettingsEdit(ClientSetting $clientsettings)
    {
        $client_settings= ClientSetting::latest()->paginate(10);
        return view('sales_accounts.settings.client_settings_update',compact('clientsettings','client_settings'));
    }

    public function SettingsUpdate(Request $request, ClientSetting $clientsettings)
    {
        $this->validate($request,[
            'title' =>'required',
            'prefix' => 'required|unique:client_settings,prefix,'.$clientsettings->id,
            'increment_by' =>'required|integer|min:0',
            'last_number' =>'required|integer|min:0',
            'status'=>'required'
        ]);
        
        $clientsettings->title= $request->title;
        $clientsettings->prefix= $request->prefix;
        $clientsettings->increment_by = $request->increment_by;
        $clientsettings->last_number= $request->last_number;
        $clientsettings->isActive = $request->status;
        $clientsettings->save();
        
        return redirect()->route('acc.client_settings');
    }
}

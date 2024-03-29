<?php

//Saw Gee Xuan

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;
use App\Adapter\campusAdapter;

class CampusController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $campuses = Campus::all();
        return view('campusindex', compact('campuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('campuscreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->has('submit')) {
            $request->validate([
                'name' => 'required|max:255',
                'abbreviation' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
            ]);
            $campus = new Campus();
            $campus->name = $request->get('name');
            $campus->abbreviation = $request->get('abbreviation');
            $campus->address = $request->get('address');
            $campus->phone = $request->get('phone');
            $campus->save();
            return redirect('campus')->with('success', 'Information has been added');
        } else {
            return redirect('campus');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus) {
        return view('campusedit', compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus) {
        if ($request->has('update')) {
            $request->validate([
                'name' => 'required|max:255',
                'abbreviation' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
            ]);
            $campus->name = $request->get('name');
            $campus->abbreviation = $request->get('abbreviation');
            $campus->address = $request->get('address');
            $campus->phone = $request->get('phone');
            $campus->save();
            return redirect('campus')->with('success', 'Information has been updated');
        } else {
            return redirect('campus');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus) {
        $campus->delete();
        return redirect('campus')->with('success', 'Information has been deleted');
    }

    public function restapi() {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];

            if (\App\Campus::find($id) == null) {
                return response()->json("No campus found", 404);
            } else {
                $campus = \App\Campus::find($id);
                return response()->json($campus);
            }
        }
    }

    public function findbyID() {
        return view('campusfindwithid');
    }

    public function findcampus() {
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $url = "http://localhost:8000/campus/restapi?id=" . $id;
            $client = curl_init($url);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($client);
            $result = json_decode($response);
            $campus = new Campus();
            $campus->name = $result->name;
            $campus->abbreviation = $result->abbreviation;
            $campus->address = $result->address;
            $campus->phone = $result->phone;
            return view('campusfindwithid', compact('campus'));
        }
    }

    function response($status, $status_message, $name, $abbreviation, $address, $phone) {
        header("HTTP/1.1 " . $status);

        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['name'] = $name;
        $response['abbreviation'] = $abbreviation;
        $response['address'] = $address;
        $response['phone'] = $phone;

        $json_response = json_encode($response);
        echo $json_response;
    }
    
    public function createCampusXML(Request $request) {
        $rootNode = new\SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' standalone='yes'?><Campus></Campus>");

        $campuses = campus::all();
        foreach ($campuses as $campuses) {
            $itemNode = $rootNode->addChild('Campus');
            $itemNode->addChild('id', $campuses->id);
            $itemNode->addChild('name', $campuses->name);
            $itemNode->addChild('abbreviation', $campuses->abbreviation);
            $itemNode->addChild('address', $campuses->address);
            $itemNode->addChild('phone', $campuses->phone);
            $itemNode->addChild('create_at', $campuses->create_at);
            $itemNode->addChild('updated_at', $campuses->updated_at);
        }

        return response($rootNode->asXML())
                        ->withHeaders([
                            'Content-Type' => 'text/xml'
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Docker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class DockerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dockers = Docker::select('semester','subject','pullCommand','runCommand','instructions','notes','id')->get();
        return response()->json([
            'success' => true,
            'data' => $dockers
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'semester' => 'required|string',
            'subject' => 'required|string',
            'pullCommand' => 'required|string',
            'runCommand' => 'required|string',
            'instructions' => 'required|string',
            'notes' => 'nullable|string',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Create a new Docker record
        $docker = Docker::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Docker record created successfully',
            'data' => $docker
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Docker $docker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docker $docker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Log::info($request->all());
        $image = Docker::find($id);
        $image->update([
            'semester' => $request->semester,
            'subject' => $request->subject,        
            'pullCommand' => $request->pullCommand,
            'runCommand' => $request->runCommand,        
            'instructions' => $request->instructions,
            'notes' => $request->notes,
        ]);

        if (!$image) {
            return response()->json(['success' => false, 'message' => 'Record not found'], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = Docker::find($id);
        
        if (!$image) {
            return response()->json(['success' => false, 'message' => 'Record not found'], 404);
        }

        $image->delete();
        return response()->json(['success' => true, 'message' => 'Record deleted successfully']);
    }
}

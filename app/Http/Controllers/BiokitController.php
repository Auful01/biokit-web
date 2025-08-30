<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BiokitController extends Controller
{
    //

    public function newDegradation(Request $request)
    {
        // Handle the form submission
        // dd("Tets");
        $post = Http::post('https://n8n.apergu.co.id/webhook/biokit-new');

        if ($post->successful()) {
            return redirect()->back()->with('success', 'Degradation data submitted successfully.');
        }

        return redirect()->back()->with('error', 'Failed to submit degradation data.');
    }

    public function dashboard(){
        $resp = Http::get('https://n8n.apergu.co.id/webhook/biokit-get-degradasi');
        $last = Http::get('https://n8n.apergu.co.id/webhook/biokit-get-last');

        if ($resp->successful() && $last->successful()) {
            $data = $resp->json();
            $lastData = $last->json();
            return response()->json([
                'data' => $data,
                'last' => $lastData
            ]);
        }
    }
}

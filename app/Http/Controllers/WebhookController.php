<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handleSalesIQWebhook(Request $request)
    {
        // Ensure that the request contains JSON data
        if ($request->isJson()) {
            // Process and handle the data received from Zoho SalesIQ
            $data = $request->json()->all();

            // Implement your logic here

            // Respond with HTTP status code 200
            return response()->json(['status' => 'success']);
        } else {
            // Respond with an error status if the request does not contain JSON data
            return response()->json(['status' => 'error', 'message' => 'Invalid request format'], 400);
        }
    }
}

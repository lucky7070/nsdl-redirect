<?php

namespace App\Http\Controllers\Common;

use App\Models\User;
use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CommonController extends Controller
{
    public function upload_image(Request $request): string
    {
        if ($request->file('image')) {
            $image = Helper::saveFile($request->file('image'), 'images');
            return asset('storage/' . $image);
        }else {
            return '';
        }
    }

    public function get_user_list_filter(Request $request): JsonResponse
    {
        $query = User::select("id, CONCAT(name,' (', mobile,')') as name");
        $query->active();
        $query->limit(50);
        if ($request->has('filter')) {
            $query->where('name', 'like', '%' . $request->get('filter') . '%');
            $query->orWhere('mobile', 'like', '%' . $request->get('filter') . '%');
        }

        $user =   $query->get();
        return response()->json($user);
    }

    public function test(Request $request)
    {
        abort(404);
        echo "Records updated Successfully..!!";
    }

    public function panCardService(Request $request)
    {
        $jarPath = base_path('secret/EntityRequestUtility.jar');
        $propertiesPath = base_path('secret/entitydata.properties');
        $jarDirectory = base_path('secret');
        
        $descriptorspec = [
            1 => ['pipe', 'w'], // Standard Output (stdout)
            2 => ['pipe', 'w']  // Standard Error (stderr)
        ];
        
        $process = proc_open("cd \"{$jarDirectory}\" && java -jar \"EntityRequestUtility.jar\" \"entitydata.properties\"", $descriptorspec, $pipes);
        $output = stream_get_contents($pipes[1]);
        $error = stream_get_contents($pipes[2]);
        
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);
        
        // ✅ Extract all key-value pairs, including multiline values
        $parsedData = [];
        $lines = explode("\n", $output);
        $currentKey = null;
        $currentValue = "";
        
        foreach ($lines as $line) {
            $line = trim($line);
        
            // Match "Key: Value" pattern
            if (preg_match('/^([A-Za-z0-9_ ]+):\s*(.*)$/', $line, $matches)) {
                // Save previous key-value if exists
                if ($currentKey !== null) {
                    $parsedData[$currentKey] = trim($currentValue);
                }
        
                // Start new key-value pair
                $currentKey = trim($matches[1]);
                $currentValue = trim($matches[2]);
            } elseif ($currentKey !== null) {
                // Append multiline values
                $currentValue .= "\n" . $line;
            }
        }
        
        // Save last key-value pair
        if ($currentKey !== null) {
            $parsedData[$currentKey] = trim($currentValue);
        }
        
        // ✅ Print all extracted key-value pairs
        $encryptedRequest=json_decode($parsedData['json string']);
     
        $response = Http::post(config('ayt.pan_card_service.url'), [
            'encryptedRequest'=> [
                'entityCode'     => $encryptedRequest->entityCode,
                'entitySource'   => $encryptedRequest->entitySource,
                'agentCode'      =>$encryptedRequest->agentCode,
                'redirectUrl'    => $encryptedRequest->redirectUrl,
                'campaignId'     => $encryptedRequest->campaignId,
            ],
            'entityCode'     => $encryptedRequest->entityCode,
            'TransactionId' =>$parsedData['TransactionId'],
            'AuthKey' =>$parsedData['AuthKey'],
            'signature'=>$parsedData['signature'],     
        ]);
        
        // Get the response body as an array
        $data1 = $response->json();    
        // Check if the request was successful
        if ($response->successful()) {
            return response()->json(['message' => 'Post created successfully', 'data' => $data]);
        } else {
            return response()->json(['error' => 'Failed to create post'], $response->status());
        }
        
    }
    function signData($data)
{
    $privateKeyPath = base_path('secret/private_key.pem'); // Use base_path() for absolute path

    if (!file_exists($privateKeyPath)) {
        throw new Exception("Private key file not found at: $privateKeyPath");
    }

    // Load the private key
    $privateKey = openssl_pkey_get_private(file_get_contents($privateKeyPath));

    if (!$privateKey) {
        throw new Exception("Invalid private key!");
    }

    // Sign the data
    openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);

    // Free the key
    openssl_free_key($privateKey);

    // Return the Base64-encoded signature
    return base64_encode($signature);
}

// Example usage
// $data = "Sample data to sign";
// $signature = signData($data);
// echo "Signature: " . $signature;

}

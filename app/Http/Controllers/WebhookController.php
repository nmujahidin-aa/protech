<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Secret yang sama dengan yang diatur di GitHub webhook settings (opsional)
        $githubSecret = env('GITHUB_WEBHOOK_SECRET');

        // Verifikasi signature (opsional tapi disarankan)
        $signature = 'sha256=' . hash_hmac('sha256', $request->getContent(), $githubSecret);
        if ($request->header('X-Hub-Signature-256') !== $signature) {
            Log::error('Invalid GitHub signature.');
            return response()->json(['error' => 'Invalid signature'], 401);
        }

        // Log request untuk debugging
        Log::info('GitHub Webhook Received:', $request->all());

        // Cek apakah event yang diterima adalah push ke branch `main`
        $branch = $request->input('ref'); // Ref berisi informasi tentang branch yang di-push
        if ($branch === 'refs/heads/main') {
            try {
                // Jalankan perintah untuk deployment
                exec('cd /path/to/your/laravel/project && git pull origin main');
                Log::info('Deployment successful.');
                return response()->json(['status' => 'Deployment successful']);
            } catch (\Exception $e) {
                Log::error('Deployment failed: ' . $e->getMessage());
                return response()->json(['error' => 'Deployment failed'], 500);
            }
        }

        return response()->json(['status' => 'Not a main branch push'], 200);
    }
}

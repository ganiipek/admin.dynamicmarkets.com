<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Console\Command;

class RefreshAccessToken extends Command
{
    public $BASE_URL = "https://globalapi.tfcapital.me:8443/v1/website/";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $session = new Session();
        $loginServiceUrl = 'https://globalapi.tfcapital.me:8443/v1/website/auth/admin/accesstoken/refresh';
        $response = Http::post($loginServiceUrl, [
            'refresh_token' => $session->get('refresh_token'),
        ]);

        $responseData = $response->json();
        if ($response->successful()) {
            $session = new Session();
            $session->set('access_token', $responseData['accessToken']);
            $session->set('refresh_token', $responseData['refreshToken']);
        }
        return Command::SUCCESS;
    }
}

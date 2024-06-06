<?php

namespace App\Services;

use App\Contracts\SmsAPI;
use Illuminate\Support\Facades\Blade;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class TwilioService implements SmsAPI
{
    private Client $client;


    /**
     * @throws ConfigurationException
     */
    public function __construct(array $config)
    {
        $this->client = new Client(
            $config["sid"],
            $config["token"]
        );
    }

    public function send(string $phone, string $view, $data = []): void
    {
        $text = $this->getHTML($view, $data);
        $this->client->messages->create(
            $phone,
            ["body" => $text]
        );
    }

    /**
     * Get HTML from a view
     *
     * @param string $view
     * @param $data
     * @return string
     */
    protected function getHTML(string $view, $data = []) : string
    {
        return Blade::render($view, $data);
    }
}

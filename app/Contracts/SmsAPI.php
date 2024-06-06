<?php

namespace App\Contracts;

interface SmsAPI
{
    /**
     * Send a new SMS to a given phone number
     *
     * @param string $phone - The phone number to which send the message
     * @param string $view - The Blade view template to use
     * @param array $data - Data that should be passed to the view
     * @return void
     */
    public function send(string $phone, string $view, array $data) : void;
}

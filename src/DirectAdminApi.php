<?php

namespace Gegeriyadi\LaravelDirectAdmin;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait DirectAdminApi
{

    /**
     * directadmin base_uri
     * @var string
     */
    public $base_uri;

    /**
     * directadmin username
     * @var string
     */
    public $username;

    /**
     * directadmin password
     * @var string
     */
    public $password;

    /**
     * DirectAdminApi constructor.
     */
    public function __construct()
    {
        $this->base_uri = "https://".config('directadmin.hostname').
            ":".config('directadmin.port')."/";
        
        $this->username = config('directadmin.username');

        $this->password = config('directadmin.password');
    }

    /**
     * call directadmin api
     * @param $method
     * @param $uri
     * @param null $query
     * @return mixed
     */
    public function process($method, $uri, $query = null)
	{
        $client = new Client([
            'base_uri' => $this->base_uri
        ]);
        
        try {
            $res = $client->request($method, $uri, [
                'auth' => [$this->username, $this->password],
                'query' => $query
            ]);

            $body = $res->getBody();

            parse_str($body, $result);

            return $result;

        } catch (GuzzleException $e) {
            // handle the exception
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
	}
}

<?php
namespace App\Util;

use GuzzleHttp\Client;
use Session;

class FhousePost
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function login($email, $password)
	{
		$params = [
            "email" => $email,
            "password"   => $password
        ];
		return $this->endpointRequest('/api/v3/merchant/user/login',"POST", $params, 1);
	}

	public function report()
	{
		$params = [
            "fromDate" => "2011-01-01",
            "toDate"   => "2020-05-01"
          ];
		return $this->endpointRequest('/api/v3/transactions/report', "POST", $params);
	}

	public function transactionList($page)
	{
		$params = [
            "fromDate" => "2011-01-01",
            "toDate"   => "2020-05-01"
          ];
		return $this->endpointRequest('/api/v3/transaction/list?page='.$page, "POST", $params);
	}

	public function getTransaction($transactionId)
	{
		$params = [
            "transactionId" => $transactionId
          ];
		return $this->endpointRequest('/api/v3/transaction', "POST", $params);
	}

	public function endpointRequest($url,$method="GET",$params="", $header=0)
	{
		try {
			if($header == 0) {
				if (Session::get('tokenApi') == null) {
					return redirect('main');
				} else {
					$response = $this->client->post($url, [
						'headers' => ['Content-Type' => 'application/json', 'Authorization' => Session::get('tokenApi')],
						'body' => json_encode($params)
					]);
				}

			} else {
				$response = $this->client->post($url, [
					'headers' => ['Content-Type' => 'application/json'],
					'body' => json_encode($params)
				]);
			}

		} catch (\Exception $e) {
            return ["error: ".$e];
		}

		return $this->response_handler($response->getBody()->getContents());
	}

	public function response_handler($response)
	{
		if ($response) {
			return json_decode($response);
		}
		
		return [];
	}

}
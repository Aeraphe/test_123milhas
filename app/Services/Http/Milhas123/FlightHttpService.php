<?PHP

namespace App\Services\Http\Milhas123;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use \GuzzleHttp\Exception\RequestException  as GuzzleReqException;

class FlightHttpService
{

    protected $httpClient;
    protected $basedir = "http://prova.123milhas.net/api/";

    function __construct(Client $client)
    {
        $this->httpClient = $client;
    }


    public function getFlights(String $filter = "")
    {
        try {
            $url = $this->basedir . "flights" . ($filter?"?".$filter:"");
            $promise = array('data' =>  $this->httpClient->getAsync($url));
            $response =  Promise\Utils::unwrap($promise);
            return json_decode($response['data']->getBody());
        } catch (GuzzleReqException $e) {
            throw ($e);
        }
    }
}

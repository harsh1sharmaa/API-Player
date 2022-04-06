<?php


use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;


class Helper extends Controller
{

    public function getdata($location, $page)
    {


        // echo "hello";
        // die();
        switch ($page) {

            case 'astronomy':


                $url = 'http://api.weatherapi.com/v1/astronomy.json?key=0bab7dd1bacc418689b143833220304&q=' . $location;
                $data =  $this->getdatahelper($url);
                $data = $data;
                return $data;
                break;
            case 'forecast':

                $url = 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&days=5&q=' . $location;
                $data =  $this->getdatahelper($url);
                $data = $data->forecast->forecastday;
                return $data;

                break;
            case 'info':

                $url = 'http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q=' . $location;
                $data =  $this->getdatahelper($url);
                $data = $data;
                return $data;

                break;
            case 'location':
                $url = 'http://api.weatherapi.com/v1/search.json?key=0bab7dd1bacc418689b143833220304&q=' . $location;
                $data =  $this->getdatahelper($url);
                $data = $data;
                return $data;
                break;
            case 'sports':
                $url = 'http://api.weatherapi.com/v1/sports.json?key=0bab7dd1bacc418689b143833220304&q=' . $location;
                $data =  $this->getdatahelper($url);
                $data = $data->football;
                return $data;

                break;
            case 'history':
                $url = 'http://api.weatherapi.com/v1/history.json?key=0bab7dd1bacc418689b143833220304&q=' . $location . '&dt=2010-01-01';

                $data =  $this->getdatahelper($url);
                $data = $data;
                return $data;
                break;
            case 'timezone':

                $url = 'http://api.weatherapi.com/v1/timezone.json?key=0bab7dd1bacc418689b143833220304&q=' . $location;
                $data =  $this->getdatahelper($url);
                $data = $data->location;
                return $data;

                break;
            case 'current':

                $url = 'http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q=' . $location;
                $data =  $this->getdatahelper($url);

                $data = $data->current;
                return $data;
                break;
            case 'airquality':

                $url = 'http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&aqi=yes&q=' . $location;
                $data =  $this->getdatahelper($url);

                $data = $data->current->air_quality;
                return $data;
                break;
        }
    }


    public function getdatahelper($url)
    {
        $ch = curl_init();
        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        // echo $data;

        $arr = json_decode($data);
        // echo "<pre>";
        // print_r($arr->current->air_quality);
        // die;
        if (isset($arr->error)) {

            print_r($arr->error->message);
            die;
        }


        return $arr;
    }
}

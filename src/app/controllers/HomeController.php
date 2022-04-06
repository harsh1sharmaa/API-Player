<?php


use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;


class HomeController extends Controller
{

    public function testAction()
    {
        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, "http://httpbin.org/basic-auth/11/11");
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt(
        //     $ch,
        //     CURLOPT_POSTFIELDS,
        //     "postvar1=value1&postvar2=value2&postvar3=value3"
        // );
        // curl_setopt(
        //     $ch,
        //     CURLOPT_HEADER,
        //     "content-type: application/json"
        // );
        // $data = array(
        //     'foo' => 'bar',
        //     'baz' => 'boom',
        //     'cow' => 'milk',
        //     'php' => 'hypertext processor'
        // );

        // In real life you should use something like:
        // curl_setopt(
        //     $ch,
        //     CURLOPT_POSTFIELDS,
        //     http_build_query($data)
        // );

        // Receive server response ...
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // // echo curl_exec($ch);

        // $server_output = curl_exec($ch);
        // echo "<pre>";
        // print_r(($server_output));

        // curl_close($ch);



        // die();
        $data = $this->request->getPost();
        if (!empty($data['submit'])) {

            // print_r($data);
            $str = $data['name'];
            // // echo str_replace(" ", "+", $str);
            // $delimiter = ' ';
            // $words = explode($delimiter, $str);
            $str = ltrim($str);
            $str = rtrim($str);

            // print_r($words);
            // echo $str;
            $str = str_replace(" ", "+", $str);
            // die();

            $url = "https://openlibrary.org/search.json?q=" . $str . "&mode=ebooks&has_fulltext=true";
            // $url="http://httpbin.org";
            // echo $url;
            // die;

            $ch = curl_init();

            //grab URL and pass it to the variable.
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);

            $data = curl_exec($ch);
            // echo $data;
            // var_dump($data);
            // echo "<pre>";
            // print_r($data);

            $obj = json_decode($data);
            // echo "<pre>";
            // print_r($obj->docs);
            // die;
            $arr = $obj->docs;

            $this->view->message = $arr;
        }
    }

    public function detailAction()
    {

        // echo "indetai";
        // die();
        $isbn = $this->request->getQuery('isbn');
        // echo $isbn;
        // die;

        $url = "https://openlibrary.org/api/books?bibkeys=ISBN:" . $isbn . "&jscmd=details&format=json";
        // $url = "https://openlibrary.org/api/books?bibkeys=ISBN:9780140868654&jscmd=details&format=json";

        $ch = curl_init();

        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        // echo $data;
        // var_dump($data);
        // echo "<pre>";
        // print_r($data);

        $obj = json_decode($data);
        $str = "ISBN:" . $isbn;
        // echo "<pre>";
        // print_r($obj->$str);
        // die;
        $deatilobj = $obj->$str;

        $this->view->message = $deatilobj;
        // die;
        // $arr = $obj[1];
        //   var_dump($arr);
        // echo "<pre>";
        // print_r($arr);
    }

    public function getAction()
    {

        $hlp = new Helper();
        $hlp->fun();
    }
}

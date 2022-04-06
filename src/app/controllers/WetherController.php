<?php


use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;


class WetherController extends Controller
{
    public function locationAction()
    {
        $data = $this->request->getPost();
        if (isset($data['submit'])) {
            $location = $data['name'];
            $location = urlencode($location);
            $hlp = new Helper();
            $arr=$hlp->getData($location, "location");
            $this->view->message = $arr;
        }
    }

    public function infoAction()
    {

        $location = $this->request->getQuery('location');
        $location = urlencode($location);
        $hlp = new Helper();
        $arr=$hlp->getData($location, "info");
        $this->view->message = $arr;
    }

    public function forecastAction()
    {


        $location = $this->request->getQuery('location');
        $location = urlencode($location);
        $hlp = new Helper();
        $arr=$hlp->getData($location, "forecast");
        $this->view->message = $arr;
    }
    public function currentAction()
    {

        
        $location = $this->request->getQuery('location');
        $location = urlencode($location);
        $hlp = new Helper();
        $arr=$hlp->getData($location, "current");
        $this->view->message = $arr;

        // die();
    }
    public function timezoneAction()
    {

        $location = $this->request->getQuery('location');
        $location = urlencode($location);
        $hlp = new Helper();
        $arr=$hlp->getData($location, "timezone");
        $this->view->message = $arr;

        // die();
    }
    public function historyAction()
    {

        $location = $this->request->getQuery('location');
        $location = urlencode($location);
        $hlp = new Helper();
        $arr=$hlp->getData($location, "history");
        die();
    }
    public function sportsAction()
    {

        $location = $this->request->getQuery('location');
        $location = urlencode($location);
        $hlp = new Helper();
        $arr=$hlp->getData($location, "sports");
        $this->view->message = $arr;
    }
    public function astronomyAction()
    {

        $location = $this->request->getQuery('location');
        $location = urlencode($location);
        $hlp = new Helper();
        $arr=$hlp->getData($location, "astronomy");
        $this->view->message = $arr;
        // die();
    }
    public function airqualityAction()
    {

        $location = $this->request->getQuery('location');
        $location = urlencode($location);
        $hlp = new Helper();
        $arr=$hlp->getData($location, "airquality");
        $this->view->message = $arr;
        // die();
    }
}

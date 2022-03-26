<?php

class PostsController extends Controller
{
    protected $page;
    private array $pageParameter;
    private $api = 'KIXenYwYcpPK00rNb77yr7wzntCWl4dboZfs03Vo';

    public function __construct()
    {
        $this->page= 'post';
        $this->pageParameter = [
            'pageTitle' => 'BlogSpace - post'
        ];
    }

    public function index($GetParam)
    {   
        if(!isset($GetParam['date'])){
            $param = date('Y-m-d');
        }else{
            $param = $GetParam['date'];
        }
        $data = $this->getSingle($param);
        if(!empty($data['code'])){
            $error = ['error' => 'Post is unavailable'];
            $this->pageParameter = array_merge( $error, $this->pageParameter );
        }else{
            $result = [
                'result' => $this->getPostsRandom('7')
            ];
            $this->pageParameter = array_merge( $data, $result, $this->pageParameter );
        }
        
        $this->render($this->page, $this->pageParameter);
        
    }

    private function getSingle($param)
    {   
        $param = strtotime($param);
        if($param === false){
            $param = strtotime('now');  
        }
        $api = $this->api;
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.nasa.gov/planetary/apod?api_key=' . $api . '&date=' . date('Y-m-d', $param)); //date should be yyyy-mm-dd
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    
        $result = curl_exec($cURLConnection);
        curl_close($cURLConnection);
    
        return json_decode($result, true);

    }

    private function getResults($start, $end, $page){
        $dateDif = (($end - $start) / 86400);
        
        $this->pageParameter['availPage'] = ceil($dateDif / 7);

        if( $page > $this->pageParameter['availPage'] ){
            $page = $this->pageParameter['availPage'];
        }

        if( $page < 1 ){
            $page = 1;
        }
     
        $startCalc = $end - ( 86400 * 7 * ($page) );
        $startParam = ($startCalc > $start ) ? $startCalc : $start;
        
        $endCalc = $end - (( 86400 * 7 * ($page - 1) ) + 86400);
        $endParam = ( $page === '1' ) ? $end : $endCalc;

        if( $startParam >= $endParam){
            $endParam = $startParam;
        }

        $api = $this->api;
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.nasa.gov/planetary/apod?api_key=' . $api . '&start_date=' . date( 'Y-m-d', $startParam) . '&end_date=' . date( 'Y-m-d',  $endParam)); //date should be yyyy-mm-dd
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    
        $result = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        
        return json_decode($result, true);

    }

    public function search($GetParam)
    {  
        $this->page = 'search';
        
        if( isset( $GetParam['startDate'] ) || isset( $GetParam['endDate'] ) ){

            $curDate = strtotime('now');
            $startDate = strtotime( $GetParam['startDate'] );
            $endDate = strtotime( $GetParam['endDate'] );

            if($startDate === false || $endDate === false){
                $this->pageParameter['error'] = 'Please insert start date and end date';
            }elseif( empty( $GetParam['startDate'] || empty( $GetParam['endDate'] ) ) ){
                $this->pageParameter['error'] = 'Please insert start date and end date';
            }
            elseif( $startDate > $endDate ){
                $this->pageParameter['error'] = 'Start date cannot be greater than end date';
            }
            elseif( strtotime('1995-06-16') > $startDate || $curDate < $endDate  ){
                $this->pageParameter['error'] = 'Please Select Between 16-06-1995 to ' . date('d-m-Y');
            }

            if( empty($this->pageParameter['error']) ){
                $page = (!empty($GetParam['page']) && (int) $GetParam['page'] ) ? $GetParam['page'] : 1;
                $params = [
                    'result' => array_reverse( $this->getResults($startDate, $endDate, $page) ),
                    'start' => date('Y-m-d', $startDate),
                    'end' => date('Y-m-d', $endDate),
                    'page' => $page,
                    'pageTitle' => 'BlogSpace - search'
                ];
                $this->pageParameter = array_merge($params, $this->pageParameter);
            }

        } else{
            $params = [
                'result' => $this->getPostsRandom('7')
            ];
            $this->pageParameter = array_merge($params, $this->pageParameter);
        }
        
        $this->render($this->page, $this->pageParameter);
    }
    
    public function getPostsRandom( string $count = '10' )
    {
        $api = $this->api;
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.nasa.gov/planetary/apod?api_key=' . $api . '&count=' . $count);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    
        $result = curl_exec($cURLConnection);
        curl_close($cURLConnection);
    
        return json_decode($result, true);
    }
    
}

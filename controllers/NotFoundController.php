<?php

class NotFoundController extends Controller
{
    protected $page;
    protected array $pageParameter;

    public function __construct()
    {
        $this->page= 'NotFound';
        $this->pageParameter = [
            'pageTitle' => 'Page not found'
        ];
    }

    public function index()
    {       
        $this->render($this->page, $this->pageParameter);
    }
}

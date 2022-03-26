<?php

class HomeController extends Controller
{
    //anything that need to render posts required PostsController
    protected $page;
    protected array $pageParameter;

    public function __construct()
    {
        $this->page= 'home';
        $this->pageParameter = [
            'pageTitle' => 'BlogSpace'
        ];
    }
    
    public function index()
    {
        $posts = new PostsController;
        $this->pageParameter['posts'] = $posts->getPostsRandom('6');

        $this->render($this->page, $this->pageParameter);

    }

}


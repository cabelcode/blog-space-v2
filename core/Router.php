<?php
class Router{

    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    private array $handlers;

    public function get( string $path, mixed $handle )
    {
        $this->addHandlers( $path, static::METHOD_GET, $handle );
    }

    public function post(string $path, mixed $handle)
    {
        $this->addHandlers( $path, static::METHOD_POST, $handle );
    }

    private function addHandlers( $path, $method, $handler)
    {
        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handle' => $handler
        ];
    }

    public function run()
    {
        $requestURI = parse_url($_SERVER['REQUEST_URI']);       
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $callback = null;
        
        foreach( $this->handlers as $handler ){
            if( $requestURI['path'] === $handler['path'] && $requestMethod === $handler['method'] ){
                if( is_callable($handler['handle']) ){
                    $callback = $handler['handle'];
                }
                if( is_string($handler['handle']) ){
                    $handles = explode( '::', $handler['handle']);
                    $className = new $handles[0];
                    $method = $handles[1];
                    $callback = [$className, $method];
                }
            }
        }

        $req = new checkRequest;

        if(!$callback || !$req->set()){
            $className = new NotFoundController;
            
            $callback = [$className, 'index'];
        }
        

        call_user_func_array($callback, [$_GET, $_POST]);
    }


}

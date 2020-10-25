<?php declare(strict_types = 1);

namespace NoFramework\Controllers;

use Http\Response;
use NoFramework\Template\FrontendRenderer;
use NoFramework\Page\PageReader;
use NoFramework\Page\InvalidPageException;

class Page
{
    
    private $response;
    private $renderer;
    private $pageReader;

    public function __construct(PageReader $pageReader, Response $response, FrontendRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->response = $response;
        $this->pageReader= $pageReader;
    }
    
    public function show($params)
    {
        $slug = $params['slug'];

        try {
            $data['content'] = $this->pageReader->readBySlug($slug);
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(404);
            return $this->response->setContent('404 - Page not found');
        }

        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }

}
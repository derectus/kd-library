<?php

namespace App\Http\Controllers;

use App\Services\Admin\AuthorService;
use App\Services\Admin\BookService;
use App\Services\Admin\HomeService;
use App\Services\Admin\PublisherService;
use App\Services\Admin\UserService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller as BaseController;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $homeService;
    protected $userService;
    protected $bookService;
    protected $authorService;
    protected $publisherService;


    public function __construct(HomeService $homeService, UserService $userService, BookService $bookService,
                                AuthorService $authorService, PublisherService $publisherService)
    {
        $this->middleware('auth');
        $this->middleware('is_admin');

        $this->homeService = $homeService;
        $this->userService = $userService;
        $this->bookService = $bookService;
        $this->authorService = $authorService;
        $this->publisherService = $publisherService;
    }

}

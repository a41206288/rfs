<?php

class HomeController extends BaseController {

    public function index()
    {
        return View::make('home')
            ->with('title', '首頁')
            ->with('hello', '大家好～～');
    }

}
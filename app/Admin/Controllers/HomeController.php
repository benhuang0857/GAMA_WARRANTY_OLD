<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $output = '
        <div class="form-group pb-3">
            <span style="font-size: 50px; position: relative; top: 8px;">GAMA</span>
            <span style="font-size: 22px; position: relative; top: 8px;">保證卡</span>
        </div>
        ';

        return $content
            ->title($output);
    }
}

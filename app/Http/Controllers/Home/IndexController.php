<?php
/**
 * 描述.
 *
 * @author duanjin<duan.jin@mydreamplus.com>
 * @date 2017-03-03 15:11
 */
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('homesite.test.test');
    }
}
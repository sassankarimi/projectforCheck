<?php
/**
 * Created by PhpStorm.
 * User: Sassan
 * Date: 9/5/2018
 * Time: 3:06 PM
 */
function flash($title=null,$message='no message detected',$level='info',$key='flash_message')
{
    if(func_get_args()==0)
        return session()->flash();
        return session()->flash($key,['title'=>$title,'message'=>$message,'level'=>$level]);
    //session()->flash('flash_level_message',$level);
}
function path_banner(\App\Banner $banner)
{
    $street=str_replace(' ', '-',$banner->street);
    return "/ss" . "/" . $banner->zip . '/' .$street ;
}
function convert($string) {
    //arrays of persian and latin numbers
    $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $latin_num = range(0, 9);

    $string = str_replace($latin_num, $persian_num, $string);

    return $string;
}

function sort_users_by($column,$body)
{
    $Direction=(\Request::get('Direction')=='ASC')?'DEC':'ASC';
    return "<a href=".route('users',['SortBy'=>$column,'Direction'=>$Direction]).">".$body."</a>";

}

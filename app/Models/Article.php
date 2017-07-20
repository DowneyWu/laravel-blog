<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{

    /**
     * 设置自动维护时间的格式为unix时间戳
     * @var string
     */
    protected $dateFormat = 'U';


}
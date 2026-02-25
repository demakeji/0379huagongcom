<?php
namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'body'];

    /**
     * @param bool|string $slug
     *
     * @return array|null
     */
    public function getNews(bool|string $slug = false): ?array
    {
        if ($slug === false) {
            $str = $this->findAll();
            return $str;
        }



        $str = $this->where(['slug' => $slug])->first();
        return $str;
    }
}
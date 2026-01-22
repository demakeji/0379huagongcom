<?php
namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    /**
     * @param bool|string $slug
     *
     * @return array|null
     */
    public function getNews(bool|string $slug = false): ?array
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Album extends Seeder
{
    public function run()
    {
        $data = [
            'blog_title' => 'test',
            'blog_description'    => 'test',
        ];

        // Simple Queries
        $this->db->query('INSERT INTO Album (blog_title, blog_description) VALUES(:blog_title:, :blog_description:)', $data);

        // Using Query Builder
        $this->db->table('Album')->insert($data);
    }
}

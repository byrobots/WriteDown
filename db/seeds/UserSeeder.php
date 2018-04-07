<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    public function run()
    {
        $now   = new DateTime('now');
        $posts = $this->table('users');
        $posts->insert([
            'email'      => getenv('SEED_USER_EMAIL'),
            'password'   => password_hash(getenv('SEED_USER_PASSWORD'), PASSWORD_DEFAULT),
            'token'      => null,
            'created_at' => $now->format('Y-m-d H:i:s'),
            'updated_at' => $now->format('Y-m-d H:i:s'),
        ])->save();
    }
}

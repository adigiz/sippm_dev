<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(JenisPengajuanSeeder::class);
        $this->call(JenisPersetujuanSeeder::class);
    }
}

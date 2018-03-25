<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $jenis = [
            [
                'name' => 'Penelitian',
                'username' => ''
            ],];
        DB::table('jenis_pengajuans')->insert($jenis);
    }
}

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
                'name' => 'LPPM',
                'email' => 'lppm@itk.ac.id',
                'password' => bcrypt('zhA?Ewd2u!@YcNT')
            ],];
        DB::table('admins')->insert($jenis);
    }
}

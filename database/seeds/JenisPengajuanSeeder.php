<?php

use Illuminate\Database\Seeder;

class JenisPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_pengajuans')->delete();
        $jenis = [
            [
                'nama_jenis' => 'Penelitian'
            ],
            [
                'nama_jenis' => 'Pengabdian Masyarakat',
            ],];
        DB::table('jenis_pengajuans')->insert($jenis);
    }
}

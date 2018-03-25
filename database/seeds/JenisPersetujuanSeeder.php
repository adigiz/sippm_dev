<?php

use Illuminate\Database\Seeder;

class JenisPersetujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_persetujuans')->delete();
        $jenis = [
            [
                'nama_jenis_persetujuans' => 'Disetujui'
            ],
            [
                'nama_jenis_persetujuans' => 'Revisi',
            ],
            [
                'nama_jenis_persetujuans' => 'Ditolak',
            ],];
        DB::table('jenis_persetujuans')->insert($jenis);
    }
}

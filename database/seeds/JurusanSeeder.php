<?php

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('jurusans')->delete();
        $jurusans = [
            [
                'nama_jurusan' => 'Jurusan Matematika dan Teknologi Informasi'
            ],
            [
                'nama_jurusan' => 'Jurusan Sains, Teknologi Pangan dan Kemaritiman',
            ],
            [
                'nama_jurusan' => 'Jurusan Teknologi Industri dan Proses',
            ],
            [
                'nama_jurusan' => 'Jurusan Teknologi Sipil dan Perencanaan',
            ],
            [
                'nama_jurusan' => 'Jurusan Ilmu Kebumian dan Lingkungan',
            ],];
        DB::table('jurusans')->insert($jurusans);
    }
}
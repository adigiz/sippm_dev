<?php

use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('prodis')->delete();
        $prodis = [
            [
                'nama_prodi' => 'Fisika',
                'jurusan_id' => '2'
            ],
            [
                'nama_prodi' => 'Matematika',
                'jurusan_id' => '1'
            ],
            [
                'nama_prodi' => 'Teknik Mesin',
                'jurusan_id' => '3'
            ],
            [
                'nama_prodi' => 'Teknik Elektro',
                'jurusan_id' => '3'
            ],
            [
                'nama_prodi' => 'Teknik Kimia',
                'jurusan_id' => '3'
            ],
            [
                'nama_prodi' => 'Teknik Material dan Metalurgi',
                'jurusan_id' => '5'
            ],
            [
                'nama_prodi' => 'Teknik Sipil',
                'jurusan_id' => '4'
            ],
            [
                'nama_prodi' => 'Perencanaan Wilayah dan Kota',
                'jurusan_id' => '4'
            ],
            [
                'nama_prodi' => 'Teknik Perkapalan',
                'jurusan_id' => '2'
            ],
            [
                'nama_prodi' => 'Sistem Informasi',
                'jurusan_id' => '1'
            ],
            [
                'nama_prodi' => 'Informatika',
                'jurusan_id' => '1'
            ],
            [
                'nama_prodi' => 'Teknik Industri',
                'jurusan_id' => '3'
            ],
            [
                'nama_prodi' => 'Teknik Lingkungan',
                'jurusan_id' => '5'
            ],
            [
                'nama_prodi' => 'Teknik Kelautan',
                'jurusan_id' => '2'
            ],];
        DB::table('prodis')->insert($prodis);
    }
}
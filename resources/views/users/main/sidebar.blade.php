<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ route('home') }}" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Home</a>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Pengajuan</a>
                    <ul class="collapse">
                        <li><a href="{{ url('users/pengajuan_penelitian/create') }}">Penelitian</a></li>
                        <li><a href="{{ url('users/pengajuan_pengabdian/create') }}">Pengabdian</a></li>
                        <li><a href="{{ url('users/daftar_pengajuan')}}">Daftar Pengajuan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('users/sedang_berjalan') }}" class="waves-effect"><i class="fa fa-bookmark m-r-10" aria-hidden="true"></i>Sedang Berjalan</a>
                </li>
                <li>
                    <a href="{{ url('users/download') }}" class="waves-effect"><i class="fa fa-download m-r-10" aria-hidden="true"></i>Download</a>
                </li>
                <li>
                    <a href="{{ url('users/profil') }}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true" data-toggle="collapse" data-target="#profile"></i>Profil</a></li>
                </li>
                <li>
                    <a  class="has-arrow waves-effect"><i class="fa fa-history m-r-10" aria-hidden="true"></i>Riwayat Penelitian</a>
                    <ul id="profile" class="collapse">
                        <li><a href="{{ url('users/riwayat') }}">Daftar Riwayat</a></li>
                        <li><a href="{{ route('riwayat.publikasi.create') }}">Tambah Publikasi</a></li>
                        <li><a href="{{ route('riwayat.pertemuan.create') }}">Tambah Pertemuan</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

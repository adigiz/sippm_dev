<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ url('admin') }}" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-calendar m-r-10" aria-hidden="true"></i>Waktu Pengajuan</a>
                    <ul class="collapse">
                        <li><a href="{{ url('admin/waktu_pengajuan/create') }}">Tambah Waktu Pengajuan</a></li>
                        <li><a href="{{ url('admin/waktu_pengajuan/index') }}">Lihat Waktu Pengajuan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-paste m-r-10" aria-hidden="true"></i>Pengajuan</a>
                    <ul class="collapse">
                        <li><a href="{{url('admin/persetujuan/')}}">Semua Pengajuan</a></li>
                        <li><a href="#">Belum Diperika</a></li>
                        <li><a href="{{url('admin/disetujui')}}">Disetujui</a></li>
                        <li><a href="{{url('admin/direvisi')}}">Revisi</a></li>
                        <li><a href="{{url('admin/ditolak')}}">Ditolak</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-book m-r-10" aria-hidden="true"></i>Berita </a>
                    <ul class="collapse">
                        <li><a href="{{ url('admin/post/') }}">Lihat Berita</a></li>
                        <li><a href="{{ url('admin/post/create') }}">Tambah berita</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-file-archive-o m-r-10" aria-hidden="true"></i>File</a>
                    <ul class="collapse">
                        <li><a href="{{ url('admin/file/') }}">Daftar File</a></li>
                        <li><a href="{{ url('admin/file/create') }}">Tambah File</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profil</a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
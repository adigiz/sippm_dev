<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ url('admin') }}" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect"><i class="fa fa-calendar m-r-10" aria-hidden="true"></i>Waktu Pengajuan</a>
                    <ul class="collapse">
                        <li><a href="{{ url('admin/waktu_pengajuan/create') }}">Tambah Waktu Pengajuan</a></li>
                        <li><a href="{{ url('admin/waktu_pengajuan/') }}">Lihat Waktu Pengajuan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect"><i class="fa fa-paste m-r-10" aria-hidden="true"></i>Pengajuan</a>
                    <ul class="collapse">
                        <li><a href="{{url('admin/persetujuan/')}}">Semua Pengajuan</a></li>
                        <li><a href="{{route('publikasi')}}">Penelitian</a></li>
                        <li><a href="{{route('admin.index.pengabdian')}}">Pengabdian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.sedang_berjalan')}}" class="waves-effect"><i class="fa fa-paper-plane m-r-10" aria-hidden="true"></i>Sedang Berjalan</a>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect"><i class="fa fa-book m-r-10" aria-hidden="true"></i>Berita </a>
                    <ul class="collapse">
                        <li><a href="{{ url('admin/post/') }}">Lihat Berita</a></li>
                        <li><a href="{{ url('admin/post/create') }}">Tambah berita</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect"><i class="fa fa-file-archive-o m-r-10" aria-hidden="true"></i>File</a>
                    <ul class="collapse">
                        <li><a href="{{ url('admin/file/') }}">Daftar File</a></li>
                        <li><a href="{{ url('admin/file/create') }}">Tambah File</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.riwayat') }}" class="waves-effect"><i class="fa fa-history m-r-10" aria-hidden="true"></i>Riwayat</a>
                </li>



            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
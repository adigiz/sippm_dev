<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ url('admin') }}" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Home</a>
                </li>

                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Pengajuan</a>
                    <ul class="collapse">
                        <li><a href="#">Daftar Pengajuan</a></li>
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
                    <a href="#" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profil</a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
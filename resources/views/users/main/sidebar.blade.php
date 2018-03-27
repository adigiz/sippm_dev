<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ url('home') }}" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Home</a>
                </li>

                <li>
                    <a href="table-basic.html" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Pengajuan</a>
                    <ul class="collapse">
                        <li><a href="{{ url('users/pengajuan_penelitian/create') }}">Penelitian</a></li>
                        <li><a href="{{ url('users/pengajuan_pengabdian/create') }}">Pengabdian</a></li>
                        <li><a href="{{url('users/daftar_pengajuan')}}">Daftar Pengajuan</a></li>
                        <li><a href="#">Log Harian</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profil</a>
                    <ul class="collapse">
                        <li><a href="{{ url('users/profil') }}">Halaman Profil</a></li>
                        <li><a href="#">Penelitian Terdahulu</a></li>
                    </ul>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
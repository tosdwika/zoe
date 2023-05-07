<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="index.html">
       <img src="{{ asset('pic') }}/full.png" class="img-fluid" alt="">
       {{-- <span><img src="{{ asset('pic') }}/name.png" width="130px" alt=""></span> --}}
       </a>
       <div class="iq-menu-bt-sidebar">
             <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                   <div class="main-circle"><i class="ri-more-fill"></i></div>
                   <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                </div>
             </div>
          </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li class="iq-menu-title"><i class="ri-subtract-line"></i><span></span></li>
             <li class="{{ '/' == request()->path() ? 'active' : '' }}">
               <a href="/" class="iq-waves-effect"><i class="ri-home-8-fill"></i><span>Beranda</span></a>
            </li>
            @if (auth()->user()->level == 1)
             <li class="{{ 'allbiodata' == request()->path() ? 'active' : '' }}">
                <a href="/allbiodata" class="iq-waves-effect"><i class="ri-briefcase-4-fill"></i><span>Admin</span></a>
             </li> 
             <li class="{{ 'lowongan' == request()->path() ? 'active' : '' }}">
               <a href="/lowongan" class="iq-waves-effect"><i class="ri-briefcase-4-fill"></i><span>Lowongan</span></a>
            </li>
            <li class="{{ 'divisi' == request()->path() ? 'active' : '' }}">
               <a href="/divisi" class="iq-waves-effect"><i class="ri-briefcase-4-fill"></i><span>Divisi</span></a>
            </li>
            @elseif (auth()->user()->level == 2)
             <li class="{{ 'biodata' == request()->path() ? 'active' : '' }}">
               <a href="/cekdaftar" class="iq-waves-effect"><i class="ri-group-fill"></i><span>Biodata</span></a>
             </li>
             <li class="{{ 'loker' == request()->path() ? 'active' : '' }}">
               <a href="/loker" class="iq-waves-effect"><i class="ri-group-fill"></i><span>Lowongan Kerja</span></a>
             </li>
             <li class="{{ 'riwayat_daftar' == request()->path() ? 'active' : '' }}">
               <a href="/riwayat_daftar" class="iq-waves-effect"><i class="ri-group-fill"></i><span>Riwayat Pendaftaran</span></a>
             </li>
            @endif
          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>
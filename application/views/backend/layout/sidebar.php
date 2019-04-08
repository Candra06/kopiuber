<!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Kopi <i>Uber</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="<?= base_url();?>dashboard" class="br-menu-link <?= (($this->uri->segment(1) == 'dashboard' ? 'active' : ''))?>">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
    

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?= (($this->uri->segment(1) == 'anggota' || $this->uri->segment(1) == 'pengurus' || $this->uri->segment(1) == 'aset' || $this->uri->segment(1) == 'jabatan' ? 'active' : ''))?>">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Master</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?= base_url('anggota') ?>" class="sub-link <?= (($this->uri->segment(1) == 'anggota' ? 'active' : ''))?>">Anggota</a></li>
            <li class="sub-item"><a href="<?= base_url('pengurus') ?>" class="sub-link <?= (($this->uri->segment(1) == 'pengurus' ? 'active' : ''))?>">Pengurus</a></li>
            <li class="sub-item"><a href="<?= base_url('aset') ?>" class="sub-link <?= (($this->uri->segment(1) == 'aset' ? 'active' : ''))?>">Data Aset</a></li>
            <li class="sub-item"><a href="<?= base_url('jabatan') ?>" class="sub-link <?= (($this->uri->segment(1) == 'jabatan' ? 'active' : ''))?>">Data Jabatan</a></li>
          </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?= (($this->uri->segment(1) == 'Prodi' || $this->uri->segment(1) == 'Prodi/fakultas' ? 'active' : ''))?>">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Simpanan</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?= base_url('Prodi/index') ?>" class="sub-link <?= (($this->uri->segment(1) == 'simpanan' ? 'active' : ''))?>">Data Simpanan</a></li>
          </ul>
        </li><!-- br-menu-item -->     

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?= (($this->uri->segment(1) == 'Prodi' || $this->uri->segment(1) == 'Prodi/fakultas' ? 'active' : ''))?>">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Prodi dan Fakultas</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?= base_url('Prodi/index') ?>" class="sub-link <?= (($this->uri->segment(1) == 'Prodi' ? 'active' : ''))?>">Prodi</a></li>
            <li class="sub-item"><a href="<?= base_url('Prodi/fakultas') ?>" class="sub-link <?= (($this->uri->segment(1) == 'Prodi/fakultas' ? 'active' : ''))?>">Fakultas</a></li>
            
          </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Website Profil</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?= base_url('Prodi/index') ?>" class="sub-link">Visi</a></li>
            <li class="sub-item"><a href="<?= base_url('Prodi/indexFakultas') ?>" class="sub-link">Misi</a></li>
            
          </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="<?= base_url('anggota') ?>" class="br-menu-link <?= (($this->uri->segment(1) == 'teknisi' ? 'active' : ''))?>">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Mitra</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="<?= base_url('kategori') ?>" class="br-menu-link <?= (($this->uri->segment(1) == 'kategori' ? 'active' : ''))?>">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Kategori Usaha</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        
      </ul><!-- br-sideleft-menu -->

      

      
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

   
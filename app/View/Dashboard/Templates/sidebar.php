  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link navbar-danger" style="display: flex;padding: 0.6rem 0.2rem; align-items: center;">
          <img src="<?= BASE_URL; ?>/img/logo_uin.jpg" alt="UIN Logo" class="brand-image img-circle elevation-3" style="opacity: .8;max-height: 50px;">
          <div style="display: flex;flex-direction: column;font-size: 15px;font-weight: 900;margin-left: 10px;">
              <span style="font-size: 12px;">SPK Pemilihan Program Studi</span>
              <span>UIN Imam Bonjol</span>
              <span>Padang</span>
          </div>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="justify-content: space-around;">
              <h2 style="font-weight: bolder; color:white">
                  MAIN MENU
              </h2>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <?php if (isset($_SESSION['user']) && $_SESSION['user']['Level'] == 'siswa') : ?>
                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/profil" class="nav-link">
                              <i class="nav-icon far fas fa-user"></i>
                              <p>
                                  Profil
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/profil/data-siswa" class="nav-link">
                              <i class="nav-icon far fas fa-database"></i>
                              <p>
                                  Data Siswa
                              </p>
                          </a>
                      </li>
                  <?php else : ?>
                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/kriteria" class="nav-link">
                              <i class="nav-icon far fas fa-box"></i>
                              <p>
                                  Data Kriteria
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/sub-kriteria" class="nav-link">
                              <i class="nav-icon far fas fa-boxes"></i>
                              <p>
                                  Data Sub Kriteria
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/alternatif" class="nav-link">
                              <i class="nav-icon far fas fa-users"></i>
                              <p>
                                  Data Alternatif
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/penilaian" class="nav-link">
                              <i class="nav-icon far fas fa-chart-line"></i>
                              <p>
                                  Data Penilaian
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/perhitungan" class="nav-link">
                              <i class="nav-icon far fas fa-calculator"></i>
                              <p>
                                  Data Perhitungan
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/hasil-akhir" class="nav-link">
                              <i class="nav-icon far fas fa-chart-line"></i>
                              <p>
                                  Data Hasil Akhir
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= BASE_URL; ?>dashboard/data-siswa" class="nav-link">
                              <i class="nav-icon far fas fa-users"></i>
                              <p>
                                  Data Siswa
                              </p>
                          </a>
                      </li>
                  <?php endif; ?>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
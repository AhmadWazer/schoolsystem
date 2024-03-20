<x-sidebar/>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">UI elements /</span> Tooltips & popovers
              </h4>

              <!-- Tooltips -->
              <div class="card mb-4">
                <h5 class="card-header">Tooltips</h5>
                <div class="card-body">
                  <div class="text-light small fw-semibold">Directions</div>
                  <div class="row demo-vertical-spacing">
                    <div class="col">
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="tooltip"
                        data-bs-offset="0,4"
                        data-bs-placement="right"
                        data-bs-html="true"
                        title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>"
                      >
                        Right
                      </button>
                    </div>
                    <div class="col">
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="tooltip"
                        data-bs-offset="0,4"
                        data-bs-placement="top"
                        data-bs-html="true"
                        title="<i class='bx bx-bell bx-xs' ></i> <span>Tooltip on top</span>"
                      >
                        Top
                      </button>
                    </div>
                    <div class="col">
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="tooltip"
                        data-bs-offset="0,4"
                        data-bs-placement="bottom"
                        data-bs-html="true"
                        title="<i class='bx bx-heart bx-xs' ></i> <span>Tooltip on bottom</span>"
                      >
                        Bottom
                      </button>
                    </div>
                    <div class="col">
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="tooltip"
                        data-bs-offset="0,4"
                        data-bs-placement="left"
                        data-bs-html="true"
                        title="<i class='bx bx-dollar bx-xs' ></i> <span>Tooltip on left</span>"
                      >
                        Left
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Tooltips -->

              <!-- Popovers -->
              <div class="card">
                <h5 class="card-header">Popovers</h5>
                <div class="card-body">
                  <div class="text-light small fw-semibold">Directions</div>
                  <div class="row demo-vertical-spacing">
                    <div class="col">
                      <button
                        type="button"
                        class="btn btn-primary text-nowrap"
                        data-bs-toggle="popover"
                        data-bs-offset="0,14"
                        data-bs-placement="right"
                        data-bs-html="true"
                        data-bs-content="<p>This is a very beautiful popover, show some love.</p> <div class='d-flex justify-content-between'><button type='button' class='btn btn-sm btn-outline-secondary'>Skip</button><button type='button' class='btn btn-sm btn-primary'>Read More</button></div>"
                        title="Popover Title"
                      >
                        Popover on right
                      </button>
                    </div>
                    <div class="col">
                      <button
                        type="button"
                        class="btn btn-primary text-nowrap"
                        data-bs-toggle="popover"
                        data-bs-offset="0,14"
                        data-bs-placement="top"
                        data-bs-html="true"
                        data-bs-content="<p>This is a very beautiful popover, show some love.</p> <div class='d-flex justify-content-between'><button type='button' class='btn btn-sm btn-outline-secondary'>Skip</button><button type='button' class='btn btn-sm btn-primary'>Read More</button></div>"
                        title="Popover Title"
                      >
                        Popover on top
                      </button>
                    </div>
                    <div class="col">
                      <button
                        type="button"
                        class="btn btn-primary text-nowrap"
                        data-bs-toggle="popover"
                        data-bs-offset="0,14"
                        data-bs-placement="bottom"
                        data-bs-html="true"
                        data-bs-content="<p>This is a very beautiful popover, show some love.</p> <div class='d-flex justify-content-between'><button type='button' class='btn btn-sm btn-outline-secondary'>Skip</button><button type='button' class='btn btn-sm btn-primary'>Read More</button></div>"
                        title="Popover Title"
                      >
                        Popover on bottom
                      </button>
                    </div>
                    <div class="col">
                      <button
                        type="button"
                        class="btn btn-primary text-nowrap"
                        data-bs-toggle="popover"
                        data-bs-offset="0,14"
                        data-bs-placement="left"
                        data-bs-html="true"
                        data-bs-content="<p>This is a very beautiful popover, show some love.</p> <div class='d-flex justify-content-between'><button type='button' class='btn btn-sm btn-outline-secondary'>Skip</button><button type='button' class='btn btn-sm btn-primary'>Read More</button></div>"
                        title="Popover Title"
                      >
                        Popover on left
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Popovers -->
            </div>
            <!-- / Content -->

           
<x-footer/>
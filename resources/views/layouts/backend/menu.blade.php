<nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-vibrant">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="/layout/crm/index.html">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="/layout/crm/images/logo.png" alt="" width="40" /><span class="font-sans-serif">NRNO</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
            
                  <a class="nav-link" href="/" role="button">
                    <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><svg class="svg-inline--fa fa-chart-pie fa-w-17" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg=""><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg></span>
                      <span class="nav-link-text ps-1">Dashboard</span>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Settings
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>
                  <a class="nav-link dropdown-indicator" href="#usermanage" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="usermanage">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-user-circle"></span></span><span class="nav-link-text ps-1">จัดการพนักงาน</span>
                    </div>
                  </a>
                  <ul class="nav collapse {{ request()->is(['user*','role*','permission*']) ? 'show' : '' }}" id="usermanage">
                  <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="{{ route('get-user-index') }}"  role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1"> - พนักงาน</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  <a class="nav-link {{ request()->is('role*') ? 'active' : '' }}" href="{{ route('get-role-index') }}"  role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1"> - ตำแหน่ง</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  <a class="nav-link {{ request()->is('permission*') ? 'active' : '' }}" href="{{ route('get-permission-index') }}"  role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1"> - สิทธิ์</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
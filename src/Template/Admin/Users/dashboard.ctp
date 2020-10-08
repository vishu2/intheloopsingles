<div class="container-fluid">
  <!-- Page title -->
  <!--<div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Dashboard
        </h2>
      </div>
    </div>
  </div>-->
  <div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-4">
      <div class="card dash_location">
				<a href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'dashboard', 'prefix' => 'admin/denver'])?>">
        <div class="card-body p-2 text-center">
          <div class="d-flex align-items-center">
            <div class="h2">Denver</div>
            <div class="ml-auto lh-1">
            </div>
          </div>

          <div class="h1 m-0"><?= $denverleads; ?></div>
          <div class="text-muted mb-4">New Leads</div>
          
          <!-- <div class="d-flex mb-2">
            <div>Conversion rate</div>
            <div class="ml-auto">
              <span class="text-green d-inline-flex align-items-center lh-1">
                7% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
              </span>
            </div>
          </div>
          <div class="progress progress-sm">
            <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <span class="sr-only">75% Complete</span>
            </div>
          </div> -->
        </div>
				</a>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="card dash_location">
				<a href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'dashboard', 'prefix' => 'admin/seattle'])?>"> 
          <div class="card-body p-2 text-center">
            <div class="d-flex align-items-center">
              <div class="h2">Seattle</div>
              <div class="ml-auto lh-1">
              </div>
            </div>

            <div class="h1 m-0"><?= $seattleleads; ?></div>
            <div class="text-muted mb-4">New Leads</div>
            
            <!-- <div class="d-flex mb-2">
              <div>Conversion rate</div>
              <div class="ml-auto">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  7% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                </span>
              </div>
            </div>
            <div class="progress progress-sm">
              <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">75% Complete</span>
              </div>
            </div> -->
          </div>
				</a>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="card dash_location">
				<a href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'dashboard', 'prefix' => 'admin/austin'])?>">
          <div class="card-body p-2 text-center">
            <div class="d-flex align-items-center">
              <div class="h2">Austin</div>
              <div class="ml-auto lh-1">
              </div>
            </div>

            <div class="h1 m-0"><?= $austinleads; ?></div>
            <div class="text-muted mb-4">New Leads</div>
            
            <!-- <div class="d-flex mb-2">
              <div>Conversion rate</div>
              <div class="ml-auto">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  7% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                </span>
              </div>
            </div>
            <div class="progress progress-sm">
              <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">75% Complete</span>
              </div>
            </div> -->
          </div>
				</a>
        </div>
    </div>
   <!--  <div class="col-sm-6 col-lg-3">
      <div class="card">
          <div class="card-body p-2 text-center">
            <div class="d-flex align-items-center">
              <div class="h2">Houston</div>
              <div class="ml-auto lh-1">
              </div>
            </div>

            <div class="h1 m-0">26</div>
            <div class="text-muted mb-4">New Leads</div>
            
            <div class="d-flex mb-2">
              <div>Conversion rate</div>
              <div class="ml-auto">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  8% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                </span>
              </div>
            </div>
            <div class="progress progress-sm">
              <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">75% Complete</span>
              </div>
            </div>
          </div>
        </div>
    </div> -->
    <!--
    <div class="col-lg-7">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Traffic summary</h3>
          <div id="chart-mentions" class="chart-lg"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Top countries</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <div class="embed-responsive-item">
              <div id="map-world" class="w-100 h-100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="row row-cards row-deck">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body p-4 py-5 text-center">
              <span class="avatar avatar-xl mb-4">W</span>
              <h3 class="mb-0">New website</h3>
              <p class="text-muted">Due to: 28 Aug 2019</p>
              <p class="mb-3">
                <span class="badge bg-red-lt">Waiting</span>
              </p>
              <div>
                <div class="avatar-list avatar-list-stacked">
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/000m.jpg'); ?>)"></span>
                  <span class="avatar">JL</span>
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/002m.jpg'); ?>"></span>
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/003m.jpg'); ?>)"></span>
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/000f.jpg'); ?>)"></span>
                </div>
              </div>
            </div>
            <div class="progress card-progress">
              <div class="progress-bar" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">38% Complete</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body p-4 py-5 text-center">
              <span class="avatar avatar-xl mb-4 bg-green-lt">W</span>
              <h3 class="mb-0">UI Redesign</h3>
              <p class="text-muted">Due to: 11 Nov 2019</p>
              <p class="mb-3">
                <span class="badge bg-green-lt">Final review</span>
              </p>
              <div>
                <div class="avatar-list avatar-list-stacked">
                  <span class="avatar">HS</span>
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/006m.jpg'); ?>)"></span>
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/004f.jpg'); ?>)"></span>
                </div>
              </div>
            </div>
            <div class="progress card-progress">
              <div class="progress-bar bg-green" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only">38% Complete</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body p-2 text-center">
              <div class="text-right text-green">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                </span>
              </div>
              <div class="h1 m-0">43</div>
              <div class="text-muted mb-4">New Tickets</div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body p-2 text-center">
              <div class="text-right text-red">
                <span class="text-red d-inline-flex align-items-center lh-1">
                  -2% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="3 7 9 13 13 9 21 17" /><polyline points="21 10 21 17 14 17" /></svg>
                </span>
              </div>
              <div class="h1 m-0">95</div>
              <div class="text-muted mb-4">Daily Earnings</div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body p-2 text-center">
              <div class="text-right text-green">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  9% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                </span>
              </div>
              <div class="h1 m-0">7</div>
              <div class="text-muted mb-4">New Replies</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div id="chart-development-activity" class="mt-4"></div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter">
            <thead>
              <tr>
                <th>User</th>
                <th>Commit</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="w-1">
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/000m.jpg'); ?>)"></span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Fix dart Sass compatibility (#29755)
                  </div>
                </td>
                <td class="text-nowrap text-muted">28 Nov 2019</td>
              </tr>
              <tr>
                <td class="w-1">
                  <span class="avatar">JL</span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Change deprecated html tags to text decoration classes (#29604)
                  </div>
                </td>
                <td class="text-nowrap text-muted">27 Nov 2019</td>
              </tr>
              <tr>
                <td class="w-1">
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/002m.jpg'); ?>)"></span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    justify-content:between ⇒ justify-content:space-between (#29734)
                  </div>
                </td>
                <td class="text-nowrap text-muted">26 Nov 2019</td>
              </tr>
              <tr>
                <td class="w-1">
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/003m.jpg'); ?>)"></span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Update change-version.js (#29736)
                  </div>
                </td>
                <td class="text-nowrap text-muted">26 Nov 2019</td>
              </tr>
              <tr>
                <td class="w-1">
                  <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/000f.jpg'); ?>)"></span>
                </td>
                <td class="td-truncate">
                  <div class="text-truncate">
                    Regenerate package-lock.json (#29730)
                  </div>
                </td>
                <td class="text-nowrap text-muted">25 Nov 2019</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card card-sm">
        <div class="card-body d-flex align-items-center">
          <span class="bg-blue text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
          </span>
          <div class="mr-3 lh-sm">
            <div class="strong">
              132 Sales
            </div>
            <div class="text-muted">12 waiting payments</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card card-sm">
        <div class="card-body d-flex align-items-center">
          <span class="bg-green text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="9" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" /></svg>
          </span>
          <div class="mr-3 lh-sm">
            <div class="strong">
              78 Orders
            </div>
            <div class="text-muted">32 shipped</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card card-sm">
        <div class="card-body d-flex align-items-center">
          <div class="mr-3">
            <div class="chart-sparkline chart-sparkline-square" id="sparkline-43"></div>
          </div>
          <div class="mr-3 lh-sm">
            <div class="strong">
              1,352 Members
            </div>
            <div class="text-muted">163 registered today</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card card-sm">
        <div class="card-body d-flex align-items-center">
          <div class="mr-3 lh-sm">
            <div class="strong">
              132 Comments
            </div>
            <div class="text-muted">16 waiting</div>
          </div>
          <div class="ml-auto">
            <div class="chart-sparkline chart-sparkline-square" id="sparkline-44"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Most Visited Pages</h4>
        </div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter">
            <thead>
              <tr>
                <th>Page name</th>
                <th>Visitors</th>
                <th>Unique</th>
                <th colspan="2">Bounce rate</th>
              </tr>
            </thead>
            <tr>
              <td>
                /about.html
                <a href="#" class="link-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                </a>
              </td>
              <td class="text-muted">4,896</td>
              <td class="text-muted">3,654</td>
              <td class="text-muted">82.54%</td>
              <td class="text-right">
                <div class="chart-sparkline" id="sparkline-45"></div>
              </td>
            </tr>
            <tr>
              <td>
                /special-promo.html
                <a href="#" class="link-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                </a>
              </td>
              <td class="text-muted">3,652</td>
              <td class="text-muted">3,215</td>
              <td class="text-muted">76.29%</td>
              <td class="text-right">
                <div class="chart-sparkline" id="sparkline-46"></div>
              </td>
            </tr>
            <tr>
              <td>
                /news/1,new-ui-kit.html
                <a href="#" class="link-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                </a>
              </td>
              <td class="text-muted">3,256</td>
              <td class="text-muted">2,865</td>
              <td class="text-muted">72.65%</td>
              <td class="text-right">
                <div class="chart-sparkline" id="sparkline-47"></div>
              </td>
            </tr>
            <tr>
              <td>
                /lorem-ipsum-dolor-sit-amet-very-long-url.html
                <a href="#" class="link-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                </a>
              </td>
              <td class="text-muted">986</td>
              <td class="text-muted">865</td>
              <td class="text-muted">44.89%</td>
              <td class="text-right">
                <div class="chart-sparkline" id="sparkline-48"></div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <a href="https://github.com/sponsors/codecalm" class="card card-sponsor" target="_blank" style="background-image: url(<?php echo $this->Url->image('sponsor-banner-homepage.svg'); ?>)">
        <div class="card-body"></div>
      </a>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Social Media Traffic</h4>
        </div>
        <table class="table card-table table-vcenter">
          <thead>
            <tr>
              <th>Network</th>
              <th colspan="2">Visitors</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Instagram</td>
              <td>3,550</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Twitter</td>
              <td>1,798</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 35.96%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Facebook</td>
              <td>1,245</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 24.9%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Pinterest</td>
              <td>854</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 17.08%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>VK</td>
              <td>650</td>
              <td class="w-50">
                <div class="progress progress-xs">
                  <div class="progress-bar bg-primary" style="width: 13.0%"></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6 col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tasks</h4>
        </div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter">
            <tr>
              <td class="w-1 pr-0">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input" checked>
                  <span class="form-check-label"></span>
                </label>
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Extend the data model.</a>
              </td>
              <td class="text-nowrap text-muted">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                January 01, 2019
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M5 12l5 5l10 -10" /></svg>
                  2/7
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                  3</a>
              </td>
              <td>
                <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/000m.jpg'); ?>)"></span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pr-0">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input">
                  <span class="form-check-label"></span>
                </label>
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Verify the event flow.</a>
              </td>
              <td class="text-nowrap text-muted">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                January 01, 2019
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M5 12l5 5l10 -10" /></svg>
                  3/10
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                  6</a>
              </td>
              <td>
                <span class="avatar">JL</span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pr-0">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input">
                  <span class="form-check-label"></span>
                </label>
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Database backup and maintenance</a>
              </td>
              <td class="text-nowrap text-muted">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                January 01, 2019
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M5 12l5 5l10 -10" /></svg>
                  0/6
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                  1</a>
              </td>
              <td>
                <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/002m.jpg'); ?>)"></span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pr-0">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input" checked>
                  <span class="form-check-label"></span>
                </label>
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Identify the implementation team.</a>
              </td>
              <td class="text-nowrap text-muted">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                January 01, 2019
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M5 12l5 5l10 -10" /></svg>
                  6/10
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                  12</a>
              </td>
              <td>
                <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/003m.jpg'); ?>)"></span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pr-0">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input">
                  <span class="form-check-label"></span>
                </label>
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Define users and workflow</a>
              </td>
              <td class="text-nowrap text-muted">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                January 01, 2019
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M5 12l5 5l10 -10" /></svg>
                  3/7
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                  5</a>
              </td>
              <td>
                <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/000f.jpg'); ?>)"></span>
              </td>
            </tr>
            <tr>
              <td class="w-1 pr-0">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input" checked>
                  <span class="form-check-label"></span>
                </label>
              </td>
              <td class="w-100">
                <a href="#" class="text-reset">Check Pull Requests</a>
              </td>
              <td class="text-nowrap text-muted">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                January 01, 2019
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M5 12l5 5l10 -10" /></svg>
                  2/9
                </a>
              </td>
              <td class="text-nowrap">
                <a href="#" class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg>
                  3</a>
              </td>
              <td>
                <span class="avatar" style="background-image: url(<?php echo $this->Url->image('avatars/000m.jpg'); ?>)"></span>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>-->
    
  </div>
</div>



    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
          chart: {
            type: "area",
            fontFamily: 'inherit',
            height: 40.0,
            sparkline: {
              enabled: true
            },
            animations: {
              enabled: false
            },
          },
          dataLabels: {
            enabled: false,
          },
          fill: {
            opacity: .16,
            type: 'solid'
          },
          stroke: {
            width: 2,
            lineCap: "round",
            curve: "smooth",
          },
          series: [{
            name: "Profits",
            data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
          }],
          grid: {
            strokeDashArray: 4,
          },
          xaxis: {
            labels: {
              padding: 0
            },
            tooltip: {
              enabled: false
            },
            axisBorder: {
              show: false,
            },
            type: 'datetime',
          },
          yaxis: {
            labels: {
              padding: 4
            },
          },
          labels: [
            '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
          ],
          colors: ["#206bc4"],
          legend: {
            show: false,
          },
        })).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
          chart: {
            type: "line",
            fontFamily: 'inherit',
            height: 40.0,
            sparkline: {
              enabled: true
            },
            animations: {
              enabled: false
            },
          },
          fill: {
            opacity: 1,
          },
          stroke: {
            width: [2, 1],
            dashArray: [0, 3],
            lineCap: "round",
            curve: "smooth",
          },
          series: [{
            name: "May",
            data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
          },{
            name: "April",
            data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
          }],
          grid: {
            strokeDashArray: 4,
          },
          xaxis: {
            labels: {
              padding: 0
            },
            tooltip: {
              enabled: false
            },
            type: 'datetime',
          },
          yaxis: {
            labels: {
              padding: 4
            },
          },
          labels: [
            '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
          ],
          colors: ["#206bc4", "#a8aeb7"],
          legend: {
            show: false,
          },
        })).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
          chart: {
            type: "bar",
            fontFamily: 'inherit',
            height: 40.0,
            sparkline: {
              enabled: true
            },
            animations: {
              enabled: false
            },
          },
          plotOptions: {
            bar: {
              columnWidth: '50%',
            }
          },
          dataLabels: {
            enabled: false,
          },
          fill: {
            opacity: 1,
          },
          series: [{
            name: "Profits",
            data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
          }],
          grid: {
            strokeDashArray: 4,
          },
          xaxis: {
            labels: {
              padding: 0
            },
            tooltip: {
              enabled: false
            },
            axisBorder: {
              show: false,
            },
            type: 'datetime',
          },
          yaxis: {
            labels: {
              padding: 4
            },
          },
          labels: [
            '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
          ],
          colors: ["#206bc4"],
          legend: {
            show: false,
          },
        })).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
          chart: {
            type: "bar",
            fontFamily: 'inherit',
            height: 240,
            parentHeightOffset: 0,
            toolbar: {
              show: false,
            },
            animations: {
              enabled: false
            },
            stacked: true,
          },
          plotOptions: {
            bar: {
              columnWidth: '50%',
            }
          },
          dataLabels: {
            enabled: false,
          },
          fill: {
            opacity: 1,
          },
          series: [{
            name: "Web",
            data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
          },{
            name: "Social",
            data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
          },{
            name: "Other",
            data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
          }],
          grid: {
            padding: {
              top: -20,
              right: 0,
              left: -4,
              bottom: -4
            },
            strokeDashArray: 4,
            xaxis: {
              lines: {
                show: true
              }
            },
          },
          xaxis: {
            labels: {
              padding: 0
            },
            tooltip: {
              enabled: false
            },
            axisBorder: {
              show: false,
            },
            type: 'datetime',
          },
          yaxis: {
            labels: {
              padding: 4
            },
          },
          labels: [
            '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26'
          ],
          colors: ["#206bc4", "#79a6dc", "#bfe399"],
          legend: {
            show: true,
            position: 'bottom',
            height: 32,
            offsetY: 8,
            markers: {
              width: 8,
              height: 8,
              radius: 100,
            },
            itemMargin: {
              horizontal: 8,
            },
          },
        })).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:on
      document.addEventListener("DOMContentLoaded", function() {
        $('#map-world').vectorMap({
          map: 'world_en',
          backgroundColor: 'transparent',
          color: 'rgba(120, 130, 140, .1)',
          borderColor: 'transparent',
          scaleColors: ["#d2e1f3", "#206bc4"],
          normalizeFunction: 'polynomial',
          values: (chart_data = {"af":16, "al":11, "dz":158, "ao":85, "ag":1, "ar":351, "am":8, "au":1219, "at":366, "az":52, "bs":7, "bh":21, "bd":105, "bb":3, "by":52, "be":461, "bz":1, "bj":6, "bt":1, "bo":19, "ba":16, "bw":12, "br":2023, "bn":11, "bg":44, "bf":8, "bi":1, "kh":11, "cm":21, "ca":1563, "cv":1, "cf":2, "td":7, "cl":199, "cn":5745, "co":283, "km":0, "cd":12, "cg":11, "cr":35, "ci":22, "hr":59, "cy":22, "cz":195, "dk":304, "dj":1, "dm":0, "do":50, "ec":61, "eg":216, "sv":21, "gq":14, "er":2, "ee":19, "et":30, "fj":3, "fi":231, "fr":2555, "ga":12, "gm":1, "ge":11, "de":3305, "gh":18, "gr":305, "gd":0, "gt":40, "gn":4, "gw":0, "gy":2, "ht":6, "hn":15, "hk":226, "hu":132, "is":12, "in":1430, "id":695, "ir":337, "iq":84, "ie":204, "il":201, "it":2036, "jm":13, "jp":5390, "jo":27, "kz":129, "ke":32, "ki":0, "kr":986, "undefined":5, "kw":117, "kg":4, "la":6, "lv":23, "lb":39, "ls":1, "lr":0, "ly":77, "lt":35, "lu":52, "mk":9, "mg":8, "mw":5, "my":218, "mv":1, "ml":9, "mt":7, "mr":3, "mu":9, "mx":1004, "md":5, "mn":5, "me":3, "ma":91, "mz":10, "mm":35, "na":11, "np":15, "nl":770, "nz":138, "ni":6, "ne":5, "ng":206, "no":413, "om":53, "pk":174, "pa":27, "pg":8, "py":17, "pe":153, "ph":189, "pl":438, "pt":223, "qa":126, "ro":158, "ru":1476, "rw":5, "ws":0, "st":0, "sa":434, "sn":12, "rs":38, "sc":0, "sl":1, "sg":217, "sk":86, "si":46, "sb":0, "za":354, "es":1374, "lk":48, "kn":0, "lc":1, "vc":0, "sd":65, "sr":3, "sz":3, "se":444, "ch":522, "sy":59, "tw":426, "tj":5, "tz":22, "th":312, "tl":0, "tg":3, "to":0, "tt":21, "tn":43, "tr":729, "tm":0, "ug":17, "ua":136, "ae":239, "gb":2258, "us":4624, "uy":40, "uz":37, "vu":0, "ve":285, "vn":101, "ye":30, "zm":15, "zw":5}),
          onLabelShow: function (event, label, code) {
            if (chart_data[code] > 0) {
              label.append(': <strong>' + chart_data[code] + '</strong>');
            }
          },
        });
      });
      // @formatter:off
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
          chart: {
            type: "area",
            fontFamily: 'inherit',
            height: 160,
            sparkline: {
              enabled: true
            },
            animations: {
              enabled: false
            },
          },
          dataLabels: {
            enabled: false,
          },
          fill: {
            opacity: .16,
            type: 'solid'
          },
          title: {
            text: "Development Activity",
            margin: 0,
            floating: true,
            offsetX: 10,
            style: {
              fontSize: '18px',
            },
          },
          stroke: {
            width: 2,
            lineCap: "round",
            curve: "smooth",
          },
          series: [{
            name: "Purchases",
            data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
          }],
          grid: {
            strokeDashArray: 4,
          },
          xaxis: {
            labels: {
              padding: 0
            },
            tooltip: {
              enabled: false
            },
            axisBorder: {
              show: false,
            },
            type: 'datetime',
          },
          yaxis: {
            labels: {
              padding: 4
            },
          },
          labels: [
            '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
          ],
          colors: ["#206bc4"],
          legend: {
            show: false,
          },
          point: {
            show: false
          },
        })).render();
      });
      // @formatter:on
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-43').text("56/100").peity("pie", {
          width: 40,
          height: 40,
          stroke: "#cd201f",
          strokeWidth: 2,
          fill: ["#cd201f", "rgba(110, 117, 130, 0.2)"],
          padding: .2,
          innerRadius: 17,
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-44').text("22/100").peity("pie", {
          width: 40,
          height: 40,
          stroke: "#fab005",
          strokeWidth: 2,
          fill: ["#fab005", "rgba(110, 117, 130, 0.2)"],
          padding: .2,
          innerRadius: 17,
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-45').text("17, 24, 20, 10, 5, 1, 4, 18, 13").peity("line", {
          width: 64,
          height: 40,
          stroke: "#206bc4",
          strokeWidth: 2,
          fill: ["#d2e1f3"],
          padding: .2,
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-46').text("13, 11, 19, 22, 12, 7, 14, 3, 21").peity("line", {
          width: 64,
          height: 40,
          stroke: "#206bc4",
          strokeWidth: 2,
          fill: ["#d2e1f3"],
          padding: .2,
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-47').text("10, 13, 10, 4, 17, 3, 23, 22, 19").peity("line", {
          width: 64,
          height: 40,
          stroke: "#206bc4",
          strokeWidth: 2,
          fill: ["#d2e1f3"],
          padding: .2,
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        $().peity && $('#sparkline-48').text("9, 6, 14, 11, 8, 24, 2, 16, 15").peity("line", {
          width: 64,
          height: 40,
          stroke: "#206bc4",
          strokeWidth: 2,
          fill: ["#d2e1f3"],
          padding: .2,
        });
      });
    </script>
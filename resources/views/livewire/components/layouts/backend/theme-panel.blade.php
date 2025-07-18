   <!-- BEGIN theme-panel -->
   <div class="theme-panel">
       <a class="theme-collapse-btn" data-toggle="theme-panel-expand" href="javascript:;"><i class="fa fa-cog"></i></a>
       <div class="theme-panel-content" data-scrollbar="true" data-height="100%">
           <h5>App Settings</h5>

           <!-- BEGIN theme-list -->
           <div class="theme-list">
               <div class="theme-list-item"><a class="theme-list-link bg-red" data-theme-class="theme-red"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Red" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-pink" data-theme-class="theme-pink"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Pink" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-orange" data-theme-class="theme-orange"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Orange" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-yellow" data-theme-class="theme-yellow"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Yellow" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-lime" data-theme-class="theme-lime"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Lime" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-green" data-theme-class="theme-green"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Green" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item active"><a class="theme-list-link bg-teal" data-theme-class=""
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Default" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-cyan" data-theme-class="theme-cyan"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Cyan" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-blue" data-theme-class="theme-blue"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Blue" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-purple" data-theme-class="theme-purple"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Purple" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-indigo" data-theme-class="theme-indigo"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Indigo" href="javascript:;">&nbsp;</a></div>
               <div class="theme-list-item"><a class="theme-list-link bg-black" data-theme-class="theme-gray-600"
                       data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       data-bs-container="body" data-bs-title="Black" href="javascript:;">&nbsp;</a></div>
           </div>
           <!-- END theme-list -->

           <div class="theme-panel-divider"></div>

           <div class="row mt-10px">
               <div class="col-8 control-label text-body fw-bold">
                   <div>Dark Mode <span class="badge bg-primary py-2px position-relative ms-1"
                           style="top: -1px;">NEW</span></div>
                   <div class="lh-14">
                       <small class="text-body opacity-50">
                           Adjust the appearance to reduce glare and give your eyes a break.
                       </small>
                   </div>
               </div>
               <div class="col-4 d-flex">
                   <div class="form-check form-switch mb-0 ms-auto">
                       <input type="checkbox" class="form-check-input" name="app-theme-dark-mode"
                           id="appThemeDarkMode" value="1" />
                       <label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
                   </div>
               </div>
           </div>

           <div class="theme-panel-divider"></div>

           <!-- BEGIN theme-switch -->
           <div class="row mt-10px align-items-center">
               <div class="col-8 control-label text-body fw-bold">Header Fixed</div>
               <div class="col-4 d-flex">
                   <div class="form-check form-switch mb-0 ms-auto">
                       <input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed"
                           value="1" checked />
                       <label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
                   </div>
               </div>
           </div>
           <div class="row mt-10px align-items-center">
               <div class="col-8 control-label text-body fw-bold">Header Inverse</div>
               <div class="col-4 d-flex">
                   <div class="form-check form-switch mb-0 ms-auto">
                       <input type="checkbox" class="form-check-input" name="app-header-inverse"
                           id="appHeaderInverse" value="1" />
                       <label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
                   </div>
               </div>
           </div>
           <div class="row mt-10px align-items-center">
               <div class="col-8 control-label text-body fw-bold">Sidebar Fixed</div>
               <div class="col-4 d-flex">
                   <div class="form-check form-switch mb-0 ms-auto">
                       <input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed"
                           value="1" checked />
                       <label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
                   </div>
               </div>
           </div>
           <div class="row mt-10px align-items-center">
               <div class="col-8 control-label text-body fw-bold">Sidebar Grid</div>
               <div class="col-4 d-flex">
                   <div class="form-check form-switch mb-0 ms-auto">
                       <input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid"
                           value="1" />
                       <label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
                   </div>
               </div>
           </div>
           <div class="row mt-10px align-items-center">
               <div class="col-8 control-label text-body fw-bold">Gradient Enabled</div>
               <div class="col-4 d-flex">
                   <div class="form-check form-switch mb-0 ms-auto">
                       <input type="checkbox" class="form-check-input" name="app-gradient-enabled"
                           id="appGradientEnabled" value="1" />
                       <label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
                   </div>
               </div>
           </div>
           <!-- END theme-switch -->

           <div class="theme-panel-divider"></div>

           <a class="btn btn-default d-block w-100 rounded-pill" data-toggle="reset-local-storage"
               href="javascript:;"><b>Reset Local Storage</b></a>
       </div>
   </div>
   <!-- END theme-panel -->

<!-- Footer --></div>
      <div class="flex-grow-1"></div>
            <footer class="footer mt-1">
                <p>Copyright © 2019 Plab. All rights reserved</p>
            </footer>
        </div>
        <!-- End Main Content Wrapper -->

        <!-- Theme Color customizer Right Modal -->
        <div class="customizer-toggle" data-toggle="modal" data-target="#ThemeColorCustomizer">
            <i data-feather="settings" class="spin icon mt-minus-2"></i>
        </div>
      
        <div class="modal right color-customizer-modal fade" id="ThemeColorCustomizer">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Theme Color Customizer</h4>
                    </div>
    
                    <div class="modal-body">
                        <!-- Left SideMenu Color Switcher -->
                        <div class="color-content">
                            <h5>Left SideMenu Color</h5>
                            <p class="mb-2">Change SideMenu background color</p>
							<ul class="customize-sidemenu">
								<li id="BGPrimary" class="bg_primary"></li>
								<li id="BGPurpleIndigo" class="purple_indigo"></li>
								<li id="BGPink" class="bg_pink"></li>
								<li id="BGnNightBlue" class="bg_night_blue"></li>
								<li id="BGIndigo" class="bg_indigo"></li>
								<li id="BGSuccess" class="bg_success"></li>
								<li id="BGSecondary" class="bg_secondary"></li>
								<li id="BGPurple" class="bg_purple"></li>
								<li id="BGGray" class="bg_gray"></li>
								<li id="BGDanger" class="bg_danger"></li>
								<li id="BGGrayBlue" class="bg_gray_blue"></li>
								<li id="BGGreen" class="bg_green"></li>
								<li id="BGWarning" class="bg_warning"></li>
								<li id="BGDeepPurple" class="bg_deep_purple"></li>
							</ul>
                        </div>

                        <!-- Left SideMenu Folded Menu -->
                        <div class="color-content">
                            <h5>Folded Menu</h5>
                            <p>Toggle Folded Menu</p>
                             
                            <div class="side-menu-switch">
                                <label class="switch">
                                    <input type="checkbox" class="light">
                                    <span class="slider round folded-menu"></span>
                                </label> 
                            </div>
                        </div>

                        <!-- Card Shadow ide & Show -->
                        <div class="color-content">
                            <h5>Card Shadow</h5>
                            <p>Show &amp; Hide Card Shadow</p>
                                
                            <div class="side-menu-switch">
                                <label class="switch">
                                    <input type="checkbox" class="light">
                                    <span class="slider round card-shadow"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Theme Color customizer -->
 


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script data-cfasync="false" src="{{ asset('js/email-decode.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Feather Icon JS -->
        <script src="{{ asset('js/feather.min.js') }}"></script>
        <!-- Gllery viewer JS -->
        <script src="{{ asset('js/viewer.min.js') }}"></script>
		<!-- Calendar JS -->
        <script src="{{ asset('js/moment-with-locales.js') }}"></script>
        <!-- <script src="{{ asset('js/calendar.js') }}"></script> -->
        <!-- ApexCharts JS -->
        <!-- <script src="{{ asset('js/apexcharts.min.js') }}"></script>
        <script src="{{ asset('js/apexcharts-stock-prices.js') }}"></script>
        <script src="{{ asset('js/apex-line-charts.js') }}"></script>
        <script src="{{ asset('js/apex-area-charts.js') }}"></script>
        <script src="{{ asset('js/apex-bar-charts.js') }}"></script>
        <script src="{{ asset('js/apex-mixed-charts.js') }}"></script>
        <script src="{{ asset('js/apex-pie-donuts-charts.js') }}"></script>
        <script src="{{ asset('js/sales-by-countries.js') }}"></script>
        <script src="{{ asset('js/month-sales-statistics.js') }}"></script>
        <script src="{{ asset('js/order-summary.js') }}"></script>
        <script src="{{ asset('js/visitors-overview.js') }}"></script>
        <script src="{{ asset('js/leads-stats.js') }}"></script>
        <script src="{{ asset('js/apex-column-charts.js') }}"></script> -->
        <!-- Custom chart JS -->
        <!-- <script src="{{ asset('js/custom-chart.    js') }}"></script> -->
        <!-- Custom JS -->
        <script src="{{ asset('js/custom.js') }}"></script>
    
</body></html>
    <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li><a href="/home" class="has-arrow" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a></li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-select-inverse"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('sa.acl-list')}}">Access-Control-List</a></li>
                                <li><a href="{{route('sa.role')}}">Role Settings</a></li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">HRM</span></a>
                            <ul aria-expanded="false" class="collapse">
                              <li><a href="/epmdashboard">Dashboard</a></li>
                              <li><a href="/employee">Employee form 1</a></li>
                              <li><a href="{{route('leavem.index')}}">Leave Requisition</a></li>
                              <li><a href="#">PayRoll</a></li>
                              <li><a href="#">Attendance</a></li>
                                <li>
                                    <a class="has-arrow" href="#" aria-expanded="false">Settings</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="/department">Department</a></li>
                                        <li><a href="/divisions">Division</a></li>
                                        <li><a href="/workingplace">Working Place</a></li>
                                        <li><a href="/employmenttype">Employment Type</a></li>
                                        <li><a href="/designation">Designation</a></li>
                                        <li><a href="/leave">Leave</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span class="hide-menu">Sales & Accounts</span></a>
                            <ul aria-expanded="false" class="collapse">
                              
                                <li>
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i> Client</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('acc.client_info_list')}}"><i class="mdi mdi-account-edit"></i> Client Info</a></li>
                                        <li><a href="#"><i class="mdi mdi-account-card-details"></i> Client Transaction</a></li>
                                        <li><a href="#"><i class="mdi mdi-account-minus"></i> Client Due</a></li>
                                        <li><a href="{{route('acc.client_settings')}}"><i class="mdi mdi-account-settings-variant"></i> Settings</a> </li>
                                        <li><a href="#"><i class="mdi mdi-note-text"></i> Reports</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-account-switch"> </i> Supplier</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('acc.supplier_list')}}"><i class="mdi mdi-account-edit"></i> Supplier Info</a></li>
                                        <li><a href="#"><i class="mdi mdi-account-star"></i> Supplier Transaction</a></li>
                                        <li><a href="#"><i class="mdi mdi-factory"></i> Supplier Products</a></li>
                                        <li><a href="#"><i class="mdi mdi-account-settings-variant"></i> Settings</a></li>
                                        <li><a href="#"><i class="mdi mdi-clipboard-text"></i> Reports</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book"></i> Product</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('index.products')}}"><i class="mdi mdi-basket-unfill"></i>Product Info</a></li>

                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-select-inverse"></i><span class="hide-menu">Settings</span></a>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="{{route('product.setting.index')}}">Model information</a></li>
                                                <li><a href="{{route('product.brand.index')}}">Brand Information</a></li>

                                            </ul>
                                    </li>


                                      

                                        <li><a href="#"><i class="mdi mdi-clipboard-text"></i> Reports</a></li>
                                    </ul>
                                </li>


                                 <li>
                                    <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-basket-fill"></i> Inventory</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('index.stock.product')}}"><i class="mdi mdi-basket-unfill"></i>Stock In</a></li>
                                         <li><a href="{{route('index.products')}}"><i class="mdi mdi-basket-unfill"></i>Stock Out</a></li>
                                      
                                         <li><a href="{{route('stock.product.reports')}}"><i class="mdi mdi-account-settings-variant"></i> Stock Reports</a> </li>
                                        
                                    </ul>
                                </li>


                                 <li>
                                    <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cart"></i> sells Product </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('sells.product.create')}}"><i class="mdi mdi-arrow-right"></i>Sells Product</a></li>                                        
                                      
                                         <li><a href="{{route('stock.product.reports')}}"><i class="mdi mdi-account-settings-variant"></i> Manage Sells Reports</a> </li>
                                        
                                    </ul>
                                </li>




                            </ul>
                        </li>

                        
                        
                       @stack('after-sidebar')
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

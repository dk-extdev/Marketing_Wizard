<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

            <li class="nav-item start">
                <a href="{{ route('dashboard') }}" class="nav-link "><i class="icon-home"></i><span class="title">Dashboard</span></a>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Manage Category</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('category.index') }}" class="nav-link ">
                            <span class="title">Manage Base Category</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('subcategory.index') }}" class="nav-link ">
                            <span class="title">Manage Sub Category</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Manage Question</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('question.index') }}" class="nav-link ">
                            <span class="title">All Question</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('question.create') }}" class="nav-link ">
                            <span class="title">Create Question</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a href="{{ route('payment-method') }}" class="nav-link nav-toggle">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="title">Payment Method</span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="title">Currency</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('currency.create') }}" class="nav-link ">
                            <span class="title">Add Currency</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('currency.index') }}" class="nav-link ">
                            <span class="title">Manage Currency</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Web Setting</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('logo') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Logo Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('favicon') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Favicon Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('title') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Web Title Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('footer') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Web Footer Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('slider') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Slider Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('offer') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Offer Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('history') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> History Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('social') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Social Link Setting
                        </a>
                    </li>
                    {{--<li class="nav-item">
                        <a href="{{ route('payment') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Payment Setting
                        </a>
                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ route('partner') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Partner Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> Contact Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('aboutus') }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i> About Us Setting
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
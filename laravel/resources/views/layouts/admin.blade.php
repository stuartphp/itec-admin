<!doctype html>
<html lang="{{ (Auth::user()->language)??'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Attela - @yield('title')</title>
     <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{asset('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="{{asset('vendors/summernote/summernote-lite.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/custom.css')}}?<?php echo md5(time())?>" rel="stylesheet" />
    @livewireStyles
    @yield('css')
    @stack('css')
    <style>
.flatpickr-calendar
{
z-index: 110050 !important;
}
</style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand text-success" href="/home">Attela <sup><i>erp</i></sup></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-menu-up"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              {{ session()->get('trading_name') }} | {{ session()->get('financial_year') }} | {{ __('global.period').':'.session()->get('financial_period') }}
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link {{request()->is('dashboard') ? 'active' : ''}}" data-toggle="tooltip" title="{{ __('global.dashboard') }}">
                        <i class="bi bi-speedometer2 fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item  {{request()->is('sales') ? 'open' : ''}}">
                    <a class="nav-link " href="/" data-toggle="tooltip" title="{{ __('global.menu.sales.title') }}">
                        <i class="bi bi-graph-up fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.sales.title') }}</span>
                    </a>
                </li>
                <li class="nav-item  {{request()->is('purchases') ? 'open' : ''}}">
                    <a class="nav-link " href="/" data-toggle="tooltip" title="{{ __('global.menu.purchases.title') }}">
                        <i class="bi bi-cart3 fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.purchases.title') }}</span>
                    </a>
                </li>
                @if(count(array_intersect(session()->get('grant'), ['SU','website_access']))==1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown {{request()->is('website/*') ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" title="{{ __('global.menu.website.title') }}">
                      <span><i class="bi bi-display fa-menu d-none d-sm-block"></i></span> <span class="d-block d-sm-none">{{ __('global.menu.website.title') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navAccounting">
                        @if(count(array_intersect(session()->get('grant'), ['SU','asset_groups_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/asset-groups') ? 'active' : ''}}" href="/">{{ __('asset_groups.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','asset_types_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/asset-types') ? 'active' : ''}}" href="/">{{ __('asset_types.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','assets_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/assets') ? 'active' : ''}}" href="/">{{ __('assets.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','counters_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/counters') ? 'active' : ''}}" href="/">{{ __('counters.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','journal_entries_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/journal-entries') ? 'active' : ''}}" href="/">{{ __('journal_entries.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','journals_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/journals') ? 'active' : ''}}" href="/">{{ __('journals.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','ledgers_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/ledgers') ? 'active' : ''}}" href="/">{{ __('ledgers.title') }}</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{request()->is('accounting/roll-over') ? 'active' : ''}}" href="/">Roll Over</a></li>

                    </ul>
                </li>
                @endif
                @if(count(array_intersect(session()->get('grant'), ['SU','products']))==1)

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown {{request()->is('admin/products*') ? 'active' : ''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" title="{{ __('global.menu.products.title') }}">
                      <i class="bi bi-box fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.products.title') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(count(array_intersect(session()->get('grant'), ['SU','products']))==1)
                        <li><a class="dropdown-item {{request()->is('admin/products/items*') ? 'active' : ''}}" href="/admin/products/items">{{ __('products.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','products_categories']))==1)
                        <li><a class="dropdown-item {{request()->is('admin/products/categories*') ? 'active' : ''}}" href="/admin/products/categories">{{ __('product_categories.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','product_units']))==1)
                        <li><a class="dropdown-item {{request()->is('admin/products/units*') ? 'active' : ''}}" href="/admin/products/units">{{ __('product_units.title') }}</a></li>
                        @endif
                        <li>
                    </ul>
                </li>

                @endif
                <li class="nav-item">
                    <a class="nav-link dropdown {{request()->is('calendars/*') ? 'active' : ''}}" href="/calendars/data" data-toggle="tooltip" title="{{ __('global.menu.calendars.title') }}">
                        <i class="bi bi-calendar fa-menu d-none d-sm-block"></i>  <span class="d-block d-sm-none">{{ __('global.menu.calendars.title') }}</span>
                    </a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('customers/*') ? 'active' : ''}}" href="/" id="navCustomer" data-toggle="tooltip" title="{{ __('global.menu.customers.title') }}">
                        <i class="bi bi-person fa-menu d-none d-sm-block"></i>  <span class="d-block d-sm-none">{{ __('global.menu.customers.title') }}</span>
                    </a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('suppliers/*') ? 'active' : ''}}" href="/" id="navSupplier" role="button" data-toggle="tooltip" title="{{ __('global.menu.suppliers.title') }}"><i class="bi bi-truck fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.suppliers.title') }}</span>
                    </a>
                  </li>
                @if(count(array_intersect(session()->get('grant'), ['SU','documents_access']))==1)
                <li class="nav-item">
                    <a class="nav-link {{(request()->is('documents/*')) || (request()->is('documents')) ? 'active' : ''}}" href="/documents/documents" data-toggle="tooltip" title="{{ __('global.menu.documents.title') }}">
                        <i class="bi bi-file-earmark fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.documents.title') }}</span>
                    </a>
                  </li>
                  @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown {{request()->is('accounting/*') ? 'active' : ''}}" href="#" id="navAccounting" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" title="{{ __('global.menu.accounting.title') }}">
                        <i class="bi bi-book fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.accounting.title') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navAccounting">
                        @if(count(array_intersect(session()->get('grant'), ['SU','asset_groups_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/asset-groups') ? 'active' : ''}}" href="/">{{ __('asset_groups.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','asset_types_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/asset-types') ? 'active' : ''}}" href="/">{{ __('asset_types.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','assets_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/assets') ? 'active' : ''}}" href="/">{{ __('assets.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','counters_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/counters') ? 'active' : ''}}" href="/">{{ __('counters.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','journal_entries_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/journal-entries') ? 'active' : ''}}" href="/">{{ __('journal_entries.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','journals_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/journals') ? 'active' : ''}}" href="/">{{ __('journals.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','ledgers_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/ledgers') ? 'active' : ''}}" href="/">{{ __('ledgers.title') }}</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{request()->is('accounting/roll-over') ? 'active' : ''}}" href="/">Roll Over</a></li>

                    </ul>
                  </li>
                @if(count(array_intersect(session()->get('site_access'), ['employees']))==1)
                <li class="nav-item">
                    <a class="nav-link {{request()->is('human-resource/*') ? 'active' : ''}}" href="/" id="navHr" data-toggle="tooltip" title="{{ __('global.menu.employees.title') }}">
                        <i class="bi bi-suit-heart fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.hr.title') }}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown {{request()->is('payroll/*') ? 'active' : ''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" title="{{ __('global.menu.payroll.title') }}">
                      <i class="bi bi-wallet2 fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.payroll.title') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(count(array_intersect(session()->get('grant'), ['SU','payroll_templates_access']))==1)
                        <li><a class="dropdown-item {{request()->is('payroll/payroll-templates') ? 'active' : ''}}" href="/">{{ __('payroll_templates.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','payroll_transaction_codes_access']))==1)
                        <li><a class="dropdown-item {{request()->is('payroll/payroll-transaction-codes') ? 'active' : ''}}" href="/">{{ __('payroll_transaction_codes.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','payroll_transactions_access']))==1)
                        <li><a class="dropdown-item {{request()->is('payroll/payroll-transactions') ? 'active' : ''}}" href="/">{{ __('payroll_transactions.title') }}</a></li>
                        @endif
                      <li><hr class="dropdown-divider"></li>
                        @if(count(array_intersect(session()->get('grant'), ['SU','payroll_run_access']))==1)
                        <li><a class="dropdown-item {{request()->is('payroll/run') ? 'active' : ''}}" href="#">{{ __('payroll.run') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(count(array_intersect(session()->get('grant'), ['SU','setup_access']))==1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown {{request()->is('admin/settings/*') ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" title="{{ __('global.menu.setup.title') }}">
                      <span><i class="bi bi-gear fa-menu d-none d-sm-block"></i></span> <span class="d-block d-sm-none">{{ __('global.menu.setup.title') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navAccounting">
                        @if(count(array_intersect(session()->get('grant'), ['SU','asset_groups_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/asset-groups') ? 'active' : ''}}" href="/">{{ __('asset_groups.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','asset_types_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/asset-types') ? 'active' : ''}}" href="/">{{ __('asset_types.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','assets_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/assets') ? 'active' : ''}}" href="/">{{ __('assets.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','counters_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/counters') ? 'active' : ''}}" href="/">{{ __('counters.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','journal_entries_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/journal-entries') ? 'active' : ''}}" href="/">{{ __('journal_entries.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','journals_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/journals') ? 'active' : ''}}" href="/">{{ __('journals.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','ledgers_access']))==1)
                            <li><a class="dropdown-item {{request()->is('accounting/ledgers') ? 'active' : ''}}" href="/">{{ __('ledgers.title') }}</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{request()->is('admin/settings/users*') ? 'active' : ''}}" href="/admin/settings/users">{{ __('global.menu.setup.sub.users') }}</a></li>

                    </ul>
                </li>
                @endif

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown {{request()->is('user-management/*') ? 'active' : ''}}" href="#" id="userManagement" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" title="{{ __('global.menu.users.title') }}">
                        <i class="bi bi-people fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.menu.users.title') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userManagement">
                        @if(count(array_intersect(session()->get('grant'), ['SU','users_access']))==1)
                        <li><a class="dropdown-item {{request()->is('user-management/users') ? 'active' : ''}}" href="/">{{ __('users.title') }}</a></li>
                        @endif
                        @if(count(array_intersect(session()->get('grant'), ['SU','roles_access']))==1)
                        <li><a class="dropdown-item {{request()->is('user-management/roles') ? 'active' : ''}}" href="/">{{ __('roles.title') }}</a></li>
                        @endif
                        @if(\Auth::user()->email=='stuart@itecassist.co.za')
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{request()->is('user-management/permissions') ? 'active' : ''}}" href="/">{{ __('permissions.title') }}</a></li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="tooltip" title="">
                        &nbsp;
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown {{request()->is('help/*') ? 'active' : ''}}" href="#" id="navHelp" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-question fa-menu d-none d-sm-block"></i> <span class="d-block d-sm-none">{{ __('global.help') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navHelp">
                      <li><a class="dropdown-item {{request()->is('help/inventory') ? 'active' : ''}}" href="/">{{ __('global.menu.inventory.title') }}</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
            </ul>
            <span class="navbar-text">
                <div class="btn-group  dropstart">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/images/{{ (auth()->user()->image>'') ? auth()->user()->image : 'no-profile-pic.png' }}" style="height:23px"/>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/admin/users/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ __('global.logout') }}</a></li>
                    </ul>
                  </div>
            </span>
          </div>

        </div>
      </nav>
<div class="app-body">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>

<form id="logoutform" action="{{ url('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
    <div id="loadImg" style="display: none"><img src="/images/ajax-loader.gif" width="100px"/></div>
 <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/jquery/dist/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{asset('vendors/select2/dist/js/select2.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{asset('vendors/summernote/summernote-lite.min.js')}}"></script>
<script src="{{ asset('js/accounting.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

$('.nav-item').on('click', function () {
    $('#loadImg').toggle();
});
let add="{{ __('global.add_new_record') }}";
let update="{{ __('global.update') }}";
let sideMenu=350;
function openNav() {
    document.getElementById("mySidenav").style.width = ""+sideMenu+"px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
$(document).on("show.bs.modal", '.modal', function (event) {
    console.log("Global show.bs.modal fire");
    var zIndex = 100000 + (10 * $(".modal:visible").length);
    $(this).css("z-index", zIndex);
    setTimeout(function () {
        $(".modal-backdrop").not(".modal-stack").first().css("z-index", zIndex - 1).addClass("modal-stack");
    }, 0);
}).on("hidden.bs.modal", '.modal', function (event) {
    console.log("Global hidden.bs.modal fire");
    $(".modal:visible").length && $("body").addClass("modal-open");
});
$(document).on('inserted.bs.tooltip', function (event) {
    console.log("Global show.bs.tooltip fire");
    var zIndex = 100000 + (10 * $(".modal:visible").length);
    var tooltipId = $(event.target).attr("aria-describedby");
    $("#" + tooltipId).css("z-index", zIndex);
});
$(document).on('inserted.bs.popover', function (event) {
    console.log("Global inserted.bs.popover fire");
    var zIndex = 100000 + (10 * $(".modal:visible").length);
    var popoverId = $(event.target).attr("aria-describedby");
    $("#" + popoverId).css("z-index", zIndex);
});
        $(document).ready(function() {
            $('.select').select2();
        });
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
        window.addEventListener('modal', event => {
            $('#' + event.detail.modal).modal(event.detail.action);
        });
        @if(session()->has('success')) toastr['success']("{!! session()->get("success") !!}"); @endif
        function notice(type, title, message = '') {
            //var messageModal = document.getElementById('Message');
            switch (type) {
                case 'error':
                    $('#message-title').html('<i class="fa fa-times-circle text-danger"></i> ' + title);
                    $('#message-body').html(message);
                    break;
                case 'warning':
                    $('#message-title').html('<i class="fa fa-info-circle text-warning"></i> ' + title);
                    $('#message-body').html(message);
                    break;
            }
            $('#Message').modal('show');
            setTimeout(function() {
                $('#Message').modal('hide');
            }, 4000);
        }
</script>
@yield('scripts')
@stack('scripts')
</body>
</html>

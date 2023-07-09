<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <img src="{{ asset('template') }}/img/elements/logo.gif" width="30">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Canteen</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @php
            use Illuminate\Support\Facades\Auth;
            
            $pesanan_utama = Auth::user()
                ->transaction()
                ->where('status', 0)
                ->first();
            
            $notif = $pesanan_utama ? $pesanan_utama->detailtransaction->count() : 0;
        @endphp
        <!-- Dashboard -->


        @if (Auth::user()->role == 'Tenant')
            <li class="menu-item">
                <a href="/dashboard/Tenant" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/product" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Product</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/tenant/pesanan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Notif Order</div>
                    {{-- @if ($orderCount > 0)
                        <span class="badge bg-danger rounded-pill">{{ $orderCount }}</span>
                    @endif --}}
                </a>
            </li>

            <li class="menu-item">
                <a href="/tenant/riwayat-pesanan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-history"></i>
                    <div data-i18n="Basic">Riwayat Order</div>
                </a>
            </li>
            
        @endif


        @if (Auth::user()->role == 'Administrator')
            <li class="menu-item">
                <a href="/dashboard/Administrator" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Layouts">Master User</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="/users/create" class="menu-link">
                            <div data-i18n="Without navbar">Register</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/users" class="menu-link">
                            <div data-i18n="Without navbar">Data Users</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="/category" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Category</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">History Transaction</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/deposit" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-money"></i>
                    <div data-i18n="Basic">Deposit</div>
                </a>
            </li>
        @endif


        @if (Auth::user()->role == 'Member')
            <li class="menu-item">
                <a href="/dashboard/Member" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/member/history-deposit" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-money"></i>
                    <div data-i18n="Basic">Riwayat Deposit</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/" class="menu-link">
                    <i class="menu-icon tf-icons"><img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAgRJREFUSEu9lbGLE1EQxr/ZXArhECuP828QU4iFnSIWh6Ai2JyVxe6SZN4dyCFol0Y8bWLee/F2A3ZaBC30xEpQsBFEEO9vUM9cYwotPNyRPbLgXrKbbLi4zfIx781vlpn5ljDjh2acHyMBoTESgz3mvfg4nVdkFuA7gKN/SqWFarXaC43J1cUB1r6CyBKJ3HWVuhWO0YUBnXb7pETRh/giOc6p+J2n3VrtYxYks8mhtfchsibAps98MbR2HSI3s3RhQBAEi7S7+1WAbZ95sdNsLsjc3HaWLgyYZHr2T9coyP/bg9CYNwDOHNDivfWYz+4NSZIwNKYP4PABAfoe85EUINB6i4iOi8gJX6mtaUAbrVbFcZxPAD57zJX0FwyWSYCaz/xwGkCotQJRKxnlNEDrVRA1IfLeU+r0VABj4uorBLDLbFMAa+18WeQbgHmIXPKUelEE0rH2iog8A9CXcvmY7/u/UoBYdLS+LkSPAPykKFpyV1beTQLZMOacA2wCOCQi13ylniT3hvagY0xbgCqA37E1eEo9yIOEWq+B6A6AMgEtl3n13/NDgG63W/rR690DcGNw8LnHfHkUJNT6JYguDGLrX3Z2bjcajSgXkAQDrZeJ6HGskx/PfkhiFUR01a3Xnxa2iiTBuD5kFTDU5BEVjrcPotdevX5+KjcdV/kk8Zm76V/ImAko9mb3uQAAAABJRU5ErkJggg==" /></i>
                    <div data-i18n="Analytics">Product</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/check-out" class="menu-link">
                    <i class="menu-icon tf-icons"><img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAeBJREFUSEvNlDFoVEEQhv+5RBELU4QoJIUIgRSWKUw6C1PaCEIKiRC8PbidvKQ5Ul5KERvZ2ZB9ySFoIaSxsVOwE7WwSpWUChHERkgu4XA3PJILl8u7d08ukWy5+zPf/LMzQzjnQ+ccH/8PEIuEIzc7BNSKzPNn4e7YQQvgMK73UyqKPvQKOVWiWGQRwFMA7xTz/TRAMxnF3LXEpwQiMngZ+Amgr5/o5qzW39shPQGSYM7a1xTCIxA9U1onjk6cngErIpMF4BMBv+vej0RRtB+LeKBj13nF3JdWzo41jEU2ANwmosdFrV/lAcTGGBAxiF4orRcSYEfAqjEqEDkAXxXzndbs0krknLtEjcYvAAMAxhTzZibAOXeVGo1tANcCMF5i/taEpAFikWkAbwB8UcwTTW1mmzUtB+BliXk2E2Dte4RwLwDFEvNaLsCataM+hC0A+3veX4+i6E/aR9aMGf5L9APA7pV6/cZMpbKTC5CIYpGPAO4ihIqam3ueBnDGLBFRFUQ1pfWTVk3XSXTGPCSi9TwrgwqFyWK5/PmfANVqtX9kaCjpiFtdIG8V84N2TVcHeTLP0uQCxNZahFAG0bLSWp+YiYy3zDlIG6zkrn2Dtq75tO16MRz08g+5HFxowAHCX8oZa5S2NgAAAABJRU5ErkJggg==" />
                    </i>
                    <div data-i18n="Basic">Check Out </div>
                    <span class="badge bg-danger rounded-pill">{{ $notif }}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="/history" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">History Transaction</div>
                </a>
            </li>
        @endif
    </ul>
</aside>

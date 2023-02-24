<div id="shopify-section-footer" class="shopify-section shopify-section--footer">
    <style>
    #shopify-section-footer .footer {

    --background: #343232;
    --heading-color: ;
    --text-color: white;
    --border-color: color_mix(85%, #343232);
    }
    </style>
    <footer class="footer py-10 footer--bordered">
        <div class="container">
        <div class="footer__inner">
            <div class="footer__item-list grid gap-10 grid content-between">
            <div class="footer__item footer__item--text is-first">
            <!-- Text -->
                <div class="footer__item-content">
                <p>Số ĐKKD 011111111</p>
                <p>Địa chỉ: Phòng 23, tầng 10, Tòa nhà DPCH</p>
                <p>số 343 đường Nguyễn Văn Cừ, P. Gia Thụy, Q. Long Biên, Hà Nội </p><p>
                Chăm sóc khách hàng: 0243.9388512</p>
                <p>Mua hàng online: 0246.2909098 </p>
                <p>Email: cskh-speedx@stripe-vn.com </p>
                </div>
                <!-- END Case Logo + Text -->
                <!-- Case Footer Link Block -->
            </div>
            <div class="footer__item footer__item--links ">
                <p class="footer__item-title heading heading--small">Chính sách giao hàng</p>
                <div class="footer__item-content">
                <ul class="linklist list--unstyled" role="list">
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Giao hàng</a>
                    </li>
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Đổi trả</a>
                    </li>
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Thời gian giao / nhận hàng</a>
                    </li>
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Đóng gói</a>
                    </li>
                </ul>
                </div>
            <!-- End Case Footer Link Block -->
            </div>
            <div class="footer__item footer__item--links2 ">
                <p class="footer__item-title heading heading--small">Giới thiệu</p>
                <div class="footer__item-content">
                <ul class="linklist list--unstyled" role="list">
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Quyền lợi khách hàng</a>
                    </li>
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Văn hóa doanh nghiệp</a>
                    </li>
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Về Chúng Tôi</a>
                    </li>
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Kết Nối</a>
                    </li>
                    <li class="linklist__item">
                    <a href="index.html" class="link--faded">Cộng tác viên</a>
                    </li>
                </ul>
                </div>
            </div>
            <div class="footer__item footer__item--links3 ">
                <p class="footer__item-title heading heading--small">Bộ sưu tập</p>
                <div class="footer__item-content">
                    <ul class="linklist list--unstyled" role="list">
                        @foreach ($categories as $category)
                            <li class="linklist__item">
                                <a href="collections/all.html" class="link--faded">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            </div>
        </div>
        <div class="footer__aside">
            <p class="footer__copyright "><span>© 2022 - Bản quyền SpeedX. Cung cấp bởi </span><a class="link--faded" aria-label="link" target="https://haravan.com" rel="nofollow" href="#"><span style="margin-left:8px;">Haravan</span></a></p>
            <div class="footer__payment-methods">
            <div class="payment-methods-list payment-methods-list--auto">
                                <a href="https://twitter.com/" target="_blank">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_204_477)">
                        <path d="M6.2918 18.1251C13.8371 18.1251 17.9652 11.8724 17.9652 6.45167C17.9652 6.27589 17.9613 6.0962 17.9535 5.92042C18.7566 5.33967 19.4496 4.62033 20 3.7962C19.2521 4.12896 18.458 4.34627 17.6449 4.44074C18.5011 3.92755 19.1421 3.12135 19.4492 2.17159C18.6438 2.64892 17.763 2.98563 16.8445 3.1673C16.2257 2.50976 15.4075 2.07439 14.5164 1.9285C13.6253 1.78261 12.711 1.93433 11.9148 2.3602C11.1186 2.78607 10.4848 3.46238 10.1115 4.28455C9.73825 5.10672 9.64619 6.02897 9.84961 6.9087C8.21874 6.82686 6.62328 6.40321 5.16665 5.6652C3.71002 4.9272 2.42474 3.89132 1.39414 2.62472C0.870333 3.52782 0.710047 4.59649 0.945859 5.61353C1.18167 6.63057 1.79589 7.51966 2.66367 8.10011C2.01219 8.07943 1.37498 7.90402 0.804688 7.58839V7.63917C0.804104 8.58691 1.13175 9.50561 1.73192 10.2391C2.3321 10.9726 3.16777 11.4756 4.09687 11.6626C3.49338 11.8277 2.85999 11.8518 2.2457 11.7329C2.50788 12.548 3.01798 13.2609 3.70481 13.7721C4.39164 14.2833 5.22093 14.5673 6.07695 14.5845C4.62369 15.726 2.82848 16.3452 0.980469 16.3423C0.652739 16.3418 0.325333 16.3217 0 16.2821C1.87738 17.4866 4.06128 18.1263 6.2918 18.1251Z" fill="white"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_204_477">
                        <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                                    </a>
                                <a href="instagram.html" target="_blank">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 1.80078C12.6719 1.80078 12.9883 1.8125 14.0391 1.85937C15.0156 1.90234 15.543 2.06641 15.8945 2.20313C16.3594 2.38281 16.6953 2.60156 17.043 2.94922C17.3945 3.30078 17.6094 3.63281 17.7891 4.09766C17.9258 4.44922 18.0898 4.98047 18.1328 5.95312C18.1797 7.00781 18.1914 7.32422 18.1914 9.99219C18.1914 12.6641 18.1797 12.9805 18.1328 14.0313C18.0898 15.0078 17.9258 15.5352 17.7891 15.8867C17.6094 16.3516 17.3906 16.6875 17.043 17.0352C16.6914 17.3867 16.3594 17.6016 15.8945 17.7813C15.543 17.918 15.0117 18.082 14.0391 18.125C12.9844 18.1719 12.668 18.1836 10 18.1836C7.32813 18.1836 7.01172 18.1719 5.96094 18.125C4.98438 18.082 4.45703 17.918 4.10547 17.7813C3.64063 17.6016 3.30469 17.3828 2.95703 17.0352C2.60547 16.6836 2.39063 16.3516 2.21094 15.8867C2.07422 15.5352 1.91016 15.0039 1.86719 14.0313C1.82031 12.9766 1.80859 12.6602 1.80859 9.99219C1.80859 7.32031 1.82031 7.00391 1.86719 5.95312C1.91016 4.97656 2.07422 4.44922 2.21094 4.09766C2.39063 3.63281 2.60938 3.29688 2.95703 2.94922C3.30859 2.59766 3.64063 2.38281 4.10547 2.20313C4.45703 2.06641 4.98828 1.90234 5.96094 1.85937C7.01172 1.8125 7.32813 1.80078 10 1.80078ZM10 0C7.28516 0 6.94531 0.0117187 5.87891 0.0585938C4.81641 0.105469 4.08594 0.277344 3.45313 0.523438C2.79297 0.78125 2.23438 1.12109 1.67969 1.67969C1.12109 2.23438 0.78125 2.79297 0.523438 3.44922C0.277344 4.08594 0.105469 4.8125 0.0585938 5.875C0.0117188 6.94531 0 7.28516 0 10C0 12.7148 0.0117188 13.0547 0.0585938 14.1211C0.105469 15.1836 0.277344 15.9141 0.523438 16.5469C0.78125 17.207 1.12109 17.7656 1.67969 18.3203C2.23438 18.875 2.79297 19.2188 3.44922 19.4727C4.08594 19.7188 4.8125 19.8906 5.875 19.9375C6.94141 19.9844 7.28125 19.9961 9.99609 19.9961C12.7109 19.9961 13.0508 19.9844 14.1172 19.9375C15.1797 19.8906 15.9102 19.7188 16.543 19.4727C17.1992 19.2188 17.7578 18.875 18.3125 18.3203C18.8672 17.7656 19.2109 17.207 19.4648 16.5508C19.7109 15.9141 19.8828 15.1875 19.9297 14.125C19.9766 13.0586 19.9883 12.7188 19.9883 10.0039C19.9883 7.28906 19.9766 6.94922 19.9297 5.88281C19.8828 4.82031 19.7109 4.08984 19.4648 3.45703C19.2188 2.79297 18.8789 2.23438 18.3203 1.67969C17.7656 1.125 17.207 0.78125 16.5508 0.527344C15.9141 0.28125 15.1875 0.109375 14.125 0.0625C13.0547 0.0117188 12.7148 0 10 0Z" fill="white"/>
                    <path d="M10 4.86328C7.16406 4.86328 4.86328 7.16406 4.86328 10C4.86328 12.8359 7.16406 15.1367 10 15.1367C12.8359 15.1367 15.1367 12.8359 15.1367 10C15.1367 7.16406 12.8359 4.86328 10 4.86328ZM10 13.332C8.16016 13.332 6.66797 11.8398 6.66797 10C6.66797 8.16016 8.16016 6.66797 10 6.66797C11.8398 6.66797 13.332 8.16016 13.332 10C13.332 11.8398 11.8398 13.332 10 13.332Z" fill="white"/>
                    <path d="M16.5391 4.66016C16.5391 5.32422 16 5.85938 15.3398 5.85938C14.6758 5.85938 14.1406 5.32031 14.1406 4.66016C14.1406 3.99609 14.6797 3.46094 15.3398 3.46094C16 3.46094 16.5391 4 16.5391 4.66016Z" fill="white"/>
                </svg>
                                </a>
                                <a href="tiktok.html" target="_blank">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.2269 0H10.8563V13.6232C10.8563 15.2464 9.56 16.5797 7.94672 16.5797C6.33345 16.5797 5.03708 15.2464 5.03708 13.6232C5.03708 12.029 6.30465 10.7246 7.86031 10.6667V7.24639C4.4321 7.30433 1.6665 10.1159 1.6665 13.6232C1.6665 17.1594 4.48972 20 7.97554 20C11.4613 20 14.2845 17.1304 14.2845 13.6232V6.63767C15.5521 7.56522 17.1077 8.11594 18.7498 8.14495V4.72464C16.2147 4.63768 14.2269 2.55072 14.2269 0Z" fill="white"/>
                </svg>
                                </a>
                                <a href="facebook.html" target="_blank">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 10C20 4.47715 15.5229 0 10 0C4.47715 0 0 4.47715 0 10C0 14.9912 3.65684 19.1283 8.4375 19.8785V12.8906H5.89844V10H8.4375V7.79688C8.4375 5.29063 9.93047 3.90625 12.2146 3.90625C13.3084 3.90625 14.4531 4.10156 14.4531 4.10156V6.5625H13.1922C11.95 6.5625 11.5625 7.3334 11.5625 8.125V10H14.3359L13.8926 12.8906H11.5625V19.8785C16.3432 19.1283 20 14.9912 20 10Z" fill="white"/>
                </svg>
                                </a>
            </div>
            </div>
        </div>
        </div>
    </footer>
    </div>
</div>
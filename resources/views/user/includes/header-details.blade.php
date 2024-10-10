<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<ul class="nav-menus">
    
  @if($user->Role_Access == 0)
                   @else
                    <li class="role_wraap">
                    <a href="{{url('/user/rolemanagement')}}" class="role_manage_go">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.0026 13.5953C3.3206 13.5953 0.335938 10.6106 0.335938 6.92863C0.335938 3.2473 3.3206 0.261963 7.0026 0.261963C10.6846 0.261963 13.6693 3.2473 13.6693 6.92863C13.6693 10.6106 10.6846 13.5953 7.0026 13.5953ZM7.0026 3.5953C6.82579 3.5953 6.65622 3.66553 6.5312 3.79056C6.40618 3.91558 6.33594 4.08515 6.33594 4.26196V7.5953C6.33594 7.77211 6.40618 7.94168 6.5312 8.0667C6.65622 8.19173 6.82579 8.26196 7.0026 8.26196C7.17941 8.26196 7.34898 8.19173 7.47401 8.0667C7.59903 7.94168 7.66927 7.77211 7.66927 7.5953V4.26196C7.66927 4.08515 7.59903 3.91558 7.47401 3.79056C7.34898 3.66553 7.17941 3.5953 7.0026 3.5953ZM7.0026 10.262C7.17941 10.262 7.34898 10.1917 7.47401 10.0667C7.59903 9.94168 7.66927 9.77211 7.66927 9.5953C7.66927 9.41848 7.59903 9.24892 7.47401 9.12389C7.34898 8.99887 7.17941 8.92863 7.0026 8.92863C6.82579 8.92863 6.65622 8.99887 6.5312 9.12389C6.40618 9.24892 6.33594 9.41848 6.33594 9.5953C6.33594 9.77211 6.40618 9.94168 6.5312 10.0667C6.65622 10.1917 6.82579 10.262 7.0026 10.262Z" fill="white"/>
</svg>
Assign Roles to teammates

<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.49688 0.5L0.796875 1.25L4.49688 5L0.796875 8.75L1.49688 9.5L5.99688 5L1.49688 0.5Z" fill="white"/>
</svg>
                    </a>
                </li>
                @endif
               
              
                
                <li>
                    <div class="mode" ><i class="fa fa-moon-o"></i></div>
                </li>
                
                {{--
                <li class="search">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19.25 19.25L13.75 13.75M2.75 9.16667C2.75 10.0093 2.91597 10.8437 3.23844 11.6222C3.56091 12.4007 4.03356 13.1081 4.6294 13.7039C5.22524 14.2998 5.93261 14.7724 6.71111 15.0949C7.48962 15.4174 8.32402 15.5833 9.16667 15.5833C10.0093 15.5833 10.8437 15.4174 11.6222 15.0949C12.4007 14.7724 13.1081 14.2998 13.7039 13.7039C14.2998 13.1081 14.7724 12.4007 15.0949 11.6222C15.4174 10.8437 15.5833 10.0093 15.5833 9.16667C15.5833 8.32402 15.4174 7.48962 15.0949 6.71111C14.7724 5.93261 14.2998 5.22524 13.7039 4.6294C13.1081 4.03356 12.4007 3.56091 11.6222 3.23844C10.8437 2.91597 10.0093 2.75 9.16667 2.75C8.32402 2.75 7.48962 2.91597 6.71111 3.23844C5.93261 3.56091 5.22524 4.03356 4.6294 4.6294C4.03356 5.22524 3.56091 5.93261 3.23844 6.71111C2.91597 7.48962 2.75 8.32402 2.75 9.16667Z" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                </li>
                --}}
                
                <li class="setting_munal">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.24922 22L8.84922 18.8C8.63255 18.7167 8.42855 18.6167 8.23722 18.5C8.04589 18.3833 7.85822 18.2583 7.67422 18.125L4.69922 19.375L1.94922 14.625L4.52422 12.675C4.50755 12.5583 4.49922 12.446 4.49922 12.338V11.663C4.49922 11.5543 4.50755 11.4417 4.52422 11.325L1.94922 9.375L4.69922 4.625L7.67422 5.875C7.85755 5.74167 8.04922 5.61667 8.24922 5.5C8.44922 5.38333 8.64922 5.28333 8.84922 5.2L9.24922 2H14.7492L15.1492 5.2C15.3659 5.28333 15.5702 5.38333 15.7622 5.5C15.9542 5.61667 16.1416 5.74167 16.3242 5.875L19.2992 4.625L22.0492 9.375L19.4742 11.325C19.4909 11.4417 19.4992 11.5543 19.4992 11.663V12.337C19.4992 12.4457 19.4826 12.5583 19.4492 12.675L22.0242 14.625L19.2742 19.375L16.3242 18.125C16.1409 18.2583 15.9492 18.3833 15.7492 18.5C15.5492 18.6167 15.3492 18.7167 15.1492 18.8L14.7492 22H9.24922ZM12.0492 15.5C13.0159 15.5 13.8409 15.1583 14.5242 14.475C15.2076 13.7917 15.5492 12.9667 15.5492 12C15.5492 11.0333 15.2076 10.2083 14.5242 9.525C13.8409 8.84167 13.0159 8.5 12.0492 8.5C11.0659 8.5 10.2366 8.84167 9.56122 9.525C8.88589 10.2083 8.54855 11.0333 8.54922 12C8.54922 12.9667 8.88689 13.7917 9.56222 14.475C10.2376 15.1583 11.0666 15.5 12.0492 15.5Z" fill="#525252"/>
</svg>
<ul class="setting_opt">
    @if($user->Role_Access == 1)
    <li><a href="{{url('/user/rolemanagement')}}">
        <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.66406 7.00016C6.54812 7.00016 7.39596 6.64897 8.02109 6.02385C8.64621 5.39873 8.9974 4.55088 8.9974 3.66683C8.9974 2.78277 8.64621 1.93493 8.02109 1.30981C7.39596 0.684685 6.54812 0.333496 5.66406 0.333496C4.78001 0.333496 3.93216 0.684685 3.30704 1.30981C2.68192 1.93493 2.33073 2.78277 2.33073 3.66683C2.33073 4.55088 2.68192 5.39873 3.30704 6.02385C3.93216 6.64897 4.78001 7.00016 5.66406 7.00016ZM13.1641 7.00016C13.8271 7.00016 14.463 6.73677 14.9318 6.26793C15.4007 5.79909 15.6641 5.1632 15.6641 4.50016C15.6641 3.83712 15.4007 3.20124 14.9318 2.7324C14.463 2.26356 13.8271 2.00016 13.1641 2.00016C12.501 2.00016 11.8651 2.26356 11.3963 2.7324C10.9275 3.20124 10.6641 3.83712 10.6641 4.50016C10.6641 5.1632 10.9275 5.79909 11.3963 6.26793C11.8651 6.73677 12.501 7.00016 13.1641 7.00016ZM2.7474 8.66683C1.5974 8.66683 0.664062 9.60016 0.664062 10.7502C0.664062 10.7502 0.664062 14.5002 5.66406 14.5002C9.6274 14.5002 10.4491 12.1435 10.6191 11.1668C10.6641 10.9118 10.6641 10.7502 10.6641 10.7502C10.6641 9.60016 9.73073 8.66683 8.58073 8.66683H2.7474ZM12.3241 11.3335C12.3207 11.4002 12.3141 11.4791 12.3041 11.5702C12.2121 12.2574 11.9734 12.9167 11.6041 13.5035C12.0457 13.6052 12.5607 13.6668 13.1624 13.6668C17.3291 13.6668 17.3291 10.7502 17.3291 10.7502C17.3291 9.60016 16.3957 8.66683 15.2457 8.66683H11.6974C12.0974 9.2635 12.3291 9.9785 12.3291 10.7502V11.1668L12.3241 11.3335Z" fill="#707070"/>
</svg>
        Role Management</a></li>
        @endif
        @if($user->Edit_Password == 1)
        <li class="edit_setting_passward"><a href="{{url('/user/loginpassedit')}}">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.241 1.50879L16.491 3.75879L14.7758 5.47479L12.5258 3.22479L14.241 1.50879ZM6 11.9998H8.25L13.7153 6.53454L11.4653 4.28454L6 9.74979V11.9998Z" fill="#707070"></path>
        <path d="M14.25 14.25H6.1185C6.099 14.25 6.07875 14.2575 6.05925 14.2575C6.0345 14.2575 6.00975 14.2507 5.98425 14.25H3.75V3.75H8.88525L10.3853 2.25H3.75C2.92275 2.25 2.25 2.922 2.25 3.75V14.25C2.25 15.078 2.92275 15.75 3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V7.749L14.25 9.249V14.25Z" fill="#707070"></path>
        </svg>
        Edit passward</a></li>
        @endif
                                      <li class="logout_out">
                    <a class="logou_inn" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
<svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.25 7C5.25 6.83424 5.31585 6.67527 5.43306 6.55806C5.55027 6.44085 5.70924 6.375 5.875 6.375H11.5V2.3125C11.5 1.0625 10.1801 0.125 9 0.125H3.0625C2.48253 0.12562 1.92649 0.356288 1.51639 0.766389C1.10629 1.17649 0.87562 1.73253 0.875 2.3125V11.6875C0.87562 12.2675 1.10629 12.8235 1.51639 13.2336C1.92649 13.6437 2.48253 13.8744 3.0625 13.875H9.3125C9.89247 13.8744 10.4485 13.6437 10.8586 13.2336C11.2687 12.8235 11.4994 12.2675 11.5 11.6875V7.625H5.875C5.70924 7.625 5.55027 7.55915 5.43306 7.44194C5.31585 7.32473 5.25 7.16576 5.25 7ZM16.9418 6.5582L13.8168 3.4332C13.6986 3.32094 13.5413 3.25928 13.3783 3.26137C13.2153 3.26345 13.0596 3.32912 12.9444 3.44437C12.8291 3.55962 12.7635 3.71534 12.7614 3.87831C12.7593 4.04129 12.8209 4.19863 12.9332 4.3168L14.991 6.375H11.5V7.625H14.991L12.9332 9.6832C12.8727 9.74066 12.8244 9.80965 12.791 9.88609C12.7576 9.96254 12.7398 10.0449 12.7387 10.1283C12.7377 10.2117 12.7533 10.2945 12.7847 10.3718C12.8162 10.4491 12.8628 10.5193 12.9217 10.5783C12.9807 10.6372 13.0509 10.6838 13.1282 10.7153C13.2055 10.7467 13.2883 10.7623 13.3717 10.7613C13.4551 10.7602 13.5375 10.7424 13.6139 10.709C13.6904 10.6756 13.7593 10.6273 13.8168 10.5668L16.9418 7.4418C17.0589 7.3246 17.1247 7.16569 17.1247 7C17.1247 6.83431 17.0589 6.6754 16.9418 6.5582Z" fill="#FA4A4A"/>
</svg> Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
</ul>
                </li>
                <li class="onhover-dropdown">
                <div class="notification-box">
                
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.35737 2.01089C5.46244 1.8855 5.51415 1.72391 5.5014 1.56082C5.48866 1.39772 5.41248 1.24613 5.28922 1.13857C5.16596 1.03101 5.00544 0.976075 4.84212 0.985546C4.6788 0.995017 4.52571 1.06814 4.41571 1.18923L3.33904 2.42256C2.72852 3.1222 2.3834 4.0142 2.36404 4.94256L2.31654 7.20839C2.31484 7.29047 2.32933 7.37207 2.35917 7.44855C2.38901 7.52503 2.43363 7.59488 2.49046 7.65412C2.5473 7.71335 2.61525 7.76081 2.69043 7.79379C2.76561 7.82677 2.84655 7.84461 2.92862 7.84631C3.0107 7.84801 3.09231 7.83352 3.16878 7.80368C3.24526 7.77383 3.31511 7.72922 3.37435 7.67238C3.43358 7.61555 3.48105 7.5476 3.51402 7.47242C3.547 7.39724 3.56484 7.3163 3.56654 7.23423L3.61321 4.96923C3.62658 4.334 3.86285 3.72369 4.28071 3.24506L5.35737 2.01089Z" fill="#5790FF"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.19664 6.41663C5.25261 5.52507 5.64624 4.68836 6.29741 4.07682C6.94858 3.46529 7.80834 3.1249 8.70164 3.12496H9.16581V2.49996C9.16581 2.27895 9.25361 2.06698 9.40989 1.9107C9.56617 1.75442 9.77813 1.66663 9.99914 1.66663C10.2202 1.66663 10.4321 1.75442 10.5884 1.9107C10.7447 2.06698 10.8325 2.27895 10.8325 2.49996V3.12496H11.2966C12.19 3.1249 13.0497 3.46529 13.7009 4.07682C14.352 4.68836 14.7457 5.52507 14.8016 6.41663L14.9858 9.36163C15.056 10.4845 15.433 11.5666 16.0758 12.49C16.2086 12.6808 16.2898 12.9029 16.3114 13.1344C16.333 13.3659 16.2943 13.5991 16.1991 13.8113C16.1038 14.0234 15.9553 14.2073 15.768 14.3451C15.5807 14.4829 15.3609 14.5698 15.13 14.5975L12.2908 14.9375V15.8333C12.2908 16.4411 12.0494 17.024 11.6196 17.4537C11.1898 17.8835 10.6069 18.125 9.99914 18.125C9.39136 18.125 8.80846 17.8835 8.37869 17.4537C7.94892 17.024 7.70748 16.4411 7.70748 15.8333V14.9375L4.86831 14.5966C4.63756 14.5689 4.4179 14.4819 4.23068 14.3442C4.04346 14.2065 3.89505 14.0227 3.79985 13.8107C3.70466 13.5986 3.66593 13.3656 3.68741 13.1342C3.7089 12.9028 3.78988 12.6808 3.92248 12.49C4.56523 11.5666 4.94225 10.4845 5.01248 9.36163L5.19664 6.41663ZM8.70164 4.37496C8.12629 4.37489 7.57254 4.5941 7.15313 4.98797C6.73372 5.38183 6.48018 5.92073 6.44414 6.49496L6.26081 9.43996C6.1761 10.7908 5.72241 12.0925 4.94914 13.2033C4.93953 13.2171 4.93366 13.2332 4.93209 13.2499C4.93052 13.2666 4.93331 13.2835 4.94019 13.2989C4.94707 13.3142 4.9578 13.3275 4.97134 13.3375C4.98489 13.3475 5.00078 13.3538 5.01748 13.3558L8.13164 13.73C9.37248 13.8783 10.6258 13.8783 11.8666 13.73L14.9808 13.3558C14.9975 13.3538 15.0134 13.3475 15.0269 13.3375C15.0405 13.3275 15.0512 13.3142 15.0581 13.2989C15.065 13.2835 15.0678 13.2666 15.0662 13.2499C15.0646 13.2332 15.0588 13.2171 15.0491 13.2033C14.2761 12.0924 13.8227 10.7907 13.7383 9.43996L13.5541 6.49496C13.5181 5.92073 13.2646 5.38183 12.8452 4.98797C12.4258 4.5941 11.872 4.37489 11.2966 4.37496H8.70164ZM9.99914 16.875C9.42414 16.875 8.95748 16.4083 8.95748 15.8333V15.2083H11.0408V15.8333C11.0408 16.4083 10.5741 16.875 9.99914 16.875Z" fill="#5790FF"/>
<path d="M14.7023 1.12921C14.5774 1.23819 14.501 1.39229 14.4897 1.55762C14.4785 1.72296 14.5333 1.88599 14.6423 2.01088L15.7189 3.24421C16.1367 3.72318 16.3727 4.3338 16.3856 4.96921L16.4331 7.23338C16.4365 7.39914 16.5057 7.55675 16.6253 7.67154C16.7449 7.78632 16.9053 7.84889 17.071 7.84546C17.2368 7.84203 17.3944 7.7729 17.5092 7.65327C17.624 7.53364 17.6865 7.3733 17.6831 7.20754L17.6356 4.94254C17.6162 4.01419 17.2711 3.12218 16.6606 2.42254L15.5839 1.18921C15.475 1.06437 15.3209 0.987915 15.1555 0.976663C14.9902 0.965412 14.8272 1.02028 14.7023 1.12921Z" fill="#5790FF"/>
</svg>

                </div>   
                <ul class="notification-dropdown onhover-show-div">
               <li>
               ------
          </li>
</ul>
              </li>



            </ul>
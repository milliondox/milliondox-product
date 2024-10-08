<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Milliondox</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://milliondox.com/assets/img/favicon.webp" rel="icon">
  <link href="https://milliondox.com/assets/img/apple-touch-icon.webp" rel="apple-touch-icon">

   <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Font for popup -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Vendor CSS Files -->
  <link href="https://milliondox.com/assets/vendor/aos/aos.css" rel="stylesheet">

  <link rel="preload" href="https://milliondox.com/assets/vendor/bootstrap/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  <link href="https://milliondox.com/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="https://milliondox.com/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="https://milliondox.com/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="https://milliondox.com/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="https://milliondox.com/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="https://milliondox.com/assets/css/style.css" rel="stylesheet">

  <!-- landing new css start -->
   <style>

    /****header css start****/
    #header .btn-login {
    border-radius: 15px;
}
.flex_endd {
    display: flex;
    align-items: center;
    gap: 0px 30px;
}
.navbar ul {
    gap: 0px 60px;
}
.navbar a, .navbar a:focus {
    color: #6599FF;
    font-weight: 600;
}

.navbar ul li:first-child a, .navbar ul li:nth-child(+2) a {
    font-weight: 400;
    color: #332C5C;
    padding-left: 0px;
}

#header {
    padding: 20px 0 20px 0;    
    background: transparent;
}

/****hero css start****/
.landing_page #hero {
    background-position: left top;
    background-repeat: no-repeat;
    background-size: auto;
}
.landing_page #hero {
    position: relative;
}

.landing_page #hero {
    position: relative;
    align-items: flex-end !important;
    max-width: 1920px;
    margin: 0 auto;
}
.landing_page #hero .animated {
    position: relative;
    right: -69px;
}
.landing_page #hero:after {
    content: "";
    background-image: url(https://milliondox.com/assets/img/landing_halfcircle.png);
    width: 700px;
    height: 609px;
    position: absolute;
    right: 0;
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position: bottom right;
    bottom: 0;
    z-index: 1;
}
.landing_page #hero .hero-img {
    position: relative;
    z-index: 9;
}

.landing_page #hero .hero-img:before {
    content: "";
    background-image: url(https://milliondox.com/assets/img/landing_dots.png);
    width: 250px;
    height: 160px;
    position: absolute;
    left: 90px;
    bottom: 0;
    background-position: center bottom;
    background-repeat: no-repeat;
    background-size: auto;
}

.landing_page #hero .hero-img:after {
    content: "";
    background-image: url(https://milliondox.com/assets/img/landing_orangeline.png);
    width: 280px;
    height: 200px;
    position: absolute;
    left: 100px;
    top: 60px;
    background-position: center bottom;
    background-repeat: no-repeat;
    background-size: contain;
    z-index: -1;
}

.landing_page #hero h1 {
    font-size: 62px;
    font-weight: 700;
    background: transparent;
    -webkit-background-clip: unset;
    -webkit-text-fill-color: unset;
    color: #332C5C;
}

.landing_page #hero h2 {
    background: transparent;
    -webkit-background-clip: unset;
    -webkit-text-fill-color: unset;
    color: #6599FF;
    font-size: 62px;
    font-weight: 700;
}

.landing_page #hero p {
    font-size: 21px;
    font-weight: 400;
    color: #1C0E0D;
    margin: 20px 0px 30px;
}

.landing_page #hero .btn-createacc {
    background: #6599FF;
    padding: 10px 30px;
    border-radius: 15px;
    color: #FFF;
}

.landing_page #hero .col-lg-5 {
    align-self: flex-start;
    margin-top: 20px !IMPORTANT;
}

/****hero media css start****/
@media(max-width:1440px)
{
  .landing_page #hero .animated {
    right: 0;
}

.landing_page #hero:after {
    width: 530px;
    height: 620px;
    right: 0;
}

.landing_page #hero {
 height: 103vh;
}

.landing_page #hero .hero-img:after {
    left: 23px;
}

}

@media(max-width:1280px)
{
  .landing_page #hero h1 {
    font-size: 42px;
}

.landing_page #hero h2 {
    font-size: 42px;
    line-height: normal;
}

.landing_page #hero p {
    font-size: 18px;
}

.landing_page #hero:after {
    height: 530px;
}

.landing_page #hero {
    height: 62vh;
}

}

@media(max-width:991px)
{
  #header .flex_endd {
    gap: 0px 10px;
            order: 2;
                    flex: 1;
        justify-content: end;
}

 

#header {
    background: #FFF;
}

.landing_page #hero {
    margin-top: 90px;
}

.landing_page #hero .hero-img {
    display: none;
}

.landing_page #hero {
    height: unset;
    background-image: none !IMPORTANT;
    padding: 69.78px 0px 50px 0px;
}

#hero .container {
    padding-top: 0;
}

.landing_page #hero:after {
    height: 530px;
    background-size: 100% 86%;
    width: 50%;
}

.landing_page #hero:before {
    content: "";
    height: 530px;
    background-size: 100% 86%;
    background-image: url(https://milliondox.com/assets/img/landing_halfcircle.png);
    position: absolute;
    left: 0;
    background-repeat: no-repeat;
    background-position: bottom right;
    bottom: 0;
    z-index: 1;
    width: 50%;
    transform: rotateY(180deg);
}

}

@media(max-width:576px)
{
  .landing_page #hero h1 {
    font-size: 32px;
}

.landing_page #hero h2 {
    font-size: 32px;
}

.landing_page #hero p {
    font-size: 16px;
    max-width: 90%;
    margin: 0 auto 15px;
}

.landing_page #hero:before {
    display: none;
}

.landing_page #hero:after {
    display: none;
}

.landing_page #hero {
    padding: 0px 0px 50px 0px;
}

.landing_page #hero .container {
    background: #fffbf4;
    max-width: 90%;
    border-radius: 15px;
    padding: 40px 15px;
}

.landing_page #hero .container .col-lg-5 {
    margin: 0 !IMPORTANT;
    padding: 0 !IMPORTANT;
}

}

/****three grid  css start****/
.explore_three_grid  .inner_nt_div {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 0px 16px;
}

.explore_three_grid .inner_nt_div .innert_nt_iage {
    width: 100px;
    height: 100px;
    background: #EADAF5;
    box-shadow: 14px 20px 48px 0px #190F2C05;
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.explore_three_grid .inner_nt_div .innert_nt_iage svg {
    width: 40px;
}

.explore_three_grid .col-md-4:nth-child(+3) .innert_nt_iage {
    background: #DAF3EB;
}

.explore_three_grid .col-md-4:nth-child(+2) .innert_nt_iage {
    background: #F7E9C6;
}

.explore_three_grid .inner_nt_div .inner_nt_texxt h2 {
    font-size: 24px;
    font-weight: 600;
    color: #071C52;
}

.explore_three_grid {
    padding: 100px 0px 100px;
    display: block;
}

@media(max-width:991px)
{
  .explore_three_grid .inner_nt_div {
    display: block;
    text-align: center;
}

.explore_three_grid .inner_nt_div .innert_nt_iage {
    margin: 0 auto;
}

.explore_three_grid .inner_nt_div .inner_nt_texxt h2 {
    font-size: 20px;
    margin: 10px 0px 0px;
}

.explore_three_grid {
    padding: 40px 0px 40px;
}
}

@media(max-width:576px)
{
  .explore_three_grid {
    padding: 0px 0px 40px;
}

.explore_three_grid .col-md-4 {
    margin-bottom: 40px;
}

.explore_three_grid .col-md-4:last-child {
    margin: 0;
}

main#main {
    padding-top: 15px;
}

}

/****Five Grid Image Css Start*****/
.a-five-ggdd {
    width: 100%;
    display: block;
}

.a-five-ggdd .sub_images {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(1, 1fr);
    grid-gap: 30px 15px;
}

.a-five-ggdd .images .sub_images .item {
    grid-column: 1 / span 2;
    grid-row: 1 / span 1;
}

.a-five-ggdd .images .sub_images .image1 {
    position: relative;
    padding: 15px;
    display: flex;
    align-items: center;
}

.a-five-ggdd .images .sub_images .item1 {
    grid-column: 3 / span 1;
    grid-row: 1 / span 2;
}

.a-five-ggdd .images .sub_images .item2 {
    grid-column: 1 / span 1;
    grid-row: 2 / span 2;
}

.a-five-ggdd .images .sub_images .item3 {
    display: flex;
    align-items: center;
    justify-content: center;
    grid-column: 2 / span 1;
    grid-row: 2 / span 1;
}

.a-five-ggdd .images .sub_images .item4 {
    grid-column: 2 / span 2;
    grid-row: 3 / span 1;
}

.a-five-ggdd .images .sub_images .item1 {
    display: flex;
    flex-wrap: wrap;
    box-shadow: 0px 0px 25px 0px #00000014;
    border-radius: 30px;
    align-items: center;
    flex-direction: column;
    justify-content: space-between;
}

.a-five-ggdd .images .sub_images .item2 {
    display: flex;
    flex-wrap: wrap;
    box-shadow: 0px 0px 25px 0px #00000014;
    border-radius: 30px;
    align-items: center;
    flex-direction: column;
    justify-content: space-between;
}

.a-five-ggdd .images .sub_images .item4 {
    display: flex;
    align-items: center;
    background: #343A44;
    border-radius: 30px;
}

.a-five-ggdd .images .sub_images .item {
    background: #3A3A3A;
    border-radius: 30px;
    gap: 0px 10px;
}

.a-five-ggdd .images .sub_images .sub_iage_item img {
    max-width: 100%;
    display: block;
}

.a-five-ggdd .images .sub_images .item1 .sub_iage_item_text {
  flex: 1;
}
.a-five-ggdd .images .sub_images .item1 .sub_iage_item {
    flex: 4;
    display: flex;
    align-items: center;
    background: #f4f7fe;
    border-radius: 15px;
}

.a-five-ggdd .images .sub_images .item1 .sub_iage_item_text h2 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.04em;
    text-align: center;
    padding: 30px 0px 20px;
}

.a-five-ggdd .images .sub_images .item1 .sub_iage_item_text h2 span {
    display: block;
    font-weight: 300;
    font-size: 18px;
}

.a-five-ggdd .images .sub_images .item2 .sub_iage_item_text {
  flex: 1;
}

.a-five-ggdd .images .sub_images .item2 .sub_iage_item {
    flex: 4;
    display: flex;
    align-items: center;
    background: #f4f7fe;
    border-radius: 15px;
}


.a-five-ggdd .images .sub_images .item2 .sub_iage_item_text h2 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.04em;
    text-align: center;
    padding: 20px 0px 30px;
}

.a-five-ggdd .images .sub_images .item2 .sub_iage_item_text h2 span {
    display: block;
    font-weight: 300;
    font-size: 18px;
}


.a-five-ggdd .images .sub_images .item h2 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.04em;
    text-align: left;
    color: #FFF;
}

.a-five-ggdd .images .sub_images .item h2 span {
    display: block;
    font-weight: 300;
    font-size: 18px;
}

.a-five-ggdd .images .sub_images .item .sub_iage_item {
    flex: 1.5;
}

.a-five-ggdd .images .sub_images .item  .sub_iage_item_text {
    flex: 1;
}

.a-five-ggdd .images .sub_images .item4 .sub_iage_item_text {
    flex: 1;
    position: relative;
    left: 11px;
}

.a-five-ggdd .images .sub_images .item4 .sub_iage_item_text h2 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.04em;
    text-align: left;
    color: #FFF;
}

.a-five-ggdd .images .sub_images .item4 .sub_iage_item_text h2 span {
    display: block;
    font-weight: 300;
    font-size: 18px;
}

.a-five-ggdd .images .sub_images .item4 .sub_iage_item {
    flex: 1.5;
}

.a-five-ggdd .images .image1.item3 .sub_new_add {
    position: relative;
    text-align: center;
}

.a-five-ggdd .images .image1.item3 .sub_new_add .what_there {
    font-size: 32px;
    font-weight: 600;
    letter-spacing: -0.06em;
    color: #212121;
    margin: 0;
}

.a-five-ggdd .images .image1.item3 .sub_new_add .empty_design_green {
    background: #DAFF8D;
    width: 160px;
    height: 100%;
    position: absolute;
    bottom: -10px;
    left: -21px;
    z-index: -1;
    border-radius: 20px;
    transform: rotate(346deg);
}

@media(max-width:576px)
{
  .a-five-ggdd .sub_images {
    display: flex;
    flex-wrap: wrap;
}

.a-five-ggdd .images .sub_images .item {
  display: block;
  order: 2;
}

.a-five-ggdd .images .sub_images .item .sub_iage_item {
    width: 100%;
}

.a-five-ggdd .images .sub_images .item .sub_iage_item_text {
    width: 100%;
}

.a-five-ggdd .images .sub_images .item h2 {
    text-align: center;
    padding: 20px 0px 10px;
}

.a-five-ggdd .images .sub_images .item1 {
    order: 3;
}

.a-five-ggdd .images .sub_images .item2 {
    order: 4;
}

.a-five-ggdd .images .sub_images .item3 {
    order: 1;
    justify-content: center;
    align-items: center;
    text-align: center;
    display: flex;
    justify-content: center;
    margin: 20px auto 20px;
}

.a-five-ggdd .images .sub_images .item4 {
    order: 5;
    display: block;
}

.a-five-ggdd .images .sub_images .item4 .sub_iage_item_text {
    width: 100%;
}

.a-five-ggdd .images .sub_images .item4 .sub_iage_item {
    width: 100%;
}

.a-five-ggdd .images .sub_images .item4 .sub_iage_item_text h2 {
    text-align: center;
    padding: 10px 0px 20px;
}

}


/*****For section css start****/
.about_featuree  .container-fluid {
    padding: 0;
}

.about_featuree .container-fluid .image-container img {
    max-width: 100%;
    display: block;
    margin-left: auto;
}

.about_featuree .container-fluid  .row {
    margin: 0;
}

.about_featuree .container-fluid .explore_feature_immage {
    padding: 0;
}

.about_featuree  .account_form {
    max-width: 80%;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    flex-direction: column;
}

.about_featuree {
    max-width: 1920px;
    margin: 120px auto 60px;
}

.about_featuree .account_form h2 {
    font-size: 56px;
    font-weight: 700;
    color: #19191B;
    margin-bottom: 20px;
}

.about_featuree .account_form span {
    font-size: 19px;
    font-weight: 400;
    color: #999BA1;
}

.about_featuree .account_form form {
    display: block;
    margin: 40px 0px 0px;
}

.about_featuree .account_form form {
    display: flex;
    align-items: center;
    gap: 0px 0px;
    flex-wrap: wrap;
    flex-direction: column;
}

.about_featuree .account_form .form-group {
    display: block;
    flex: 1;
    width: 100%;
    margin-bottom: 20px;
}

.about_featuree .account_form .form-group label {
    display: block;
    width: 100%;
    font-size: 15px;
    font-weight: 700;
    color: #3B3D41;
    margin: 0px 0px 10px;
}

.about_featuree .account_form  .wrap_group {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    gap: 0px 20px;
}

.about_featuree .account_form .form-group input {
    display: block;
    width: 100%;
    border: 1.5px solid #EAEBEC;
    padding: 9px 10px;
    border-radius: 14px;
    outline: none;
    box-shadow: none;
}

.about_featuree .account_form .form-group.enter_otpp {
    position: relative;
        display: none;
}

.about_featuree .account_form .form-group.enter_otpp.active {
    display: block;
}

.about_featuree .account_form .form-group.enter_otpp .resend_otp {
    position: absolute;
    border: 0;
    font-size: 12px;
    background: transparent;
    box-shadow: none;
    outline: none;
    white-space: nowrap;
    right: 7px;
    bottom: 13px;
    color: #0066FF;
    padding: 0;
        display: none;
}

#otp-timer {
    position: absolute;
    border: 0;
    font-size: 12px;
    background: transparent;
    box-shadow: none;
    outline: none;
    white-space: nowrap;
    right: 7px;
    bottom: 13px;
    color: #0066FF;
    padding: 0;
    opacity: 0.5;
}


.about_featuree .account_form .form-group input::placeholder {
    color: #999BA1;
}

.about_featuree .account_form form .google_go {
    width: 100%;
    background: #F8F8F8;
    outline: none;
    box-shadow: none;
    border-radius: 12px;
    padding: 13px 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0px 5px;
    text-shadow: 0 0 black;
    font-size: 16px;
    margin-top: 30px;
}

.about_featuree .account_form form .rop_regseter {
    display: flex;
    width: 100%;
    align-items: center;
    gap: 0px 6px;
    margin: 20px 0px 20px;
}

.about_featuree .account_form form .rop_regseter label {
    text-shadow: 0 0 black;
}

.about_featuree .account_form form  .submit_forrm {
    width: 100%;
    background: #6599FF;
    outline: none;
    box-shadow: none;
    border-radius: 17px;
    padding: 15px 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0px 5px;
    color: #FFF;
    font-size: 18px;
    font-weight: 700;
}

/****footer new css start******/
.footer_landing .roww {
    display: flex;
    flex-wrap: wrap;
    gap: 0px 15px;
}

.footer_landing .roww 
 .social_footer_outer {
    flex: 1;
}

.footer_landing .roww .social_footer {
  height: 100%;
    background: #363636;
    padding: 30px 30px;
}

.footer_landing .roww .foter_right_news {
    flex: 3;
}

.footer_landing .roww .social_footer .left_footer_title span {
    font-size: 26px;
    font-weight: 500;
    color: #C1C1C1;
}

.footer_landing .roww .social_footer .left_footer_title h2 {
    font-size: 36px;
    font-weight: 600;
    color: #C1C1C1;
    margin: 0;
}

.footer_landing .roww .social_footer .social-links ul {
    margin: 0;
    padding: 70px 0px 0px 20px;
    list-style: none;
}

.footer_landing .roww .social_footer .social-links ul li {
    margin: 0px 0px 15px 0px;
}

.footer_landing .roww .social_footer .social-links ul li svg {
    width: 25px;
    height: 25px;
}

.footer_landing .roww  .foter_right_news_back {
    background: #543FD4;
    padding: 30px 30px;
    height: 100%;
}

.footer_landing .roww .foter_right_news_back .top_newss {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.footer_landing .roww .foter_right_news_back .top_textt span {
    font-size: 26px;
    font-weight: 500;
    color: #DEDBF5;
}

.footer_landing .roww .foter_right_news_back .top_textt h2 {
    font-size: 36px;
    font-weight: 600;
    color: #DEDBF5;
    margin: 0;
}

.footer_landing .roww .foter_right_news_back .top_newss .new_letter {
    border: 2px solid #FFFFFF;
    background: transparent;
    padding: 10px 12px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.footer_landing .roww .foter_right_news_back .top_newss .new_letter svg {
    width: 60%;
}

.footer_landing .roww .foter_right_news_back .menu {
    margin: 0;
    padding: 70px 0px 0px 20px;
    list-style: none;
}

.footer_landing .roww .foter_right_news_back .menu li a {
    font-size: 22px;
    font-weight: 400;
    color: #DEDBF5;
    text-decoration: underline;
}

.footer_landing .roww .foter_right_news_back .menu li {
    margin: 0px 0px 15px 0px;
}

.footer_landing .roww .foter_right_news_back .menu li:last-child {
    margin: 0;
}

.footer_landing .roww .social_footer .social-links ul li:last-child {
    margin: 0;
}

.footer_landing .roww .foter_right_news .footer_bootm p {
    font-size: 16px;
    font-weight: 400;
    color: #CACACA;
    margin: 0;
}

.footer_landing .roww .foter_right_news .footer_bootm {
    display: block;
    padding: 10px 0px 10px;
}

.footer_landing {
    position: relative;
    display: block;
}

.footer_landing .footer-top {
    width: 100%;
    height: 70%;
    background: #2D2D2D;
    position: absolute;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    bottom: -45px;
    left: 0;
}

.footer_landing .container {
    position: relative;
}

@media(max-width:1280px)
{
  .footer_landing .roww .social_footer_outer {
    flex: 2;
}

.footer_landing .roww .foter_right_news {
    flex: 4;
}

.about_featuree .container-fluid .col-lg-5, .about_featuree .container-fluid .col-lg-7 {
    width: 50%;
}

.about_featuree .account_form h2 {
    font-size: 38px;
}

}

@media(max-width:991px)
{
    .navbar ul li:first-child a, .navbar ul li:nth-child(+2) a {

    padding: 10px 20px;
}
.header .btn-login {
    margin: 0 5px 0 0;
}
}

@media(max-width:768px)
{
  .about_featuree .container-fluid .col-lg-5, .about_featuree .container-fluid .col-lg-7 {
    width: 100%;
}

.about_featuree .account_form {
    max-width: 90%;
    margin: 40px auto 0px;
}
.footer_landing .footer-top {
    bottom: -75px;
}

}

@media(max-width:576px)
{
  .about_featuree {
    margin: 80px auto 60px;
}

.about_featuree .account_form .wrap_group {
    display: block;
}

.about_featuree .account_form {
    max-width: 100%;
    box-shadow: 0px 0px 25px 0px #00000014;
    padding: 30px 20px;
    border-radius: 10px;
}

.footer_landing .footer-top {
    height: 100%;
}

footer.footer_landing {
    background: #2D2D2D;
    padding: 50px 0px 0px;
    border-top-left-radius: 40px;
    border-top-right-radius: 40px;
}

.footer_landing .roww .social_footer_outer .social_footer {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.footer_landing .roww .foter_right_news_back {
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.footer_landing .roww .social_footer .left_footer_title span {
    font-size: 16px;
}

.footer_landing .roww .social_footer .left_footer_title h2 {
    font-size: 21px;
}

.footer_landing .roww .social_footer .social-links ul {
    padding: 20px 0px 0px 0px;
    display: flex;
    gap: 0px 20px;
}
.footer_landing .roww .social_footer .social-links ul li {
    display: inline-block;
}

.footer_landing .roww .foter_right_news_back .top_newss .new_letter {
    padding: 10px 2px;
    border: 1px solid #FFFFFF;
}

.footer_landing .roww .foter_right_news_back .top_newss .new_letter svg {
    width: 40%;
}


.footer_landing .roww .foter_right_news_back .top_textt span {
    font-size: 16px;
}

.footer_landing .roww .foter_right_news_back .top_textt h2 {
    font-size: 21px;
}

.footer_landing .roww .foter_right_news_back .top_newss {
    gap: 0px 30px;
}

.footer_landing .roww .foter_right_news_back .menu {
    padding: 40px 0px 0px 0px;
}

.footer_landing .roww .foter_right_news .footer_bootm p {
    font-size: 14px;
    padding: 0px 10px;
}

}

   </style>
   <!-- landing new css end-->
</head>


<body class="landing_page">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <h1 class="logo me-auto"><a href="index.html">Milliondox</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="#" class="logo d-flex align-items-center me-auto me-xl-0"><img src="https://milliondox.com/assets/img/logo.webp" alt="logo" class="img-fluid"></a>
<div class="flex_endd">
      <nav id="navbar" class="navbar">
        <ul>
           <li><a class="nav-link scrollto" href="feature.html">Features</a></li>    
           <li><a class="nav-link   scrollto" href="https://milliondox.com/blogs/">Blogs</a></li>
          <li><a class="nav-link scrollto" href="https://milliondox.in/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="btn-login" href="#about-featuree">Sign up</a>
    </div>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style='background-image: url("https://milliondox.com/assets/img/landing_topline.png");'>

    <div class="container">
      <div class="row">
        <div class="col-lg-5 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1">
          <h1>Join the Future of</h1>
          <h2>Document<br> Management</h2>
          <p>Get early access to MillionDox and revolutionize how your business handles documents</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#" class="btn-createacc scrollto">Get Started Now</a>            
          </div>
        </div>
        <div class="col-lg-7 order-1 order-lg-2 hero-img">
          <img src="https://milliondox.com/assets/img/landing_banner.png" class="img-fluid animated" alt="hero-img">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

       <!-- ======= Three Grid Section ======= -->
       <section id="explore_three_grid" class="explore_three_grid section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
  
            <div class="col-md-4">
  <div class="inner_nt_div">
    <div class="innert_nt_iage">
      <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12.7539 40.7604L26.7487 26.7656L29.2232 29.2401L15.2284 43.2349L12.7539 40.7604Z" fill="#A574C7"/>
        <path d="M29.7502 52.5001C29.5285 52.5006 29.3088 52.4591 29.1027 52.3776C28.816 52.2633 28.5646 52.0752 28.374 51.8324C28.1835 51.5896 28.0605 51.3008 28.0177 50.9951L26.2677 38.7451L29.7677 38.2551L31.0802 47.4776L36.7502 42.9101V29.7501C36.7488 29.5198 36.793 29.2915 36.8801 29.0783C36.9672 28.8651 37.0955 28.6711 37.2577 28.5076L44.3802 21.3851C45.8478 19.9274 47.0118 18.1932 47.8048 16.2828C48.5978 14.3723 49.0041 12.3236 49.0002 10.2551V7.00011H45.7452C43.6767 6.99618 41.6279 7.40247 39.7175 8.19549C37.8071 8.9885 36.0728 10.1525 34.6152 11.6201L27.4927 18.7426C27.3292 18.9048 27.1352 19.0331 26.922 19.1202C26.7088 19.2073 26.4805 19.2514 26.2502 19.2501H13.0902L8.52267 24.9551L17.7452 26.2676L17.2552 29.7676L5.00517 28.0176C4.69952 27.9747 4.41065 27.8518 4.16785 27.6612C3.92505 27.4707 3.73697 27.2193 3.62267 26.9326C3.50697 26.6439 3.47029 26.3296 3.51643 26.022C3.56257 25.7144 3.68985 25.4247 3.88517 25.1826L10.8852 16.4326C11.0464 16.2232 11.2529 16.0529 11.4894 15.9347C11.7258 15.8165 11.9859 15.7534 12.2502 15.7501H25.5327L32.1302 9.13511C33.9137 7.34154 36.0356 5.91989 38.3727 4.95259C40.7099 3.98529 43.2158 3.49159 45.7452 3.50011H49.0002C49.9284 3.50011 50.8187 3.86886 51.475 4.52523C52.1314 5.18161 52.5002 6.07185 52.5002 7.00011V10.2551C52.5087 12.7845 52.015 15.2904 51.0477 17.6276C50.0804 19.9647 48.6587 22.0866 46.8652 23.8701L40.2502 30.4676V43.7501C40.249 44.013 40.1885 44.2722 40.0734 44.5085C39.9583 44.7448 39.7914 44.9521 39.5852 45.1151L30.8352 52.1151C30.5273 52.3621 30.1449 52.4978 29.7502 52.5001Z" fill="#A574C7"/>
        </svg>
        
    </div>
    <div class="inner_nt_texxt">
      <h2>Efficiency <br>Boost</h2>
    </div>
  </div>          
            </div>

            <div class="col-md-4">
              <div class="inner_nt_div">
                <div class="innert_nt_iage">
                  <svg width="54" height="65" viewBox="0 0 54 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.0024 55.0444L34.8728 54.9652L34.7429 55.0436L29.0468 58.4794L30.5383 52.0163L30.5719 51.8703L30.4592 51.7718L25.4368 47.3829L32.0395 46.795L32.1881 46.7818L32.247 46.6447L34.8712 40.5368L37.4967 46.6933L37.5554 46.8309L37.7045 46.8442L44.303 47.4318L39.2858 51.771L39.1721 51.8693L39.2057 52.0159L40.6972 58.5246L35.0024 55.0444ZM25.4246 63.0719L25.29 63.6489L25.7973 63.3428L34.872 57.8669L43.9468 63.3409L44.4541 63.6469L44.3193 63.0699L41.9105 52.7569L49.9135 45.8234L50.3603 45.4364L49.7714 45.3854L39.2309 44.473L35.1021 34.748L34.872 34.2059L34.6419 34.748L30.5131 44.475L19.9706 45.3874L19.3817 45.4383L19.8285 45.8254L27.8316 52.7589L25.4246 63.0719Z" fill="#F9C438" stroke="#F9C438" stroke-width="0.5"/>
                    <path d="M35.0024 55.0444L34.8728 54.9652L34.7429 55.0436L29.0468 58.4794L30.5383 52.0163L30.5719 51.8703L30.4592 51.7718L25.4368 47.3829L32.0395 46.795L32.1881 46.7818L32.247 46.6447L34.8712 40.5368L37.4967 46.6933L37.5554 46.8309L37.7045 46.8442L44.303 47.4318L39.2858 51.771L39.1721 51.8693L39.2057 52.0159L40.6972 58.5246L35.0024 55.0444ZM25.4246 63.0719L25.29 63.6489L25.7973 63.3428L34.872 57.8669L43.9468 63.3409L44.4541 63.6469L44.3193 63.0699L41.9105 52.7569L49.9135 45.8234L50.3603 45.4364L49.7714 45.3854L39.2309 44.473L35.1021 34.748L34.872 34.2059L34.6419 34.748L30.5131 44.475L19.9706 45.3874L19.3817 45.4383L19.8285 45.8254L27.8316 52.7589L25.4246 63.0719Z" fill="#F9C438" stroke="#F9C438" stroke-width="0.5"/>
                    <path d="M8.48347 33.9402C13.1698 38.6265 20.7677 38.6265 25.454 33.9402C30.1403 29.2539 30.1403 21.6559 25.454 16.9697C20.7677 12.2834 13.1698 12.2834 8.48347 16.9697C3.79718 21.6559 3.79718 29.2539 8.48347 33.9402Z" stroke="#F9C438" stroke-width="4"/>
                    <path d="M29.6981 25.4562H44.5473M44.5473 25.4562H50.9113M44.5473 25.4562V36.0628" stroke="#F9C438" stroke-width="4" stroke-linecap="round"/>
                    <path d="M8.48347 33.9402C13.1698 38.6265 20.7677 38.6265 25.454 33.9402C30.1403 29.2539 30.1403 21.6559 25.454 16.9697C20.7677 12.2834 13.1698 12.2834 8.48347 16.9697C3.79718 21.6559 3.79718 29.2539 8.48347 33.9402Z" stroke="#F9C438" stroke-width="4"/>
                    <path d="M29.6981 25.4562H44.5473M44.5473 25.4562H50.9113M44.5473 25.4562V36.0628" stroke="#F9C438" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                    
                </div>
                <div class="inner_nt_texxt">
                  <h2>Early Access to <br>New Features</h2>
                </div>
              </div> 
              
            </div>

            <div class="col-md-4">
              <div class="inner_nt_div">
                <div class="innert_nt_iage">
                  <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 43.5C28.4916 43.5003 27.0384 42.9324 25.9298 41.9095C24.8213 40.8866 24.1387 39.4836 24.018 37.98C20.0166 36.5636 16.6441 33.7792 14.4961 30.1181C12.348 26.457 11.5624 22.1548 12.2779 17.9708C12.9934 13.7868 15.164 9.99014 18.4066 7.25094C21.6492 4.51175 25.7553 3.00618 30 3C34.5147 2.99935 38.8648 4.69526 42.1877 7.75148C45.5106 10.8077 47.5638 15.001 47.94 19.5C47.9525 19.6951 47.9243 19.8908 47.8572 20.0744C47.7901 20.2581 47.6855 20.4258 47.5501 20.5669C47.4146 20.7079 47.2513 20.8193 47.0706 20.8938C46.8898 20.9684 46.6955 21.0046 46.5 21C46.0982 20.9899 45.7144 20.8308 45.4233 20.5536C45.1323 20.2764 44.9547 19.9009 44.925 19.5C44.6578 16.8475 43.6885 14.3141 42.1169 12.1607C40.5454 10.0073 38.4283 8.31162 35.9836 7.24826C33.5389 6.1849 30.855 5.79229 28.2082 6.11083C25.5614 6.42938 23.0473 7.44757 20.9247 9.0606C18.8022 10.6736 17.1478 12.8232 16.1321 15.288C15.1163 17.7528 14.7757 20.4438 15.1455 23.084C15.5153 25.7241 16.582 28.218 18.2359 30.3089C19.8897 32.3998 22.071 34.0122 24.555 34.98C25.007 34.0034 25.7133 33.1663 26.6 32.5564C27.4867 31.9466 28.5211 31.5864 29.5948 31.5137C30.6685 31.441 31.742 31.6584 32.7028 32.1432C33.6636 32.6279 34.4764 33.3622 35.0559 34.269C35.6354 35.1758 35.9604 36.2217 35.9967 37.2973C36.0331 38.3728 35.7795 39.4384 35.2625 40.3822C34.7456 41.3261 33.9843 42.1135 33.0584 42.6621C32.1325 43.2106 31.0762 43.5 30 43.5ZM15.027 36H15.3C16.47 37.143 17.769 38.151 19.176 39H15.027C13.344 39 12 40.341 12 42C12 45.927 13.866 48.852 17.019 50.859C20.229 52.908 24.795 54 30 54C35.205 54 39.771 52.908 42.981 50.859C46.131 48.849 48 45.93 48 42C48 41.2043 47.6839 40.4413 47.1213 39.8787C46.5587 39.3161 45.7957 39 45 39H38.877C39.0448 38.007 39.0448 36.993 38.877 36H45C46.5913 36 48.1174 36.6321 49.2426 37.7574C50.3679 38.8826 51 40.4087 51 42C51 47.073 48.501 50.898 44.595 53.391C40.749 55.842 35.565 57 30 57C24.435 57 19.251 55.842 15.405 53.391C11.499 50.901 9 47.07 9 42C9 38.661 11.709 36 15.027 36ZM42 21C42.0006 23.0299 41.4863 25.0268 40.5052 26.8039C39.5241 28.5809 38.1082 30.0801 36.39 31.161C35.5891 30.3534 34.6424 29.705 33.6 29.25C35.495 28.4229 37.0475 26.9686 37.9964 25.1315C38.9452 23.2944 39.2326 21.1866 38.8102 19.1626C38.3877 17.1385 37.2812 15.3217 35.6767 14.0175C34.0723 12.7133 32.0677 12.0014 30 12.0014C27.9323 12.0014 25.9277 12.7133 24.3233 14.0175C22.7188 15.3217 21.6123 17.1385 21.1898 19.1626C20.7674 21.1866 21.0548 23.2944 22.0036 25.1315C22.9525 26.9686 24.505 28.4229 26.4 29.25C25.35 29.709 24.405 30.36 23.61 31.161C21.3313 29.728 19.6005 27.5704 18.696 25.035C18.2346 23.7398 17.9991 22.3749 18 21C18 17.8174 19.2643 14.7652 21.5147 12.5147C23.7652 10.2643 26.8174 9 30 9C33.1826 9 36.2348 10.2643 38.4853 12.5147C40.7357 14.7652 42 17.8174 42 21Z" fill="#7BDF9E"/>
                    </svg>
                </div>
                <div class="inner_nt_texxt">
                  <h2>Direct <br>Support</h2>
                </div>
              </div> 
              
            </div>
  

          </div>
  
        </div>
      </section><!-- Three Grid Section -->

             <!-- ======= Five Image Grid Section ======= -->
             <section id="five_grid" class="five_grid section-bg">
              <div class="container" data-aos="fade-up">        
                <div class="row">

                  <div class="a-five-ggdd">
                    <div class="images">
                      <div class="sub_images">
                        
                        <div class="image1 item">
                         <div class="sub_iage_item">
                          <img src="https://milliondox.com/assets/img/landing_team_1.png" alt="img">
                         </div>
                         <div class="sub_iage_item_text">
                          <h2><span>Find What You Need with </span> Advanced Search</h2>
                         </div>
                        </div>
                        
                           
                        <div class="image1 item1">
                          <div class="sub_iage_item">
                            <img src="https://milliondox.com/assets/img/landing_team_2.png" alt="img">
                           </div>
                           <div class="sub_iage_item_text">
                            <h2>Organized<span>by Design </span></h2>
                           </div>

                        </div> 
                        
                        <div class="image1 item2">
                          <div class="sub_iage_item_text">
                            <h2>Vault,<span>or Your Documents' Safe Haven </span></h2>
                           </div>

                          <div class="sub_iage_item">
                            <img src="https://milliondox.com/assets/img/landing_team_3.png" alt="img">
                           </div>
                        </div>
                        
                        <div class="image1 item3">
                          <div class="sub_new_add">
                          <h2 class="what_there">What’s in<br> there?</h2>
                          <span class="empty_design_green"></span>
                        </div>
                        </div>
                    
                        
                        <div class="image1 item4">

                          <div class="sub_iage_item_text">
                            <h2>Role Management<span>for Access Control </span></h2>
                           </div>

                          <div class="sub_iage_item">
                            <img src="https://milliondox.com/assets/img/landing_team_4.png" alt="img">
                           </div>

                        </div>
                      </div>
                    </div>
                    </div>

                </div>        
              </div>
            </section>
            <!-- ======= Five Image Grid Section ======= -->

            
<!-- ======= About The Features Section ======= -->
<section id="about-featuree" class="about_featuree section-bg">
  <div class="container-fluid" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-5 col-md-5 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
<div class="account_form">
<h2>Create an Account</h2>
<span>Let’s Sign up first to enter into MillionDox...</span>
<form action="{{ route('storeinvite') }}" method="POST" id="registerForm">
    @csrf

  <div class="wrap_group">
    <div class="form-group fild_ntt">
    <label for="fname">First Name </label>
        <input type="text" id="first_name" name="first_name" placeholder="Ex: Aman" required="">
    </div>
  
    <div class="form-group fild_ntt">
    <label for="lname">Last Name </label>
        <input type="text" id="last_name" name="last_name" placeholder="Ex: Sharma" required="">
    </div>
  </div>

  <div class="wrap_group enter_otpp_wrapp">
    <div class="form-group fild_ntt">
    <label for="email">Your E-mail </label>
<input id="email" type="email" class="form-control" name="email" required="" autocomplete="email" placeholder="Ex: aman@business.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
    </div>
    <div class="form-group fild_ntt enter_otpp">
    <label for="otp">Enter OTP sent to your E-mail</label>
    <input id="otp" type="text" class="form-control" name="otp" required="" autocomplete="otp" placeholder="0000">
    <button type="button" class="resend_otp" id="resendEmailOtp">Resend OTP</button>
    <div id="otp-timer" style="display: none;"></div> <!-- Timer display -->
</div>
</div>


    <div class="wrap_group">  
    <div class="form-group fild_ntt">
        <div class="form-input position-relative">
        <label for="password">Password </label>
            <input id="password" class="form-control" type="password" name="password" required="" autocomplete="" placeholder="Enter Password">
        </div>
    </div>
    <div class="form-group fild_ntt">
        <div class="form-input position-relative">
        <label for="password-confirm">Confirm Password </label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete="new-password" placeholder="Confirm Password">
        </div>
    </div>
  </div>

<!--<button type="button" class="btn google_go" onclick="event.preventDefault(); window.location='{{ route('auth.google') }}';">-->
<!--    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--        <g clip-path="url(#clip0_1536_696)">-->
<!--        <path d="M16.3442 8.18417C16.3442 7.64035 16.3001 7.09359 16.206 6.55859H8.66016V9.63925H12.9813C12.802 10.6328 12.2258 11.5117 11.3822 12.0703V14.0692H13.9602C15.4741 12.6758 16.3442 10.6181 16.3442 8.18417Z" fill="#4285F4"/>-->
<!--        <path d="M8.65974 16.0002C10.8174 16.0002 12.637 15.2918 13.9627 14.0689L11.3847 12.07C10.6675 12.558 9.7415 12.8343 8.66268 12.8343C6.5756 12.8343 4.80598 11.4263 4.17104 9.5332H1.51074V11.5938C2.86882 14.2953 5.63494 16.0002 8.65974 16.0002Z" fill="#34A853"/>-->
<!--        <path d="M4.16852 9.5338C3.83341 8.54023 3.83341 7.46435 4.16852 6.47078V4.41016H1.51116C0.376489 6.67067 0.376489 9.33391 1.51116 11.5944L4.16852 9.5338Z" fill="#FBBC04"/>-->
<!--        <path d="M8.65974 3.16644C9.80029 3.1488 10.9026 3.57798 11.7286 4.36578L14.0127 2.08174C12.5664 0.72367 10.6469 -0.0229773 8.65974 0.000539111C5.63494 0.000539111 2.86882 1.70548 1.51074 4.40987L4.1681 6.4705C4.8001 4.57449 6.57266 3.16644 8.65974 3.16644Z" fill="#EA4335"/>-->
<!--        </g>-->
<!--        <defs>-->
<!--        <clipPath id="clip0_1536_696">-->
<!--        <rect width="16" height="16" fill="white" transform="translate(0.5)"/>-->
<!--        </clipPath>-->
<!--        </defs>-->
<!--    </svg>-->
<!--    Continue with Google-->
<!--</button>-->

    <div class="rop_regseter">
      <input type="checkbox" id="check_reg" name="check_reg" value="1" required="">
      <label for="">
        By creating an account, you agree to our Terms & Conditions
      </label>
      </div>
      <button type="submit" class="btn submit_forrm">
        Register
        </button>
</form>
</div>
                 
      </div>

      <div class="col-lg-7 col-md-7 explore_feature_immage align-items-stretch order-1 order-lg-2 img" >
<div class="image-container">
    <img src="https://milliondox.com/assets/img/beta_access.png" alt="Image 1">
</div>

      </div>
    </div>

  </div>
</section>
<!-- ======= About The Features Section ======= -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
   <footer class="footer_landing">
    <div class="footer-top"> </div>

      <div class="container">
        <div class="roww">

  <div class="social_footer_outer">
<div class="social_footer">
<div class="left_footer_title">
  <span>Follow us on</span>
  <h2>Social Media</h2>
</div>
<div class="social-links">
  <ul>
    <li>
  <a href="https://www.facebook.com/people/Milliondox/61558151050019/?mibextid=ZbWKwL" class="facebook"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M18.3334 9.99984C18.3334 5.39984 14.6001 1.6665 10.0001 1.6665C5.40008 1.6665 1.66675 5.39984 1.66675 9.99984C1.66675 14.0332 4.53341 17.3915 8.33341 18.1665V12.4998H6.66675V9.99984H8.33341V7.9165C8.33341 6.30817 9.64175 4.99984 11.2501 4.99984H13.3334V7.49984H11.6667C11.2084 7.49984 10.8334 7.87484 10.8334 8.33317V9.99984H13.3334V12.4998H10.8334V18.2915C15.0417 17.8748 18.3334 14.3248 18.3334 9.99984Z" fill="#C5C5C5"></path>
    </svg>
    </a>
  </li>
  <li>
  <a href="https://www.instagram.com/milliondoxofficial/?igsh=ZXFoNGg3am14M3Bs" class="instagram"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M6.50008 1.6665H13.5001C16.1667 1.6665 18.3334 3.83317 18.3334 6.49984V13.4998C18.3334 14.7817 17.8242 16.0111 16.9178 16.9175C16.0113 17.8239 14.782 18.3332 13.5001 18.3332H6.50008C3.83341 18.3332 1.66675 16.1665 1.66675 13.4998V6.49984C1.66675 5.21796 2.17597 3.98858 3.0824 3.08215C3.98882 2.17573 5.2182 1.6665 6.50008 1.6665ZM6.33341 3.33317C5.53777 3.33317 4.7747 3.64924 4.21209 4.21185C3.64949 4.77446 3.33341 5.53752 3.33341 6.33317V13.6665C3.33341 15.3248 4.67508 16.6665 6.33341 16.6665H13.6667C14.4624 16.6665 15.2255 16.3504 15.7881 15.7878C16.3507 15.2252 16.6667 14.4622 16.6667 13.6665V6.33317C16.6667 4.67484 15.3251 3.33317 13.6667 3.33317H6.33341ZM14.3751 4.58317C14.6513 4.58317 14.9163 4.69292 15.1117 4.88827C15.307 5.08362 15.4167 5.34857 15.4167 5.62484C15.4167 5.9011 15.307 6.16606 15.1117 6.36141C14.9163 6.55676 14.6513 6.6665 14.3751 6.6665C14.0988 6.6665 13.8339 6.55676 13.6385 6.36141C13.4432 6.16606 13.3334 5.9011 13.3334 5.62484C13.3334 5.34857 13.4432 5.08362 13.6385 4.88827C13.8339 4.69292 14.0988 4.58317 14.3751 4.58317ZM10.0001 5.83317C11.1052 5.83317 12.165 6.27216 12.9464 7.05356C13.7278 7.83496 14.1667 8.89477 14.1667 9.99984C14.1667 11.1049 13.7278 12.1647 12.9464 12.9461C12.165 13.7275 11.1052 14.1665 10.0001 14.1665C8.89501 14.1665 7.8352 13.7275 7.0538 12.9461C6.2724 12.1647 5.83341 11.1049 5.83341 9.99984C5.83341 8.89477 6.2724 7.83496 7.0538 7.05356C7.8352 6.27216 8.89501 5.83317 10.0001 5.83317ZM10.0001 7.49984C9.33704 7.49984 8.70115 7.76323 8.23231 8.23207C7.76347 8.70091 7.50008 9.3368 7.50008 9.99984C7.50008 10.6629 7.76347 11.2988 8.23231 11.7676C8.70115 12.2364 9.33704 12.4998 10.0001 12.4998C10.6631 12.4998 11.299 12.2364 11.7678 11.7676C12.2367 11.2988 12.5001 10.6629 12.5001 9.99984C12.5001 9.3368 12.2367 8.70091 11.7678 8.23207C11.299 7.76323 10.6631 7.49984 10.0001 7.49984Z" fill="#C5C5C5"></path>
    </svg></a>
  </li>
  <li>
  <a href="https://in.linkedin.com/company/milliondox" class="linkedin"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_140_221)">
    <path d="M15.4062 0.398499H1.59375C1.28035 0.395309 0.978492 0.516575 0.7544 0.735687C0.530308 0.954799 0.402291 1.25386 0.398438 1.56725V15.4355C0.402987 15.7485 0.531311 16.0468 0.755327 16.2654C0.979343 16.4839 1.28081 16.6048 1.59375 16.6016H15.4062C15.7197 16.6041 16.0213 16.4824 16.2453 16.2632C16.4693 16.0439 16.5974 15.7449 16.6016 15.4315V1.56326C16.596 1.25079 16.4673 0.95316 16.2435 0.735053C16.0196 0.516947 15.7188 0.395999 15.4062 0.398499ZM5.20227 14.211H2.79703V6.47201H5.20227V14.211ZM4.00695 5.41748C3.73108 5.41775 3.46134 5.33618 3.23183 5.18311C3.00233 5.03004 2.82338 4.81233 2.71763 4.55754C2.61188 4.30274 2.58407 4.02231 2.63773 3.75171C2.69139 3.48111 2.8241 3.2325 3.01907 3.03734C3.21405 2.84218 3.46253 2.70923 3.73308 2.65531C4.00363 2.6014 4.28409 2.62894 4.53898 2.73445C4.79388 2.83996 5.01175 3.0187 5.16504 3.24805C5.31833 3.47741 5.40016 3.74708 5.40016 4.02295C5.39981 4.20631 5.36331 4.3878 5.29274 4.55703C5.22217 4.72626 5.11891 4.87992 4.98889 5.0092C4.85887 5.13848 4.70463 5.24085 4.53499 5.31046C4.36536 5.38006 4.18367 5.41553 4.00031 5.41483L4.00695 5.41748ZM14.2109 14.211H11.8057V10.4458C11.8057 9.54928 11.7898 8.39514 10.5559 8.39514C9.32211 8.39514 9.11227 9.37264 9.11227 10.3873V14.211H6.71102V6.47201H9.01664V7.53452H9.04852C9.36992 6.92623 10.1535 6.28475 11.3236 6.28475C13.7594 6.27944 14.2109 7.88248 14.2109 9.961V14.211Z" fill="#C5C5C5"></path>
    </g>
    <defs>
    <clipPath id="clip0_140_221">
    <rect width="17" height="17" fill="white"></rect>
    </clipPath>
    </defs>
    </svg>
    </a>        
  </li>
  <li>
    <a href="https://www.threads.net/@milliondoxofficial" class="threat">
      <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M2.31453 2.66004C3.53924 1.35458 5.31495 0.583496 7.51341 0.583496C11.1274 0.583496 13.5237 2.66637 14.2822 5.55279C14.3355 5.75593 14.3059 5.97193 14.2 6.15328C14.0941 6.33463 13.9204 6.46648 13.7173 6.51981C13.5142 6.57314 13.2982 6.54359 13.1168 6.43766C12.9355 6.33173 12.8036 6.15809 12.7503 5.95495C12.1747 3.76758 10.4101 2.16683 7.51261 2.16683C5.70286 2.16683 4.36178 2.79145 3.47036 3.74225C2.57103 4.70175 2.06991 6.05629 2.06991 7.60954V9.39079C2.06991 10.944 2.57103 12.2986 3.47036 13.2573C4.36178 14.2097 5.70286 14.8335 7.51261 14.8335C8.82282 14.8335 9.86228 14.5295 10.6603 14.0379C11.4638 13.5431 11.9428 12.8868 12.0774 12.1339C12.2317 11.2662 12.0417 10.6709 11.7148 10.241C11.5352 10.01 11.3172 9.8116 11.0704 9.65441C10.9635 10.2474 10.7727 10.8071 10.4845 11.2457C9.42211 12.8599 7.3907 12.9984 6.0512 12.464C5.32603 12.1751 4.70457 11.3842 4.51141 10.5363C4.3951 10.0503 4.43414 9.53999 4.62303 9.07729C4.83282 8.57379 5.22153 8.1447 5.77491 7.81854C6.32274 7.49475 7.13657 7.34591 7.94328 7.32375C8.42936 7.31029 8.95661 7.34275 9.48703 7.42904C9.3762 6.91445 9.18857 6.5305 8.9772 6.33337C8.59403 5.97712 7.95911 5.72616 7.32261 5.73012C6.70749 5.73487 6.18578 5.97158 5.87386 6.47033C5.76258 6.64838 5.58513 6.77493 5.38054 6.82214C5.17596 6.86935 4.961 6.83336 4.78295 6.72208C4.6049 6.6108 4.47835 6.43335 4.43114 6.22876C4.38392 6.02417 4.41992 5.80921 4.5312 5.63116C5.19382 4.57191 6.28553 4.1547 7.31232 4.14679C8.31774 4.13966 9.35324 4.52045 10.0562 5.17437C10.7672 5.8362 11.0727 6.92158 11.1519 7.90879C11.8438 8.21041 12.4977 8.65295 12.9767 9.28391C13.595 10.0993 13.861 11.1507 13.6362 12.4118C13.4066 13.6975 12.5951 14.706 11.4907 15.3861C10.4077 16.0527 9.07141 16.4168 7.51261 16.4168C5.31495 16.4168 3.53845 15.6457 2.31532 14.3403C1.09932 13.0435 0.486572 11.2813 0.486572 9.39079V7.60954C0.486572 5.71904 1.09932 3.95679 2.31532 2.66004H2.31453ZM9.55828 9.05433C9.04197 8.94259 8.51412 8.89316 7.98603 8.90708C7.28066 8.92608 6.78586 9.05987 6.57924 9.18179C6.27524 9.3615 6.14382 9.54437 6.08524 9.68608C6.02284 9.84499 6.01231 10.0196 6.05516 10.1848C6.15174 10.6092 6.47078 10.9274 6.63782 10.9931C7.52924 11.3494 8.6447 11.161 9.16166 10.3756C9.3477 10.0922 9.49574 9.61562 9.55749 9.05433H9.55828Z" fill="#C5C5C5"></path>
      </svg>                    
    </a>   
  </li>
  </ul>    
</div>

</div>

<div class="footer_bootm">
 
</div>
 
</div>

<div class="foter_right_news">
  <div class="foter_right_news_back">
  <div class="top_newss">
    <div class="top_textt">
<span>Explore more on</span>
<h2>MillionDox.com</h2>
    </div>
    <a href="feature.html" class="new_letter">
      <svg width="96" height="24" viewBox="0 0 96 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M95.0607 13.0607C95.6464 12.4749 95.6464 11.5251 95.0607 10.9393L85.5147 1.3934C84.9289 0.807612 83.9792 0.807612 83.3934 1.3934C82.8076 1.97918 82.8076 2.92893 83.3934 3.51472L91.8787 12L83.3934 20.4853C82.8076 21.0711 82.8076 22.0208 83.3934 22.6066C83.9792 23.1924 84.9289 23.1924 85.5147 22.6066L95.0607 13.0607ZM0 13.5H94V10.5H0V13.5Z" fill="white"/>
        </svg>
    </a>
  </div>
  <ul class="menu">
<li><a href="https://milliondox.com/legal.html">Legal</a></li>
<li><a href="https://milliondox.com/contact.html">Customer Support</a></li>
<li><a href="https://milliondox.com/https://milliondox.com/blogs/">Blogs</a></li>
<li><a href="https://milliondox.com/makerspace.html">MakerSpace</a></li>
  </ul>
</div>

<div class="footer_bootm">
  <p>Copyright © 2024 DataSolv Technologies Private Limited. All rights reserved</p>
</div>

</div>
</div></div></footer>



  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


 


  <!-- Vendor JS Files -->
  <script src="https://milliondox.com/assets/vendor/aos/aos.js"></script>
  <script src="https://milliondox.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://milliondox.com/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="https://milliondox.com/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="https://milliondox.com/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://milliondox.com/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="https://milliondox.com/assets/vendor/php-email-form/validate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="https://milliondox.com/assets/js/main.js"></script>
  
  <script>
      $(document).ready(function() {
    $('#email').on('blur', function() {
        // Validate the email format using the input's pattern attribute
        var emailPattern = $(this).attr('pattern');
        var emailValue = $(this).val();
        
        // If the email matches the pattern, add the 'active' class to .enter_otpp
        if (emailValue.match(emailPattern)) {
            $('.enter_otpp').addClass('active');
        } else {
            $('.enter_otpp').removeClass('active'); // Optional: remove if email is not valid
        }
    });
});

  </script>
  
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle 'Next' button click to verify email and send OTP
    $('#email').on('blur', function() {
        var email = $('#email').val();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();

        // Check if email already exists
        $.ajax({
            url: "{{ route('checkEmailExistence') }}",
            method: "POST",
            data: {
                email: email,
            },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                if (response.exists) {
                    toastr.options = {
                        "timeOut": 2000,
                    };
                    toastr.error('Email already exists.');

                    // Reload the window after 2 seconds
                    setTimeout(function() {
                        window.location.reload(true);
                    }, 2000);
                } else {
                    // Email does not exist, proceed to send OTP
                    sendOtp(email, first_name, last_name);
                }
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });

    // Function to send OTP
// Function to send OTP
function sendOtp(email, first_name, last_name) {
    $.ajax({
        url: "{{ route('sendOtpd') }}",
        method: "POST",
        data: {
            email: email,
            first_name: first_name,
            last_name: last_name,
        },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(response) {
            toastr.success(response.message);
            startOtpTimer(); // Start the OTP timer here
        },
        error: function(xhr) {
            toastr.error(xhr.responseJSON.message);
        }
    });
}


    // Function to start OTP timer
  // Function to start OTP timer
function startOtpTimer() {
    let timer = 60;
    const resendBtn = document.getElementById('resendEmailOtp');
    const timerDisplay = document.getElementById('otp-timer');
    
    timerDisplay.style.display = 'block'; // Show the timer display
    resendBtn.style.display = 'none'; // Hide the resend button

    const interval = setInterval(function () {
        timer--;
        timerDisplay.innerText = `Resend OTP in ${timer}s`;

        if (timer <= 0) {
            clearInterval(interval);
            timerDisplay.innerText = ''; // Clear the timer text
            resendBtn.style.display = 'inline-block'; // Show the resend button
        }
    }, 1000);
}


    // Event listener for 'Resend OTP' button
    $('#resendEmailOtp').on('click', function() {
        var email = $('#email').val();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        sendOtp(email, first_name, last_name);
    });

    // Handle form submission for OTP verification
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            url: "{{ route('storeinvite') }}",
            method: "POST",
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        window.location.href = response.redirect; // Redirect after success
                    }, 2000);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });
});
</script>


</body>
</html>
<?php

// header("Content-type: text/css; charset: UTF-8");

$color = '#073A59';

?>
<style>
/*
*=====================[ Reset ]=================================================
*/

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/*
*=====================[ Page setup ]============================================
*/

body {
  background-color: <?php echo $color; ?>;
}

.airgame-container {
  margin: 0 auto;
  max-width: 1100px;
  min-height: 300px;
}

.airgame-half-container {
  left: 0;
  max-width: 550px;
}

/*
*=====================[ Menu ]================================================
*/

.menu {
    height: 50px;
    width: 100%;
    width: 100vw;
    background-color: rgba(0, 0, 0, 0);
    -webkit-transition: background-color 0.3s;
    transition: background-color 0.15s;
    position: fixed;
    text-align: center;
}

.menu ul {
    display: inline-block;
    list-style-type: none;
}
.menu li    {
    display: inline-block;
    line-height: 50px;
    height: 50px;
    margin: 0 auto;
    position: relative;
}
.menu li a  {
    display: block;
    height: 50px;
    line-height: 50px;
    padding: 0 15px;
    text-transform: uppercase;
    text-decoration: none;
    font-size: 85%;
    font-weight: 900;
    letter-spacing: 0.8px;
    color: rgba(255,255,255,0.6);
    -webkit-transition: color 0.3s;
    transition: color 0.3s;
}
.menu .current-menu-item a,
.menu .current_page_item a,
.menu a:hover {
    color: rgba(255,255,255,1);
}

/*
*=====================[  Menu Logo / Buttons  ]=================================
*/

.menu-actions {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 999;
  pointer-events: none;
}

.menu-actions .airgame-logo,.airgame-top-donate {
  /*display: inline-block;*/
  top: 0;
  pointer-events: auto;
}

.menu-actions .airgame-logo {
  float: left;
  clear: left;
  width: 215px;
}

.menu-actions .airgame-top-donate {
  text-align: center;
  float: right;
  clear: right;
  width: 200px;
  height: 50px;
  background-color: #D23F47;
  color: #fff;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s;
}

.menu-actions .airgame-top-donate:hover {
  background-color: #E83637;
}

.airgame-top-donate h3 {
  text-transform: uppercase;
  z-index: 9999;
  letter-spacing: 2.5px;
  line-height: 50px;
}

/*
*=====================[  Email  ]===============================================
*/

.front-page-hero-email-signup input,
.front-page-hero-email-signup button {
  border: 2px solid #4B6C94;
  padding: 10px;
  font-size: 120%;
}

.front-page-hero-email-signup input.email-signup-email {
  width: 50%;
  left: 0;
  color: #4B6C94;
}

.front-page-hero-email-signup input.email-signup-zip {
  width: 25%;
  left: 0;
  color: #4B6C94;
}

.front-page-hero-email-signup button {
  width: 20%;
  right: 0;
  background-color: #052B53;
  color: #fff;
  text-transform: uppercase;
}

h1.footer-signup {
  font-size: 400%;
  margin-bottom: 30px;
}

div.footer-signup {
  padding-top: 100px;
  text-align: center;
}

.airgame-footer-email-signup {
  min-height: 500px;
  color: #fff;
  padding: 200px 50px 50px 50px;
  background-size: cover;
  background-position: 55% 35%;
}

.

/*
*=====================[ Footer ]================================================
*/

.airgame-footer, .airgame-disclaimer-container, .airgame-copyright-container {
  text-align: center;
}

.airgame-footer {
  text-align: center;
  color: #063669;
  background-color: #032140;
  padding: 30px 0 120px 0;
}

.airgame-footer-logo {
  opacity: 0.15;
  margin-bottom: 30px;
}

.airgame-disclaimer-container {
  text-align: center;
  text-transform: uppercase;
  font-size: 75%;
  color: #7D99BB;
  letter-spacing: 2px;
  max-width: 700px;
  margin: 0 auto 40px auto;
  padding: 10px;
  border: 1.5px solid #7D99BB;
}

.airgame-disclaimer-container h2 {
  margin: 0 auto;
}

.airgame-copyright-container h2 {
  text-align: center;
  font-size: 85%;
  letter-spacing: 1.5px;
  margin: 0 auto;
  max-width: 500px;
  text-transform: uppercase;
  color: #063669;
}

/*
*=====================[  Content  ]=============================================
*/

.airgame-post-header-image {
  height: 400px;
  background-size: cover;
  background-position: center;
}

.airgame-post-header-container {
}

.airgame-content-wrapper {
  background-color: #fff;
  width: 100%;
  width: 100vw;
  padding: 60px 25px;
}

.airgame-content-container {
  max-width: 750px;
  margin: 0 auto;
}

.airgame-content-container * {
  color: #1c1c1c;
  line-height: 45px;
  font-weight: 500;
}
</style>
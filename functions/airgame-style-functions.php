<?php

// This file gathers font and color settings set by the user in
// the Customizer and inserts them in the proper locations in the dynamic stylesheet
// determined by the user's layout setting.

/*
* =========== [  Sets layout, fonts, and colors based on style settings  ]
*/

require_once get_template_directory() . '/functions/airgame-packs-functions.php';

if ( !is_admin() ) {

?>
<style>

h1, h3, h5, button {
  font-family: <?php echo $hed ?>;
  font-weight: normal;
  font-style: normal;
}

h2, h4, h6, .menu li a {
    font-family: <?php echo $dek ?>;
    font-weight: normal;
    font-style: normal;
    text-transform: uppercase;
    letter-spacing: 3px;
}

p, input {
    font-family: <?php echo $copy ?>;
    font-weight: normal;
    font-style: normal;
    color: rgba(255,255,255,0.75);
    line-height: 140%;
}

<?php } ?>

/*
*=====================[ Reset ]=================================================
*/

*,
:before,
:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/*
*=====================[ Page setup ]============================================
*/

html {
  width: 100%;
  width: 100vw;
}

body {
  background-color: <?php echo $colorPrimaryVeryDark; ?>;
}

button {
  cursor: pointer;
  cursor: hand;
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
*=====================[ Menu ]==================================================
*/

.menu {
    height: 65px;
    width: 100%;
    width: 100vw;
    background-color: rgba(0, 0, 0, 0);
    -webkit-transition: background-color 0.3s;
    transition: background-color 0.15s;
    position: fixed;
    text-align: center;
    z-index: 9989;
}

/* Dynamic jQuery classes appended / removed on scroll */

.menu-switch-top {
  background-color: rgba(0, 0, 0, 0);
}

.menu-switch-scroll {
  background-color: <?php echo $colorPrimaryMedium; ?>;
}

.menu-main ul {
    display: inline-block;
    list-style-type: none;
}

.menu li {
    display: inline-block;
    line-height: 65px;
    height: 65px;
    margin: 0 auto;
    position: relative;
}

.menu li a {
    display: block;
    height: 65px;
    line-height: 65px;
    padding: 0 15px;
    text-transform: uppercase;
    text-decoration: none;
    font-size: 85%;
    font-weight: 900;
    letter-spacing: 0.8px;
    color: <?php echo $colorPrimaryUltraLight; ?>;
    -webkit-transition: color 0.3s;
    transition: color 0.3s;
    text-shadow: 0 1px 1px <?php echo $colorPrimaryVeryDark; ?>;
}

.menu .current-menu-item a,
.menu .current_page_item a,
.menu a:hover {
    color: <?php echo $colorWhitespace; ?>;
}

ul.menu-main li.menu-item {
  display: inline-block;
  vertical-align: top;
}

.menu-main > li {
  text-shadow: 5px 5px 5px red;
}

.main-nav ul ul {
	display: none;
  text-align: center;
	position: absolute;
	top: 100%;
	left: 0;
	background-color: <?php echo $colorPrimaryLight; ?>;
  -webkit-transition: background-color 0.3s ease-out;
  transition: background-color 0.3s ease-out;
	padding: 0;
  min-width: 150px;
  height: 50px;
}

.main-nav ul ul:hover {
	background-color: <?php echo $colorPrimaryDark; ?>;
}

.main-nav ul li:hover > ul {
	display:block;
}

/*
*=====================[  Menu Logo / Buttons  ]=================================
*/

.menu-actions {
  position: fixed;
  top: 0;
  width: 100%;
  width: 100vw;
  z-index: 9990;
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
  width: 250px;
}

.menu-actions .airgame-top-donate {
  text-align: center;
  float: right;
  clear: right;
  width: 250px;
  height: 65px;
  background-color: <?php echo $colorFocusMedium; ?>;
  color: <?php echo $colorWhitespace; ?>;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s;
}

.menu-actions .airgame-top-donate:hover {
  color: <?php echo $colorFocusMedium; ?>;
  background-color: <?php echo $colorWhitespace; ?>;
}

.airgame-top-donate h3 {
  font-size: 1.1em;
  text-transform: uppercase;
  z-index: 9999;
  letter-spacing: 2px;
  line-height: 57px;
}

/*
*=====================[  Email  ]===============================================
*/

.front-page-hero-email-signup input,
.front-page-hero-email-signup button {
  padding: 10px;
  font-size: 120%;
}

.front-page-hero-email-signup input.email-signup-email {
  width: 50%;
  left: 0;
  color: <?php echo $colorPrimaryLight; ?>;
}

.front-page-hero-email-signup input.email-signup-zip {
  width: 25%;
  left: 0;
  color: <?php echo $colorPrimaryLight; ?>;
}

.front-page-hero-email-signup button {
  width: 20%;
  right: 0;
  background-color: <?php echo $colorPrimaryMedium; ?>;
  color: <?php echo $colorWhitespace; ?>;
  text-transform: uppercase;
  border: 3px solid <?php echo $colorPrimaryMedium; ?>;
}

h1.footer-signup {
  font-size: 400%;
  letter-spacing: -1px;
}

div.footer-signup {
  text-align: center;
}

.airgame-footer-email-signup {
  color: <?php echo $colorWhitespace; ?>;
  padding: 100px;
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
  color: <?php echo $colorPrimaryDark; ?>;
  background-color: <?php echo $colorPrimaryVeryDark; ?>;
  padding: 30px 0 120px 0;
}

.airgame-footer-logo {
  margin-bottom: 30px;
}

.airgame-disclaimer-container {
  text-align: center;
  text-transform: uppercase;
  font-size: 60%;
  color: <?php echo $colorPrimaryLight; ?>;
  letter-spacing: 2px;
  max-width: 400px;
  margin: 0 auto 40px auto;
  padding: 10px;
  border: 1.5px solid <?php echo $colorPrimaryLight; ?>;
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
  color: <?php echo $colorPrimaryMedium; ?>;
}

.airgame-footer-ask-buttons {
  width: 100%;
  width: 100vw;
  padding: 2em;
  text-align: center;
  background-color: <?php echo $colorPrimaryDark; ?>
}

.ask-buttons-container {
  margin: 0 auto;
  width: 40em;
  text-align: center;
}

.ask-button {
  width: 45%;
  height: 2.5em;
  margin: 0.3em;
  text-transform: uppercase;
  font-size: 1.5em;
  line-height: 2.5em;
  letter-spacing: 0.1em;
  color: <?php echo $colorWhitespace; ?>;
  transition: all 0.3s ease-out;
}

.ask-contribute {
  background-color: <?php echo $colorFocusMedium; ?>;
  border: 2px solid <?php echo $colorFocusMedium; ?>;
}

.ask-contribute:hover {
  background-color: <?php echo $colorWhitespace; ?>;
  color: <?php echo $colorFocusMedium; ?>;
  border: 2px solid <?php echo $colorWhitespace; ?>;
}

.ask-volunteer {
  background-color: <?php echo $colorPrimaryVeryDark; ?>;
  border: 2px solid <?php echo $colorPrimaryLight; ?>;
}

.ask-volunteer:hover {
  background-color: <?php echo $colorWhitespace; ?>;
  color: <?php echo $colorPrimaryVeryDark; ?>;
  border: 2px solid <?php echo $colorWhitespace; ?>;
}

.soc {
  display: block;
  font-size: 0;
  list-style: none;
  text-align: center;
}

.soc li {
  display: inline-block;
  /*margin: 12px;
  margin: 1.2rem;*/
}

.soc a, .soc svg {
  display: block;
}

.soc a {
  position: relative;
  height: 30px;   height: 3rem;
  width: 30px;    width: 3rem;
  margin: 15px 5px;   margin: 1.5rem 0.5rem;
}

.soc svg {
  height: 100%;
  width: 100%;
}

.icon-footer {
color: <?php echo $colorWhitespace; ?>;
fill: <?php echo $colorWhitespace; ?>;
transition: all 0.3s ease-out;
}

.icon-footer:hover {
color: <?php echo $colorPrimaryDark; ?>;
fill: <?php echo $colorPrimaryDark; ?>;
background-color: <?php echo $colorWhitespace; ?>;
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
  background-color: <?php echo $colorWhitespace; ?>;
  width: 100%;
  width: 100vw;
  padding: 60px 25px;
}

.airgame-content-container {
  max-width: 750px;
  margin: 0 auto;
}

.airgame-content-container * {
  color: <?php echo $colorBlack; ?>;
  line-height: 45px;
  font-weight: 500;
}

/*
*=================[ Front page ]================================================
*/

.front-page-body {
  background-color: <?php echo $colorWhitespace; ?>;
}

.front-page-hero-box {
  min-height: 500px;
  color: <?php echo $colorWhitespace; ?>;
  padding: 200px 50px 50px 50px;
  background-size: cover;
  background-position: 55% 35%;
}

.front-page-hero-box h1 {
  font-size: 60px;
  line-height: 55px;
  letter-spacing: -1px;
}

.airgame-hed-box {
  display: inline-block;
}

.airgame-dek-box {
  display: inline-block;
  background-color: <?php echo $colorPrimaryDark; ?>;
  padding: 10px 20px 7px 20px;
}

.airgame-hed-box,
.airgame-dek-box {
  margin-bottom: 20px;
}

.airgame-dek-box h2 {
  color: <?php echo $colorPrimaryVeryLight; ?>;
}

.airgame-hed-box h1 {
  text-shadow: 0 1px 2px <?php echo $colorBlack; ?>;
}



/*
*=================[ NGP Form Pages ]============================================
*/

.ngp-form-page-body {
  color: <?php echo $colorWhitespace; ?>;
  padding: 50px;
  background-color: <?php echo $colorPrimaryVeryDark; ?>;
  background-size: cover;
  background-position: center;
}

.ngp-form-page-container {

}

.ngp-form-page-form-sidebar {
  max-width: 400px;
  background-color: <?php echo $colorPrimaryVeryDark; ?>;
}

.ngp-form-page-caption-box {
 padding: 25px;
}

.ngp-form-page-caption-box * {
  padding: 0 2px 5px 0;
}

/*
*=================[ Social feed ]===============================================
*/

.social-feed-wrapper {
  vertical-align: middle;
  background-color: <?php echo $colorPrimaryUltraLight; ?>;
  padding: 30px;
}

.social-feed-wrapper p.social-text {
  color: <?php echo $colorDarkGrey; ?>;
  font-size: 150%;
}

.social-feed-wrapper p.social-time {
  color: <?php echo $colorPrimaryVeryLight; ?>;
  font-family: <?php echo $hed; ?>;
  text-transform: uppercase;
  margin: 10px;
}

.social-feed-slider {
  vertical-align: middle;
  margin: 0 auto;
  max-width: 1000px;
}

.social-post {
  vertical-align: middle;
  text-align: center;
  margin: 30px;
}



</style>

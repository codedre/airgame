<?php

// header("Content-type: text/css; charset: UTF-8");

/*
* =========== [  Color Variables  ]
*/

// Primary color spectrum
$colorPrimaryVeryDark = '#032140';
$colorPrimaryDark = '#042549';
$colorPrimaryMedium = '#052B53';
$colorPrimaryLight = '#4B6C94';
$colorPrimaryVeryLight = '#7997BD';
$colorPrimaryUltraLight = '#E8EFF8';

// Alternate color spectrum
$colorAlternateMedium = '#2247B0';
$colorAlternateBright = '#244CE5';

// Focus color spectrum
$colorFocusMedium = '#D23F47';
$colorFocusBright = '#FF0000';

// Monochrome color spectrom
$colorWhitespace = '#FFFFFF';
$colorLightGrey = '#ABABAB';
$colorMediumGrey = '#787878';
$colorDarkGrey = '#474747';
$colorBlack = '#1C1C1C';


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
  background-color: <?php echo $colorPrimaryVeryDark; ?>;
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
    color: <?php echo $colorLightGrey; ?>;
    -webkit-transition: color 0.3s;
    transition: color 0.3s;
    text-shadow: 0 1px 1px <?php echo $colorBlack; ?>;
}
.menu .current-menu-item a,
.menu .current_page_item a,
.menu a:hover {
    color: <?php echo $colorWhitespace; ?>;
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
  background-color: <?php echo $colorFocusMedium; ?>;
  color: <?php echo $colorWhitespace; ?>;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s;
}

.menu-actions .airgame-top-donate:hover {
  background-color: <?php echo $colorFocusBright; ?>;
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
  border: 2px solid <?php echo $colorPrimaryLight; ?>;
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
  color: <?php echo $colorWhitespace; ?>;
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
  background-color: <?php echo $colorFocusBright; ?>;
  border: 2px solid <?php echo $colorFocusBright; ?>;
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
</style>

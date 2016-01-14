<?php

//Header font, used for large, bold headlines.
$hed = 'NowBold';

//Subheadline (i.e. "dek") font, used for subheaders.
$dek = 'NowRegular';

//Copy font, used for large areas of text.
$copy = 'Droid Serif';

?>
<?php if ( !is_admin() ): ?>
<style>

h1, h3, h5 {
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

p {
    font-family: <?php echo $copy ?>;
    font-weight: normal;
    font-style: normal;
    color: rgba(255,255,255,0.75);
    line-height: 140%;
}

.airgame-hed-box {
  display: inline-block;
}

.airgame-dek-box {
  display: inline-block;
  background-color: #052B53;
  padding: 10px 20px 7px 20px;
}

.airgame-hed-box,
.airgame-dek-box {
  margin-bottom: 20px;
}

.airgame-dek-box h2 {
  color: #7997BD;
}

.airgame-hed-box h1 {
  text-shadow: 0 0 15px rgba(0,0,0,0.5);
}

</style>
<?php endif ?>

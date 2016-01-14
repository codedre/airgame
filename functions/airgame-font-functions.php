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
}

p {
    font-family: <?php echo $copy ?>;
    font-weight: normal;
    font-style: normal;
    color: rgba(255,255,255,0.75);
    line-height: 140%;
}

</style>
<?php endif ?>

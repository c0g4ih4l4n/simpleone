
<?php
$sCode = '';
$sVote = '';


$iMax = 5;
$iSize = 32;
$iItemId = 1;
$iRateCnt = 1;
$fRateAvg = 1;
$iActiveWidth = 64;
$iWidth = $iSize * $iMax;

for ($i = 1; $i <= 5; $i ++) {
	$sVote .= "<a class = 'votes_button' id ='{$i}'></a>";
}
$sCode = <<<EOS
<div class="votes_main">
    <div class="votes_gray" style="width:{$iWidth}px;">
        <div class="votes_buttons" id="{$iItemId}" cnt="{$iRateCnt}" val="{$fRateAvg}">
            {$sVote}
        </div>
        <div class="votes_active" style="width:{$iActiveWidth}px;"></div>
    </div>
    <span><b>{$iRateCnt}</b> votes</span>
</div>
EOS;
?>

<?= $sCode; ?>

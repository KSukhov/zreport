

<h4>Отчет проделанной работы и предложений (<?php print $union['start'] ?> - <?php print $union['end'] ?>)</h4>
<table style="padding: 4px;width: 600px">



    <?php $r=1; $liked = array();$unliked = array();$offer = array();
    for($i=0;$i<count($items);$i++): ?>

        <?php
       // var_dump($items); print "<br><br>";//die;
        if(isset($items[$i])): ?>
     <?php for($j=0;$j < count($items[$i]);$j++): ?>
    <tr valign="top" style="padding: 4px;"><td style="padding: 4px;"><?php print $r++; ?>.
        </td><td style="padding: 4px;"><?php print $items[$i][$j]['title']; ?></td>
        <td style="padding: 4px;"><?php print $items[$i][$j]['body']; ?></td></tr>
     <?php endfor; ?>
    <?php endif; ?>

    <?php endfor; ?>

</table>
<?php foreach ($reports as $report): ?>
<?php if($report['liked']): ?>
    <?php $liked[] = $report['liked'] ?>
<?php endif; ?>
<?php if($report['unliked']): ?>
    <?php $unliked[] = $report['unliked'] ?>
<?php endif; ?>
<?php if($report['offer']): ?>
    <?php $offer[] = $report['offer'] ?>
<?php endif; ?>
<?php endforeach; ?>

<?php if(count($liked)): ?>
    <b>Нравится:</b><br><br>
    <?php foreach ($liked as $l): ?>
    <?=$l; ?>
    <?php endforeach; ?>
<?php endif; ?>
<?php if(count($unliked)): ?>
    <b>Не нравится:</b><br><br>
    <?php foreach ($unliked as $l): ?>
    <?=$l; ?>
    <?php endforeach ?>
<?php endif; ?>

<?php if(count($offer)): ?>
    <b>Предложения:</b><br><br>
    <?php foreach ($offer as $l): ?>
    <?=$l; ?>
    <?php endforeach ?>
<?php endif; ?>

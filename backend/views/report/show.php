

<h4>Отчет проделанной работы и предложений (<?php print $report['start'] ?> - <?php print $report['end'] ?>).<br><?php print $user ?></h4>
<table style="padding: 4px;width: 600px">
    <?php
    for($i=0;$i<count($items);$i++): ?>
    <tr valign="top" style="padding: 4px;"><td style="padding: 4px;"><?php print $items[$i]['number']; ?>
        </td><td style="padding: 4px;"><?php print $items[$i]['title']; ?></td>
        <td style="padding: 4px;"><?php print $items[$i]['body']; ?></td>
        <td style="padding: 4px;"><?php print $items[$i]['timer']; ?></td></tr>
    <?php endfor; ?>
</table>

<?php if($report['liked']): ?>
    <b>Нравится:</b><br>
    <?=$report['liked'] ?><br>
<?php endif; ?>
<?php if($report['liked']): ?>
    <b>Не нравится:</b><br>
    <?=$report['unliked'] ?><br>
<?php endif; ?><?php if($report['liked']): ?>
    <b>Предложения:</b><br>
    <?=$report['offer'] ?><br>
<?php endif; ?>
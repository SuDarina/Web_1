<div class="wrapper">

    <table class="main-table">
        <tr class="first">
            <td class="cell">
                <b>X</b>
            </td>
            <td class="cell">
                <b>Y</b>
            </td>
            <td class="cell">
                <b>R</b>
            </td>
            <td class="cell">
                <b>Result</b>
            </td>
            <td class="cell">
                <b>Time</b>
            </td>
            <td class="cell">
                <b>Benchmark</b>
            </td>
        </tr>

<!--    </table>-->
<!--</div>-->
<?php session_start(); ?>
<?php foreach ($_SESSION['history'] as $value) { ?>
        <tr class="row">
            <td class="cell"><?php echo $value[0] ?></td>
            <td class="cell"><?php echo $value[1] ?></td>
            <td class="cell"><?php echo $value[2] ?></td>
            <td class="cell" id="special_cell"><span><?php echo $value[3] ?></span></td>
            <td class="cell"><?php echo $value[4] ?></td>
            <td class="cell"><?php echo $value[5] ?></td>
        </tr>
<?php } ?>
    </table>
</div>

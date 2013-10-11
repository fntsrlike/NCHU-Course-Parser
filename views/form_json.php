<h4>一般課程</h4>
<form action="index.php" method="POST">

    <?php require 'views/form_class_normal.php';?>    

    <span>年級：</span>
    <select name="v_level">
        <?php grade_opt_printer();?>
    </select>

    <input type="hidden" name="action" value="json" />
    <input type="submit" value="開始查詢">
</form>

<h4>通識課程</h4>
<form action="index.php" method="POST">

    <?php require 'views/form_class_liberal.php';?>

    <input type="hidden" name="action" value="json" />
    <input type="submit" value="開始查詢">
</form>

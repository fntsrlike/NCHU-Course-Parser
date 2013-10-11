<h4>一般課程</h4>
<form action="index.php" method="POST">
    
    <?php require 'views/form_class_normal.php';?>

    <span class="word_13">年級：</span>
    <select name="v_level_f">
        <?php grade_opt_printer();?>
    </select>
    ~
    <select name="v_level_t">
        <?php grade_opt_printer();?>
    </select>

    <input type="hidden" name="action" value="counter" />
    <input type="submit" value="開始查詢" />
</form>


<h4>通識課程</h4>
<form action="index.php" method="POST">

    <?php require 'views/form_class_liberal.php';?>

    <input type="hidden" name="action" value="counter" />
    <input type="submit" value="開始查詢">
</form>

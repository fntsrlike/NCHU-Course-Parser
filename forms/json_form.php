<form action="index.php" method="POST">
    <span class="word_13">學年期：</span>
    <select name="v_year">
        <?php year_opt_printer("0951",  "1021");?>
    </select>

    <span class="word_13">學制：</span>
    <select name="v_career">
    <option selected="" value="U">學士班
    </select>

    <span class="word_13">系所
    <select name="v_dept">
        <?php dept_opt_printer();?>
    </select>
    </span>

    <span class="word_13">年級：</span>
    <select name="v_level">
        <?php grade_opt_printer();?>
    </select>

    <input type="hidden" name="action" value="json" />
    <input type="submit" value="開始查詢">
</form>

<div id="categoryBox">
    <div id="categoryTitle">Blog Categories</div>
    <div id="categories">
        <?php
        $query = "select distinct * from posts order by PID desc limit 5";
        $data = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($data)) {
            $cat_id = $row['PID'];
            $cat = $row['category'];
            echo "<li><a class='catBtn' href='category.php?category={$cat_id}'>" . $cat . "</a></li>";
        } ?>

    </div>
</div>
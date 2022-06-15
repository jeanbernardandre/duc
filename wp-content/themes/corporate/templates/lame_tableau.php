<div class="<?php the_sub_field('fd_bg'); ?>">
    <section class="container table">
        <?php echo strip_tags(get_sub_field('table_title'), '<br><h1><h2><h3><h4><h5><h6>'); ?>
        <?php
            $table = get_sub_field('table');
            if (empty($table) === false) {
                if (wp_is_mobile() === false) {
                    echo '<table border="0" cellpadding="0" cellspacing="0">';
                    if (empty($table['caption']) === false) {
                        echo '<caption>' . $table['caption'] . '</caption>';
                    }
                    if (empty($table['header']) === false) {
                        echo '<thead>';
                        echo '<tr>';
                        foreach ($table['header'] as $th) {
                            echo '<th>';
                            echo $th['c'];
                            echo '</th>';
                        }
                        echo '</tr>';
                        echo '</thead>';
                    }
                    echo '<tbody>';
                    foreach ($table['body'] as $tr) {
                        echo '<tr>';
                        foreach ($tr as $td) {
                            echo '<td>';
                            echo $td['c'];
                            echo '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<div class="selectwrapper">';
                    echo '<select class="table-responsive">';
                    $count = count($table['header']);
                    $first = true;
                    $i = 0;
                    foreach ($table['header'] as $row) {
                        foreach ($row as $header) {
                            if ($first) {
                                echo '<option selected value="' . $i . '">';
                                $first = false;
                            } else {
                                echo '<option value="' . $i . '">';
                            }
                            echo $header;
                            echo '</option>';
                            $i++;
                        }
                    }
                    echo '</select>';
                    echo '</div>';
                    array_shift($table);
                    for ($i = 0; $i < $count; $i++) {
                        echo '<article class="line-' . $i . '">';
                        foreach ($table['body'] as $headerRow) {
                            $entete = $headerRow[0]['c'];
                            echo '<div class="tlwrapper">';
                            echo '<div>' . $entete . '</div>';
                            echo '<div >' . $headerRow[$i]['c'] . '</div>';
                            echo '</div>';
                        }
                        echo '</article>';
                    }
                }
            }
        ?>
    </section>
</div>

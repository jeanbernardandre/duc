<div class="<?php the_sub_field('fd_bg'); ?>">
    <section class="container tablePerso">
        <?php echo strip_tags(get_sub_field('table_title'), '<br><h1><h2><h3><h4><h5><h6>'); ?>
        <?php
            $table = get_sub_field('table_row');
            if (empty($table) === false) {
                if (wp_is_mobile() === false) {
                    echo '<table border="0" cellpadding="0" cellspacing="0">';
                    echo '<thead>';
                    echo '<tr>';
                    foreach ($table[0] as $row) {
                        foreach ($row as $cell) {
                            echo '<td style="background-color: ' . $cell['t_cell_bg'] . '">';
                            echo $cell['t_cell'];
                            echo '</td>';
                        }
                    }
                    echo '</tr>';
                    echo '</thead>';
                    array_shift($table);
                    echo '<tbody>';
                    foreach ($table as $headerRow) {
                        foreach ($headerRow as $row) {
                            echo '<tr>';
                            foreach ($row as $cell) {
                                echo '<td style="background-color: ' . $cell['t_cell_bg'] . '">';
                                echo $cell['t_cell'];
                                echo '</td>';
                            }
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<div class="selectwrapper">';
                    echo '<select class="table-responsive">';
                    foreach ($table[0] as $row) {
                        $first = true;
                        foreach ($row as $key => $cell) {
                            if (empty($cell['t_cell']) === false) {
                                if ($first) {
                                    echo '<option selected value="' . $key . '">';
                                    $first = false;
                                } else {
                                    echo '<option value="' . $key . '">';
                                }
                                echo $cell['t_cell'];
                                echo '</option>';
                            }
                        }
                    }
                    echo '</select>';
                    echo '</div>';
                    array_shift($table);
                    $count = count($table[0]['t_row']);
                    for ($i = 0; $i < $count; $i++) {
                        echo '<article class="line-' . $i . '">';
                        foreach ($table as $headerRow) {
                            foreach ($headerRow as $row) {
                                if ($row[0]['t_cell'] !== $row[$i]['t_cell']) {
                                    echo '<div class="tlwrapper"';
                                    echo get_sub_field('table_rows_delete') === false ? '' : 'style="text-align:center"';
                                    echo '>';
                                    if (get_sub_field('table_rows_delete') === false) {
                                        echo '<div style="background-color: ' . $row[0]['t_cell_bg'] . '">' . str_replace('<p>', '', str_replace('</p>', '', $row[0]['t_cell'])) . '</div>';
                                    }
                                    echo '<div style="background-color: ' . $row[$i]['t_cell_bg'] . '">' . str_replace('<p>','', str_replace('</p>', '', $row[$i]['t_cell'])) . '</div>';
                                    echo '</div>';
                                }
                            }
                        }
                        echo '</article>';
                    }
                }
            }
        ?>
    </section>
</div>

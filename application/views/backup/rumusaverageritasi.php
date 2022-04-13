 <!-- <?php 
  $char = range('a', 'q');
          foreach ($char as $abjad) {
            if ($rt[0]->$abjad  == 0) {
              $rt[0]->$abjad = 1;
            }
            if ($ub[0]->$abjad  == 0) {
              $ub[0]->$abjad = 1;
            }
            if ($rt[0]->$abjad > 0) {
              $rt[0]->$abjad;
            }
            if ($ub[0]->$abjad  > 0) {
              $ub[0]->$abjad;
            }

            echo  $ub[0]->$abjad / $rt[0]->$abjad . ',';
          }

          $char2 = range('r', 'x');
          foreach ($char2 as $abjad2) {
            if ($ub2[0]->$abjad2 == 0) {
              $ub2[0]->$abjad2 = 1;
            }
            if ($ub2[0]->$abjad2 > 0) {
              $ub2[0]->$abjad2;
            }
            if ($rt2[0]->$abjad2 == 0) {
              $rt2[0]->$abjad2 = 1;
            }
            if ($rt2[0]->$abjad2 > 0) {
              $rt2[0]->$abjad2;
            }

            // echo $ub2[0]->$abjad.',';
            // echo $ub[0]->q .',';
            // echo $rt2[0]->$abjad.',';
            echo ($ub2[0]->$abjad2 + $ubc[0]->q) / $rt2[0]->$abjad2 . ',';
          }
        ?> -->


   UNIT BEREDAR
   <?php
    $char = range('a', 'q');
    foreach ($char as $abjad) {
      echo  $ub[0]->$abjad . ',';
    } ?>
   <br>
   RITASI
   <?php
    $char = range('a', 'q');
    foreach ($char as $abjad) {
      if ($rt[0]->$abjad  == 0) {
        $rt[0]->$abjad = 1;
      }
      if ($rt[0]->$abjad >= 0) {
        $rt[0]->$abjad;
      }
      // if ($ub[0]->$abjad / $rt[0]->$abjad > 3) {
      //   $ub[0]->$abjad / $rt[0]->$abjad = 0;
      // }
      echo $ub[0]->$abjad;
    }
    ?>


   <!-- <?php
        $char = range('a', 'q');
        foreach ($char as $abjad) {
          echo  $rt[0]->$abjad . ',';
        } ?> -->
   <br>
   <!-- <?php
        $char = range('a', 'q');
        foreach ($char as $abjad) {
          if ($ub[0]->$abjad / $rt[0]->$abjad  > 4) {
            $ub[0]->$abjad / $rt[0]->$abjad = 0;
            echo  $ub[0]->$abjad / $rt[0]->$abjad . ',';
          }
        }

        ?> -->

   <br>


   HASIL

   <?php
    $char = range('a', 'q');
    foreach ($char as $abjad) {
      if ($rt[0]->$abjad  == 0) {
        $rt[0]->$abjad = $ub[0]->$abjad;
      }
      if ($rt[0]->$abjad >= 0) {
        $rt[0]->$abjad;
      }
      echo  $ub[0]->$abjad / $rt[0]->$abjad;
    }
    ?>
   <!-- <?php echo $ub[0]->a  / $rt[0]->a; ?>,
   <?php echo $ub[0]->b /   $rt[0]->b; ?>,
   <?php echo $ub[0]->c  /  $rt[0]->c; ?>,
   <?php echo $ub[0]->d  / $rt[0]->d; ?>,
   <?php echo $ub[0]->e / $rt[0]->e; ?>,
   <?php echo $ub[0]->f / $rt[0]->f; ?>,
   <?php echo $ub[0]->g /  $rt[0]->g; ?>,
   <?php echo $ub[0]->h /  $rt[0]->h; ?>,
   <?php echo $ub[0]->i /  $rt[0]->i; ?>,
   <?php echo $ub[0]->j / $rt[0]->j; ?>,
   <?php echo $ub[0]->k / $rt[0]->k; ?>,
   <?php echo $ub[0]->l / $rt[0]->l; ?>,
   <?php echo $ub[0]->m / $rt[0]->m; ?>,
   <?php echo $ub[0]->n / $rt[0]->n; ?>,
   <?php echo $ub[0]->o /  $rt[0]->o; ?>,
   <?php echo $ub[0]->p / $rt[0]->p; ?>,
   <?php echo $ub[0]->q / $rt[0]->q; ?>, -->
   <!-- /.content-header -->
   <br>
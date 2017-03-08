<?php
    
    echo '<ol>';

    foreach ($data as $row) {

        $samhita = $row->samhita;
        $samhitaAux = $row->samhitaAux;

        $samhita = str_replace('{0}', '', $samhita);
        $samhita = str_replace('﻿', '', $samhita);
        $samhita = str_replace(';', '<br />', $samhita);

        $samhita = preg_replace('/ं([कखगघ])/u', "ङ्$1", $samhita);
        $samhita = preg_replace('/ं([चछजझ])/u', "ञ्$1", $samhita);
        $samhita = preg_replace('/ं([टठडढ])/u', "ण्$1", $samhita);
        $samhita = preg_replace('/ं([तथदध])/u', "न्$1", $samhita);
        $samhita = preg_replace('/ं([पफबभ])/u', "म्$1", $samhita);
        
        $samhita = preg_replace('/ं(\{\d\}[कखगघ])/u', "ङ्$1", $samhita);
        $samhita = preg_replace('/ं(\{\d\}[चछजझ])/u', "ञ्$1", $samhita);
        $samhita = preg_replace('/ं(\{\d\}[टठडढ])/u', "ण्$1", $samhita);
        $samhita = preg_replace('/ं(\{\d\}[तथदध])/u', "न्$1", $samhita);
        $samhita = preg_replace('/ं(\{\d\}[पफबभ])/u', "म्$1", $samhita);
        
        $samhita = preg_replace('/ञ्ज्ञ/u', 'ंज्ञ', $samhita);

        $samhita = str_replace('{1}', '॒', $samhita);
        $samhita = str_replace('{2}', '॑', $samhita);
        // $samhita = str_replace('{3}', '', $samhita);
        $samhita = str_replace('{4}', 'ँ', $samhita);
        $samhita = str_replace('{5}', 'ऽ', $samhita);

        $samhitaAux = str_replace(' ।', '', $samhitaAux);
        $samhitaAux = str_replace(' ॥', '', $samhitaAux);
        $samhitaAux = str_replace(';', '<br />', $samhitaAux);

        $samhitaAux = str_replace('{1}ः', 'ः{1}', $samhitaAux);
        
        $samhitaAux = str_replace('{1}', '॒', $samhitaAux);
        $samhitaAux = str_replace('{2}', '॑', $samhitaAux);
        // $samhitaAux = str_replace('{3}', '', $samhitaAux);
        $samhitaAux = str_replace('{4}', 'ँ', $samhitaAux);
        $samhitaAux = str_replace('{5}', 'ऽ', $samhitaAux);
        
        if(strcmp($samhita, $samhitaAux) != 0) {

            echo '<li>';
            echo $row->id . '<br />';
            echo '<strong><em>Samhita - Sriranga version</em></strong><br />';
            echo $samhita . '<br />';
            echo '<br /><strong><em>Samhita - Aurobindo version</em></strong><br />';
            echo $samhitaAux . '<br />&nbsp;';
            echo '</li>';
        }
    }

    echo '</ol>';

?>

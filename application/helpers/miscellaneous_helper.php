<?php

function print_y($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function get_dropdown($array_objects, $value, $name) {
    $array_return = array();
    foreach ($array_objects as $array) {
        $array_return[$array->$value] = $array->$name;
    }
    return $array_return;
}

function get_dropdown_select($array_objects, $value, $name, $select_value, $select_name = 'Seleccionar...') {
    $array_return = array($select_value => $select_name);
    foreach ($array_objects as $array) {
        $array_return[$array[$value]] = $array[$name];
    }
    return $array_return;
}

function encrypt_id($id) {
    return base64_encode(rand(111111, 999999) . $id . rand(11111, 99999));
}

function encrypt_fijo($id) {
    $id = base64_encode($id);
    return base64_encode($id);
}

function deencrypt_id($id) {
    $id = base64_decode($id);
    $id = substr($id, 6, strlen($id));
    $id = substr($id, 0, strlen($id) - 5);
    return $id;
}

function dias_transcurridos($fecha_i, $fecha_f) {
    $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
    $dias = abs($dias);
    $dias = floor($dias);
    return $dias;
}

function get_cut_day() {
    $CI = & get_instance();
    $CI->load->model('cut_model');

    $cuts = $CI->cut_model->get_all_cuts();
    $array_cuts = array();
    foreach ($cuts as $cut) {
        if ($cut->CORTE_DIAINICIO > $cut->CORTE_DIAFIN) {
            for ($a = $cut->CORTE_DIAINICIO; $a <= 31; $a++) {
                $array_cuts[$a] = $cut->CORTE_ID;
            }
            for ($a = 1; $a <= $cut->CORTE_DIAFIN; $a++) {
                $array_cuts[$a] = $cut->CORTE_ID;
            }
        } else {
            for ($a = $cut->CORTE_DIAINICIO; $a <= $cut->CORTE_DIAFIN; $a++) {
                $array_cuts[$a] = $cut->CORTE_ID;
            }
        }
    }
    return $array_cuts;
}

function get_cutday_id($id) {
    $CI = & get_instance();
    $CI->load->model('cut_model');
    $cuts = $CI->cut_model->get_cut_id($id);
    return $cuts[0]->CORTE_DIAPAGO;
}

function check_in_range($start_date, $end_date, $evaluame) {
    $start_ts = strtotime($start_date);
    $end_ts = strtotime($end_date);
    $user_ts = strtotime($evaluame);
    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

function getUltimoDiaMes($elAnio, $elMes) {
    return date("d", (mktime(0, 0, 0, $elMes + 1, 1, $elAnio) - 1));
}

function get_state_folder($id) {
    switch ($id) {
        case 1: return 'Proceso Aspirante';
            break;
        case 2: return 'No asignada';
            break;
        case 3: return 'Asignada Analista';
            break;
        case 4: return 'Proceso Analista';
            break;
        case 5: return 'Calificada';
            break;
        case 6: return 'Asignada Supervisor';
            break;
        case 7: return 'Proceso Supervisor';
            break;
        case 8: return 'Devuelta';
            break;
        case 9: return 'Cerrada';
            break;
        case 10: return 'Recalificar Analista';
            break;
        default: return '';
            break;
    }
}

function get_color_state_folder($state_name) {
    switch ($state_name) {
        case 'Admitido': return '<span class="badge badge-success">' . $state_name . '</span>';
            break;
        case 'No Admitido': return '<span class="badge badge-danger">' . $state_name . '</span>';
            break;
        default: return '<span class="badge badge-default">' . $state_name . '</span>';
            break;
    }
}

function state_folder() {
    return array(
        '' => '--Todos los Estados--',
        '1' => 'Proceso Aspirante',
        '2' => 'No asignada',
        '3' => 'Asignada Analista',
        '4' => 'Proceso Analista',
        '5' => 'Calificada',
        '6' => 'Asignada Supervisor',
        '7' => 'Proceso Supervisor',
        '8' => 'Devuelta',
        '9' => 'Cerrada',
        '10' => 'Recalificar Analista',
    );
}

function max_folio($id) {
    $CI = & get_instance();
    $SQL = "select (Maximo+1) consecutivo 
  from VW_FOLIO_MAYOR
  where id=" . $id;
    $datos = $CI->db->query($SQL);
    $datos = $datos->result();
    return $datos[0]->consecutivo;
}

function pdf($html = null, $logo = null, $nombre = null) {
//    echo $html;
//    $html="OOOJHKJHKJH JLH KJH KH KJH";
    ob_clean();
// create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(210, 272), true, 'UTF-8', false);
//    $pdf = new TCPDF('P', 'IN', array (8.5,11),true, 'UTF-8', false);
// set document information
    //$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 001');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
//$pdf->SetHeaderData($logo, '20', PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    if (!empty($logo))
        $pdf->SetHeaderData($logo, '20', '', '      PLAN ESTRATEGICO DE SEGURIDAD VÍAL       ' . date('d/m/Y'), array(0, 64, 128), array(0, 64, 128));
    $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
// set header and footer fonts
//    $pdf->SetMargins(23, 35, 13);
    $pdf->SetMargins(32, 35, 20);
    $pdf->SetHeaderMargin(14);
    $pdf->SetFooterMargin(21);
    $pdf->SetAutoPageBreak(TRUE, 20);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    //$pdf->setLanguageArray($l);
    $pdf->setFontSubsetting(false);
    $pdf->SetFont('dejavusans', '', 10, '', true);
    //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', '6'));
    $pdf->AddPage();
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
    $pdf->writeHTML($html, true, false, true, false, '');
//    $pdf->writeHTMLCell(1, 1, '', '', $html, 0, 1, 0, true, '', true);
    $pdf->Output('pesv.pdf', 'I');
}

<?php
// add_V
$ambil_nilai_kontrak = $this->Data_kontrak_model->by_id_kontrak($id_kontrak);
$where_kontrak = [
    'id_kontrak' => $id_kontrak
];
$data_kontrak = [
    'nilai_add_V' => $ambil_nilai_kontrak['nilai_kontrak_awal'],
];
$this->Data_kontrak_model->update_kontrak($where_kontrak, $data_kontrak);
// BATAS CAPEX UPDATE
// ======================================
$ambil_capex = $this->Data_kontrak_model->by_kontrak_tbl_capex($id_kontrak);
$where_capex = [
    'id_capex' => $ambil_capex['id_capex']
];
$data_capex = [
    'nilai_capex_add_V' => $ambil_capex['nilai_capex'],
];
$this->Data_kontrak_model->update_capex($where_capex, $data_capex);
$id_capex = $ambil_capex['id_capex'];
$ambil_capex_detail = $this->Data_kontrak_model->result_detail_capex_by_id_capex($id_capex);
foreach ($ambil_capex_detail as $key => $value) {
    $where_capex_detail = [
        'id_capex_detail' => $value['id_capex_detail']
    ];
    $data_capex_detail = [
        'nilai_detail_capex_add_V' => $value['nilai_detail_capex'],
    ];
    $this->Data_kontrak_model->update_tbl_capex_detail($where_capex_detail, $data_capex_detail);
}
// DETAIL CAPEX UPDATE
$ambil_capex_detail = $this->Data_kontrak_model->result_detail_capex_by_id_capex($id_capex);
foreach ($ambil_capex_detail as $key => $value_capex_detail) {
    $id_capex_detail = $value_capex_detail['id_capex_detail'];
    $this->db->select('*');
    $this->db->from('tbl_detail_capex_1');
    $this->db->where('tbl_detail_capex_1.id_capex_detail', $id_capex_detail);
    $query_result_detail_capex_1 = $this->db->get();
    foreach ($query_result_detail_capex_1->result_array() as $value_detail_capex_1) {
        // ini ambil hirarti id detail_capex_1
        $id_detail_capex_1 = $value_detail_capex_1['id_detail_capex_1'];
        $where_detail_capex_1 = [
            'id_detail_capex_1' => $value_detail_capex_1['id_detail_capex_1'],
            'id_capex_detail' => $value_detail_capex_1['id_capex_detail']
        ];
        $data_detail_capex_1 = [
            'nilai_capex_detail_1_add_V' => $value_detail_capex_1['nilai_capex_detail_1'],
        ];
        $this->Data_kontrak_model->update_tbl_detail_capex_1($where_detail_capex_1, $data_detail_capex_1);
        $id_detail_capex_1 = $value_detail_capex_1['id_detail_capex_1'];
        // BATAS DETAIL_CAPEX_2
        $this->db->select('*');
        $this->db->from('tbl_detail_capex_2');
        $this->db->where('tbl_detail_capex_2.id_detail_capex_1', $id_detail_capex_1);
        $query_result_detail_capex_2 = $this->db->get();
        foreach ($query_result_detail_capex_2->result_array() as $value_detail_capex_2) {
            $where_detail_capex_2 = [
                'id_detail_capex_2' => $value_detail_capex_2['id_detail_capex_2'],
                'id_detail_capex_1' => $value_detail_capex_2['id_detail_capex_1']
            ];
            $data_detail_capex_2 = [
                'nilai_capex_detail_2_add_V' => $value_detail_capex_2['nilai_capex_detail_2'],
            ];
            $this->Data_kontrak_model->update_tbl_detail_capex_2($where_detail_capex_2, $data_detail_capex_2);
            $id_detail_capex_2 = $value_detail_capex_2['id_detail_capex_2'];
            // BATAS DETAIL_CAPEX_3
            $this->db->select('*');
            $this->db->from('tbl_detail_capex_3');
            $this->db->where('tbl_detail_capex_3.id_detail_capex_2', $id_detail_capex_2);
            $query_result_detail_capex_3 = $this->db->get();
            foreach ($query_result_detail_capex_3->result_array() as $value_detail_capex_3) {
                $where_detail_capex_3 = [
                    'id_detail_capex_3' => $value_detail_capex_3['id_detail_capex_3'],
                    'id_detail_capex_2' => $value_detail_capex_3['id_detail_capex_2']
                ];
                $data_detail_capex_3 = [
                    'nilai_capex_detail_3_add_V' => $value_detail_capex_3['nilai_capex_detail_3'],
                ];
                $this->Data_kontrak_model->update_tbl_detail_capex_3($where_detail_capex_3, $data_detail_capex_3);
                $id_detail_capex_3 = $value_detail_capex_3['id_detail_capex_3'];
                // BATAS DETAIL_CAPEX_4
                $this->db->select('*');
                $this->db->from('tbl_detail_capex_4');
                $this->db->where('tbl_detail_capex_4.id_detail_capex_3', $id_detail_capex_3);
                $query_result_detail_capex_4 = $this->db->get();
                foreach ($query_result_detail_capex_4->result_array() as $value_detail_capex_4) {
                    $where_detail_capex_4 = [
                        'id_detail_capex_4' => $value_detail_capex_4['id_detail_capex_4'],
                        'id_detail_capex_3' => $value_detail_capex_4['id_detail_capex_3']
                    ];
                    $data_detail_capex_4 = [
                        'nilai_capex_detail_4_add_V' => $value_detail_capex_4['nilai_capex_detail_4'],
                    ];
                    $this->Data_kontrak_model->update_tbl_detail_capex_4($where_detail_capex_4, $data_detail_capex_4);
                    $id_detail_capex_4 = $value_detail_capex_4['id_detail_capex_4'];
                    // BATAS DETAIL_CAPEX_5
                    $this->db->select('*');
                    $this->db->from('tbl_detail_capex_5');
                    $this->db->where('tbl_detail_capex_5.id_detail_capex_4', $id_detail_capex_4);
                    $query_result_detail_capex_5 = $this->db->get();
                    foreach ($query_result_detail_capex_5->result_array() as $value_detail_capex_5) {
                        $where_detail_capex_5 = [
                            'id_detail_capex_5' => $value_detail_capex_5['id_detail_capex_5'],
                            'id_detail_capex_4' => $value_detail_capex_5['id_detail_capex_4']
                        ];
                        $data_detail_capex_5 = [
                            'nilai_capex_detail_5_add_V' => $value_detail_capex_5['nilai_capex_detail_5'],
                        ];
                        $this->Data_kontrak_model->update_tbl_detail_capex_5($where_detail_capex_5, $data_detail_capex_5);
                        $id_detail_capex_5 = $value_detail_capex_5['id_detail_capex_5'];
                        // BATAS DETAIL_CAPEX_6
                        $this->db->select('*');
                        $this->db->from('tbl_detail_capex_6');
                        $this->db->where('tbl_detail_capex_6.id_detail_capex_5', $id_detail_capex_5);
                        $query_result_detail_capex_6 = $this->db->get();
                        foreach ($query_result_detail_capex_6->result_array() as $value_detail_capex_6) {
                            $where_detail_capex_6 = [
                                'id_detail_capex_6' => $value_detail_capex_6['id_detail_capex_6'],
                                'id_detail_capex_5' => $value_detail_capex_6['id_detail_capex_5']
                            ];
                            $data_detail_capex_6 = [
                                'nilai_capex_detail_6_add_V' => $value_detail_capex_6['nilai_capex_detail_6'],
                            ];
                            $this->Data_kontrak_model->update_tbl_detail_capex_6($where_detail_capex_6, $data_detail_capex_6);
                            $id_detail_capex_6 = $value_detail_capex_6['id_detail_capex_6'];
                            // BATAS DETAIL_CAPEX_7
                            $this->db->select('*');
                            $this->db->from('tbl_detail_capex_7');
                            $this->db->where('tbl_detail_capex_7.id_detail_capex_6', $id_detail_capex_6);
                            $query_result_detail_capex_7 = $this->db->get();
                            foreach ($query_result_detail_capex_7->result_array() as $value_detail_capex_7) {
                                $where_detail_capex_7 = [
                                    'id_detail_capex_7' => $value_detail_capex_7['id_detail_capex_7'],
                                    'id_detail_capex_6' => $value_detail_capex_7['id_detail_capex_6']
                                ];
                                $data_detail_capex_7 = [
                                    'nilai_capex_detail_7_add_V' => $value_detail_capex_7['nilai_capex_detail_7'],
                                ];
                                $this->Data_kontrak_model->update_tbl_detail_capex_7($where_detail_capex_7, $data_detail_capex_7);
                                // 8
                                // 7
                                $id_detail_capex_7 = $value_detail_capex_7['id_detail_capex_7'];
                                // BATAS DETAIL_CAPEX_8
                                $this->db->select('*');
                                $this->db->from('tbl_detail_capex_8');
                                $this->db->where('tbl_detail_capex_8.id_detail_capex_7', $id_detail_capex_7);
                                $query_result_detail_capex_8 = $this->db->get();
                                foreach ($query_result_detail_capex_8->result_array() as $value_detail_capex_8) {
                                    $where_detail_capex_8 = [
                                        'id_detail_capex_8' => $value_detail_capex_8['id_detail_capex_8'],
                                        'id_detail_capex_7' => $value_detail_capex_8['id_detail_capex_7']
                                    ];
                                    $data_detail_capex_8 = [
                                        'nilai_capex_detail_8_add_V' => $value_detail_capex_8['nilai_capex_detail_8'],
                                    ];
                                    $this->Data_kontrak_model->update_tbl_detail_capex_8($where_detail_capex_8, $data_detail_capex_8);

                                    // 9
                                    // 8
                                    $id_detail_capex_8 = $value_detail_capex_8['id_detail_capex_8'];
                                    // BATAS DETAIL_CAPEX_9
                                    $this->db->select('*');
                                    $this->db->from('tbl_detail_capex_9');
                                    $this->db->where('tbl_detail_capex_9.id_detail_capex_8', $id_detail_capex_8);
                                    $query_result_detail_capex_9 = $this->db->get();
                                    foreach ($query_result_detail_capex_9->result_array() as $value_detail_capex_9) {
                                        $where_detail_capex_9 = [
                                            'id_detail_capex_9' => $value_detail_capex_9['id_detail_capex_9'],
                                            'id_detail_capex_8' => $value_detail_capex_9['id_detail_capex_8']
                                        ];
                                        $data_detail_capex_9 = [
                                            'nilai_capex_detail_9_add_V' => $value_detail_capex_9['nilai_capex_detail_9'],
                                        ];
                                        $this->Data_kontrak_model->update_tbl_detail_capex_9($where_detail_capex_9, $data_detail_capex_9);
                                        // 10
                                        // 9
                                        $id_detail_capex_9 = $value_detail_capex_9['id_detail_capex_9'];
                                        // BATAS DETAIL_CAPEX_10
                                        $this->db->select('*');
                                        $this->db->from('tbl_detail_capex_10');
                                        $this->db->where('tbl_detail_capex_10.id_detail_capex_9', $id_detail_capex_9);
                                        $query_result_detail_capex_10 = $this->db->get();
                                        foreach ($query_result_detail_capex_10->result_array() as $value_detail_capex_10) {
                                            $where_detail_capex_10 = [
                                                'id_detail_capex_10' => $value_detail_capex_10['id_detail_capex_10'],
                                                'id_detail_capex_9' => $value_detail_capex_10['id_detail_capex_9']
                                            ];
                                            $data_detail_capex_10 = [
                                                'nilai_capex_detail_10_add_V' => $value_detail_capex_10['nilai_capex_detail_10'],
                                            ];
                                            $this->Data_kontrak_model->update_tbl_detail_capex_10($where_detail_capex_10, $data_detail_capex_10);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}


// BATAS OPEX UPDATE
// opex
// ======================================
$ambil_opex = $this->Data_kontrak_model->by_kontrak_tbl_opex($id_kontrak);
$where_opex = [
    'id_opex' => $ambil_opex['id_opex']
];
$data_opex = [
    'nilai_opex_add_V' => $ambil_opex['nilai_opex'],
];
$this->Data_kontrak_model->update_opex($where_opex, $data_opex);
$id_opex = $ambil_opex['id_opex'];
$ambil_opex_detail = $this->Data_kontrak_model->result_detail_opex_by_id_opex($id_opex);
foreach ($ambil_opex_detail as $key => $value) {
    $where_opex_detail = [
        'id_opex_detail' => $value['id_opex_detail']
    ];
    $data_opex_detail = [
        'nilai_detail_opex_add_V' => $value['nilai_detail_opex'],
    ];
    $this->Data_kontrak_model->update_tbl_opex_detail($where_opex_detail, $data_opex_detail);
}
// DETAIL opex UPDATE
$ambil_opex_detail = $this->Data_kontrak_model->result_detail_opex_by_id_opex($id_opex);
foreach ($ambil_opex_detail as $key => $value_opex_detail) {
    $id_opex_detail = $value_opex_detail['id_opex_detail'];
    $this->db->select('*');
    $this->db->from('tbl_detail_opex_1');
    $this->db->where('tbl_detail_opex_1.id_opex_detail', $id_opex_detail);
    $query_result_detail_opex_1 = $this->db->get();
    foreach ($query_result_detail_opex_1->result_array() as $value_detail_opex_1) {
        // ini ambil hirarti id detail_opex_1
        $id_detail_opex_1 = $value_detail_opex_1['id_detail_opex_1'];
        $where_detail_opex_1 = [
            'id_detail_opex_1' => $value_detail_opex_1['id_detail_opex_1'],
            'id_opex_detail' => $value_detail_opex_1['id_opex_detail']
        ];
        $data_detail_opex_1 = [
            'nilai_opex_detail_1_add_V' => $value_detail_opex_1['nilai_opex_detail_1'],
        ];
        $this->Data_kontrak_model->update_tbl_detail_opex_1($where_detail_opex_1, $data_detail_opex_1);
        $id_detail_opex_1 = $value_detail_opex_1['id_detail_opex_1'];
        // BATAS DETAIL_opex_2
        $this->db->select('*');
        $this->db->from('tbl_detail_opex_2');
        $this->db->where('tbl_detail_opex_2.id_detail_opex_1', $id_detail_opex_1);
        $query_result_detail_opex_2 = $this->db->get();
        foreach ($query_result_detail_opex_2->result_array() as $value_detail_opex_2) {
            $where_detail_opex_2 = [
                'id_detail_opex_2' => $value_detail_opex_2['id_detail_opex_2'],
                'id_detail_opex_1' => $value_detail_opex_2['id_detail_opex_1']
            ];
            $data_detail_opex_2 = [
                'nilai_opex_detail_2_add_V' => $value_detail_opex_2['nilai_opex_detail_2'],
            ];
            $this->Data_kontrak_model->update_tbl_detail_opex_2($where_detail_opex_2, $data_detail_opex_2);
            $id_detail_opex_2 = $value_detail_opex_2['id_detail_opex_2'];
            // BATAS DETAIL_opex_3
            $this->db->select('*');
            $this->db->from('tbl_detail_opex_3');
            $this->db->where('tbl_detail_opex_3.id_detail_opex_2', $id_detail_opex_2);
            $query_result_detail_opex_3 = $this->db->get();
            foreach ($query_result_detail_opex_3->result_array() as $value_detail_opex_3) {
                $where_detail_opex_3 = [
                    'id_detail_opex_3' => $value_detail_opex_3['id_detail_opex_3'],
                    'id_detail_opex_2' => $value_detail_opex_3['id_detail_opex_2']
                ];
                $data_detail_opex_3 = [
                    'nilai_opex_detail_3_add_V' => $value_detail_opex_3['nilai_opex_detail_3'],
                ];
                $this->Data_kontrak_model->update_tbl_detail_opex_3($where_detail_opex_3, $data_detail_opex_3);
                $id_detail_opex_3 = $value_detail_opex_3['id_detail_opex_3'];
                // BATAS DETAIL_opex_4
                $this->db->select('*');
                $this->db->from('tbl_detail_opex_4');
                $this->db->where('tbl_detail_opex_4.id_detail_opex_3', $id_detail_opex_3);
                $query_result_detail_opex_4 = $this->db->get();
                foreach ($query_result_detail_opex_4->result_array() as $value_detail_opex_4) {
                    $where_detail_opex_4 = [
                        'id_detail_opex_4' => $value_detail_opex_4['id_detail_opex_4'],
                        'id_detail_opex_3' => $value_detail_opex_4['id_detail_opex_3']
                    ];
                    $data_detail_opex_4 = [
                        'nilai_opex_detail_4_add_V' => $value_detail_opex_4['nilai_opex_detail_4'],
                    ];
                    $this->Data_kontrak_model->update_tbl_detail_opex_4($where_detail_opex_4, $data_detail_opex_4);
                    $id_detail_opex_4 = $value_detail_opex_4['id_detail_opex_4'];
                    // BATAS DETAIL_opex_5
                    $this->db->select('*');
                    $this->db->from('tbl_detail_opex_5');
                    $this->db->where('tbl_detail_opex_5.id_detail_opex_4', $id_detail_opex_4);
                    $query_result_detail_opex_5 = $this->db->get();
                    foreach ($query_result_detail_opex_5->result_array() as $value_detail_opex_5) {
                        $where_detail_opex_5 = [
                            'id_detail_opex_5' => $value_detail_opex_5['id_detail_opex_5'],
                            'id_detail_opex_4' => $value_detail_opex_5['id_detail_opex_4']
                        ];
                        $data_detail_opex_5 = [
                            'nilai_opex_detail_5_add_V' => $value_detail_opex_5['nilai_opex_detail_5'],
                        ];
                        $this->Data_kontrak_model->update_tbl_detail_opex_5($where_detail_opex_5, $data_detail_opex_5);
                        $id_detail_opex_5 = $value_detail_opex_5['id_detail_opex_5'];
                        // BATAS DETAIL_opex_6
                        $this->db->select('*');
                        $this->db->from('tbl_detail_opex_6');
                        $this->db->where('tbl_detail_opex_6.id_detail_opex_5', $id_detail_opex_5);
                        $query_result_detail_opex_6 = $this->db->get();
                        foreach ($query_result_detail_opex_6->result_array() as $value_detail_opex_6) {
                            $where_detail_opex_6 = [
                                'id_detail_opex_6' => $value_detail_opex_6['id_detail_opex_6'],
                                'id_detail_opex_5' => $value_detail_opex_6['id_detail_opex_5']
                            ];
                            $data_detail_opex_6 = [
                                'nilai_opex_detail_6_add_V' => $value_detail_opex_6['nilai_opex_detail_6'],
                            ];
                            $this->Data_kontrak_model->update_tbl_detail_opex_6($where_detail_opex_6, $data_detail_opex_6);
                            $id_detail_opex_6 = $value_detail_opex_6['id_detail_opex_6'];
                            // BATAS DETAIL_opex_7
                            $this->db->select('*');
                            $this->db->from('tbl_detail_opex_7');
                            $this->db->where('tbl_detail_opex_7.id_detail_opex_6', $id_detail_opex_6);
                            $query_result_detail_opex_7 = $this->db->get();
                            foreach ($query_result_detail_opex_7->result_array() as $value_detail_opex_7) {
                                $where_detail_opex_7 = [
                                    'id_detail_opex_7' => $value_detail_opex_7['id_detail_opex_7'],
                                    'id_detail_opex_6' => $value_detail_opex_7['id_detail_opex_6']
                                ];
                                $data_detail_opex_7 = [
                                    'nilai_opex_detail_7_add_V' => $value_detail_opex_7['nilai_opex_detail_7'],
                                ];
                                $this->Data_kontrak_model->update_tbl_detail_opex_7($where_detail_opex_7, $data_detail_opex_7);
                                // 8
                                // 7
                                $id_detail_opex_7 = $value_detail_opex_7['id_detail_opex_7'];
                                // BATAS DETAIL_opex_8
                                $this->db->select('*');
                                $this->db->from('tbl_detail_opex_8');
                                $this->db->where('tbl_detail_opex_8.id_detail_opex_7', $id_detail_opex_7);
                                $query_result_detail_opex_8 = $this->db->get();
                                foreach ($query_result_detail_opex_8->result_array() as $value_detail_opex_8) {
                                    $where_detail_opex_8 = [
                                        'id_detail_opex_8' => $value_detail_opex_8['id_detail_opex_8'],
                                        'id_detail_opex_7' => $value_detail_opex_8['id_detail_opex_7']
                                    ];
                                    $data_detail_opex_8 = [
                                        'nilai_opex_detail_8_add_V' => $value_detail_opex_8['nilai_opex_detail_8'],
                                    ];
                                    $this->Data_kontrak_model->update_tbl_detail_opex_8($where_detail_opex_8, $data_detail_opex_8);

                                    // 9
                                    // 8
                                    $id_detail_opex_8 = $value_detail_opex_8['id_detail_opex_8'];
                                    // BATAS DETAIL_opex_9
                                    $this->db->select('*');
                                    $this->db->from('tbl_detail_opex_9');
                                    $this->db->where('tbl_detail_opex_9.id_detail_opex_8', $id_detail_opex_8);
                                    $query_result_detail_opex_9 = $this->db->get();
                                    foreach ($query_result_detail_opex_9->result_array() as $value_detail_opex_9) {
                                        $where_detail_opex_9 = [
                                            'id_detail_opex_9' => $value_detail_opex_9['id_detail_opex_9'],
                                            'id_detail_opex_8' => $value_detail_opex_9['id_detail_opex_8']
                                        ];
                                        $data_detail_opex_9 = [
                                            'nilai_opex_detail_9_add_V' => $value_detail_opex_9['nilai_opex_detail_9'],
                                        ];
                                        $this->Data_kontrak_model->update_tbl_detail_opex_9($where_detail_opex_9, $data_detail_opex_9);
                                        // 10
                                        // 9
                                        $id_detail_opex_9 = $value_detail_opex_9['id_detail_opex_9'];
                                        // BATAS DETAIL_opex_10
                                        $this->db->select('*');
                                        $this->db->from('tbl_detail_opex_10');
                                        $this->db->where('tbl_detail_opex_10.id_detail_opex_9', $id_detail_opex_9);
                                        $query_result_detail_opex_10 = $this->db->get();
                                        foreach ($query_result_detail_opex_10->result_array() as $value_detail_opex_10) {
                                            $where_detail_opex_10 = [
                                                'id_detail_opex_10' => $value_detail_opex_10['id_detail_opex_10'],
                                                'id_detail_opex_9' => $value_detail_opex_10['id_detail_opex_9']
                                            ];
                                            $data_detail_opex_10 = [
                                                'nilai_opex_detail_10_add_V' => $value_detail_opex_10['nilai_opex_detail_10'],
                                            ];
                                            $this->Data_kontrak_model->update_tbl_detail_opex_10($where_detail_opex_10, $data_detail_opex_10);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

// ============== akhir opex ===============
// BATAS bua UPDATE
// bua
// ======================================
$ambil_bua = $this->Data_kontrak_model->by_kontrak_tbl_bua($id_kontrak);
$where_bua = [
    'id_bua' => $ambil_bua['id_bua']
];
$data_bua = [
    'nilai_bua_add_V' => $ambil_bua['nilai_bua'],

];
$this->Data_kontrak_model->update_bua($where_bua, $data_bua);
$id_bua = $ambil_bua['id_bua'];
$ambil_bua_detail = $this->Data_kontrak_model->result_detail_bua_by_id_bua($id_bua);
foreach ($ambil_bua_detail as $key => $value) {
    $where_bua_detail = [
        'id_bua_detail' => $value['id_bua_detail']
    ];
    $data_bua_detail = [
        'nilai_detail_bua_add_V' => $value['nilai_detail_bua'],


    ];
    $this->Data_kontrak_model->update_tbl_bua_detail($where_bua_detail, $data_bua_detail);
}
// DETAIL bua UPDATE
$ambil_bua_detail = $this->Data_kontrak_model->result_detail_bua_by_id_bua($id_bua);
foreach ($ambil_bua_detail as $key => $value_bua_detail) {
    $id_bua_detail = $value_bua_detail['id_bua_detail'];
    $this->db->select('*');
    $this->db->from('tbl_detail_bua_1');
    $this->db->where('tbl_detail_bua_1.id_bua_detail', $id_bua_detail);
    $query_result_detail_bua_1 = $this->db->get();
    foreach ($query_result_detail_bua_1->result_array() as $value_detail_bua_1) {
        // ini ambil hirarti id detail_bua_1
        $id_detail_bua_1 = $value_detail_bua_1['id_detail_bua_1'];
        $where_detail_bua_1 = [
            'id_detail_bua_1' => $value_detail_bua_1['id_detail_bua_1'],
            'id_bua_detail' => $value_detail_bua_1['id_bua_detail']
        ];
        $data_detail_bua_1 = [
            'nilai_bua_detail_1_add_V' => $value_detail_bua_1['nilai_bua_detail_1'],

        ];
        $this->Data_kontrak_model->update_tbl_detail_bua_1($where_detail_bua_1, $data_detail_bua_1);
        $id_detail_bua_1 = $value_detail_bua_1['id_detail_bua_1'];
        // BATAS DETAIL_bua_2
        $this->db->select('*');
        $this->db->from('tbl_detail_bua_2');
        $this->db->where('tbl_detail_bua_2.id_detail_bua_1', $id_detail_bua_1);
        $query_result_detail_bua_2 = $this->db->get();
        foreach ($query_result_detail_bua_2->result_array() as $value_detail_bua_2) {
            $where_detail_bua_2 = [
                'id_detail_bua_2' => $value_detail_bua_2['id_detail_bua_2'],
                'id_detail_bua_1' => $value_detail_bua_2['id_detail_bua_1']
            ];
            $data_detail_bua_2 = [
                'nilai_bua_detail_2_add_V' => $value_detail_bua_2['nilai_bua_detail_2'],

            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_2($where_detail_bua_2, $data_detail_bua_2);
            $id_detail_bua_2 = $value_detail_bua_2['id_detail_bua_2'];
            // BATAS DETAIL_bua_3
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_3');
            $this->db->where('tbl_detail_bua_3.id_detail_bua_2', $id_detail_bua_2);
            $query_result_detail_bua_3 = $this->db->get();
            foreach ($query_result_detail_bua_3->result_array() as $value_detail_bua_3) {
                $where_detail_bua_3 = [
                    'id_detail_bua_3' => $value_detail_bua_3['id_detail_bua_3'],
                    'id_detail_bua_2' => $value_detail_bua_3['id_detail_bua_2']
                ];
                $data_detail_bua_3 = [
                    'nilai_bua_detail_3_add_V' => $value_detail_bua_3['nilai_bua_detail_3'],

                ];
                $this->Data_kontrak_model->update_tbl_detail_bua_3($where_detail_bua_3, $data_detail_bua_3);
                $id_detail_bua_3 = $value_detail_bua_3['id_detail_bua_3'];
                // BATAS DETAIL_bua_4
                $this->db->select('*');
                $this->db->from('tbl_detail_bua_4');
                $this->db->where('tbl_detail_bua_4.id_detail_bua_3', $id_detail_bua_3);
                $query_result_detail_bua_4 = $this->db->get();
                foreach ($query_result_detail_bua_4->result_array() as $value_detail_bua_4) {
                    $where_detail_bua_4 = [
                        'id_detail_bua_4' => $value_detail_bua_4['id_detail_bua_4'],
                        'id_detail_bua_3' => $value_detail_bua_4['id_detail_bua_3']
                    ];
                    $data_detail_bua_4 = [
                        'nilai_bua_detail_4_add_V' => $value_detail_bua_4['nilai_bua_detail_4'],

                    ];
                    $this->Data_kontrak_model->update_tbl_detail_bua_4($where_detail_bua_4, $data_detail_bua_4);
                    $id_detail_bua_4 = $value_detail_bua_4['id_detail_bua_4'];
                    // BATAS DETAIL_bua_5
                    $this->db->select('*');
                    $this->db->from('tbl_detail_bua_5');
                    $this->db->where('tbl_detail_bua_5.id_detail_bua_4', $id_detail_bua_4);
                    $query_result_detail_bua_5 = $this->db->get();
                    foreach ($query_result_detail_bua_5->result_array() as $value_detail_bua_5) {
                        $where_detail_bua_5 = [
                            'id_detail_bua_5' => $value_detail_bua_5['id_detail_bua_5'],
                            'id_detail_bua_4' => $value_detail_bua_5['id_detail_bua_4']
                        ];
                        $data_detail_bua_5 = [
                            'nilai_bua_detail_5_add_V' => $value_detail_bua_5['nilai_bua_detail_5'],

                        ];
                        $this->Data_kontrak_model->update_tbl_detail_bua_5($where_detail_bua_5, $data_detail_bua_5);
                        $id_detail_bua_5 = $value_detail_bua_5['id_detail_bua_5'];
                        // BATAS DETAIL_bua_6
                        $this->db->select('*');
                        $this->db->from('tbl_detail_bua_6');
                        $this->db->where('tbl_detail_bua_6.id_detail_bua_5', $id_detail_bua_5);
                        $query_result_detail_bua_6 = $this->db->get();
                        foreach ($query_result_detail_bua_6->result_array() as $value_detail_bua_6) {
                            $where_detail_bua_6 = [
                                'id_detail_bua_6' => $value_detail_bua_6['id_detail_bua_6'],
                                'id_detail_bua_5' => $value_detail_bua_6['id_detail_bua_5']
                            ];
                            $data_detail_bua_6 = [
                                'nilai_bua_detail_6_add_V' => $value_detail_bua_6['nilai_bua_detail_6'],

                            ];
                            $this->Data_kontrak_model->update_tbl_detail_bua_6($where_detail_bua_6, $data_detail_bua_6);
                            $id_detail_bua_6 = $value_detail_bua_6['id_detail_bua_6'];
                            // BATAS DETAIL_bua_7
                            $this->db->select('*');
                            $this->db->from('tbl_detail_bua_7');
                            $this->db->where('tbl_detail_bua_7.id_detail_bua_6', $id_detail_bua_6);
                            $query_result_detail_bua_7 = $this->db->get();
                            foreach ($query_result_detail_bua_7->result_array() as $value_detail_bua_7) {
                                $where_detail_bua_7 = [
                                    'id_detail_bua_7' => $value_detail_bua_7['id_detail_bua_7'],
                                    'id_detail_bua_6' => $value_detail_bua_7['id_detail_bua_6']
                                ];
                                $data_detail_bua_7 = [
                                    'nilai_bua_detail_7_add_V' => $value_detail_bua_7['nilai_bua_detail_7'],

                                ];
                                $this->Data_kontrak_model->update_tbl_detail_bua_7($where_detail_bua_7, $data_detail_bua_7);
                                // 8
                                // 7
                                $id_detail_bua_7 = $value_detail_bua_7['id_detail_bua_7'];
                                // BATAS DETAIL_bua_8
                                $this->db->select('*');
                                $this->db->from('tbl_detail_bua_8');
                                $this->db->where('tbl_detail_bua_8.id_detail_bua_7', $id_detail_bua_7);
                                $query_result_detail_bua_8 = $this->db->get();
                                foreach ($query_result_detail_bua_8->result_array() as $value_detail_bua_8) {
                                    $where_detail_bua_8 = [
                                        'id_detail_bua_8' => $value_detail_bua_8['id_detail_bua_8'],
                                        'id_detail_bua_7' => $value_detail_bua_8['id_detail_bua_7']
                                    ];
                                    $data_detail_bua_8 = [
                                        'nilai_bua_detail_8_add_V' => $value_detail_bua_8['nilai_bua_detail_8'],

                                    ];
                                    $this->Data_kontrak_model->update_tbl_detail_bua_8($where_detail_bua_8, $data_detail_bua_8);

                                    // 9
                                    // 8
                                    $id_detail_bua_8 = $value_detail_bua_8['id_detail_bua_8'];
                                    // BATAS DETAIL_bua_9
                                    $this->db->select('*');
                                    $this->db->from('tbl_detail_bua_9');
                                    $this->db->where('tbl_detail_bua_9.id_detail_bua_8', $id_detail_bua_8);
                                    $query_result_detail_bua_9 = $this->db->get();
                                    foreach ($query_result_detail_bua_9->result_array() as $value_detail_bua_9) {
                                        $where_detail_bua_9 = [
                                            'id_detail_bua_9' => $value_detail_bua_9['id_detail_bua_9'],
                                            'id_detail_bua_8' => $value_detail_bua_9['id_detail_bua_8']
                                        ];
                                        $data_detail_bua_9 = [
                                            'nilai_bua_detail_9_add_V' => $value_detail_bua_9['nilai_bua_detail_9'],

                                        ];
                                        $this->Data_kontrak_model->update_tbl_detail_bua_9($where_detail_bua_9, $data_detail_bua_9);
                                        // 10
                                        // 9
                                        $id_detail_bua_9 = $value_detail_bua_9['id_detail_bua_9'];
                                        // BATAS DETAIL_bua_10
                                        $this->db->select('*');
                                        $this->db->from('tbl_detail_bua_10');
                                        $this->db->where('tbl_detail_bua_10.id_detail_bua_9', $id_detail_bua_9);
                                        $query_result_detail_bua_10 = $this->db->get();
                                        foreach ($query_result_detail_bua_10->result_array() as $value_detail_bua_10) {
                                            $where_detail_bua_10 = [
                                                'id_detail_bua_10' => $value_detail_bua_10['id_detail_bua_10'],
                                                'id_detail_bua_9' => $value_detail_bua_10['id_detail_bua_9']
                                            ];
                                            $data_detail_bua_10 = [
                                                'nilai_bua_detail_10_add_V' => $value_detail_bua_10['nilai_bua_detail_10'],

                                            ];
                                            $this->Data_kontrak_model->update_tbl_detail_bua_10($where_detail_bua_10, $data_detail_bua_10);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}


// ============== akhir bua ===============
// BATAS sdm UPDATE
// sdm
// ======================================
$ambil_sdm = $this->Data_kontrak_model->by_kontrak_tbl_sdm($id_kontrak);
$where_sdm = [
    'id_sdm' => $ambil_sdm['id_sdm']
];
$data_sdm = [
    'nilai_sdm_add_V' => $ambil_sdm['nilai_sdm'],

];
$this->Data_kontrak_model->update_sdm($where_sdm, $data_sdm);
$id_sdm = $ambil_sdm['id_sdm'];
$ambil_sdm_detail = $this->Data_kontrak_model->result_detail_sdm_by_id_sdm($id_sdm);
foreach ($ambil_sdm_detail as $key => $value) {
    $where_sdm_detail = [
        'id_sdm_detail' => $value['id_sdm_detail']
    ];
    $data_sdm_detail = [
        'nilai_detail_sdm_add_V' => $value['nilai_detail_sdm'],

    ];
    $this->Data_kontrak_model->update_tbl_sdm_detail($where_sdm_detail, $data_sdm_detail);
}
// DETAIL sdm UPDATE
$ambil_sdm_detail = $this->Data_kontrak_model->result_detail_sdm_by_id_sdm($id_sdm);
foreach ($ambil_sdm_detail as $key => $value_sdm_detail) {
    $id_sdm_detail = $value_sdm_detail['id_sdm_detail'];
    $this->db->select('*');
    $this->db->from('tbl_detail_sdm_1');
    $this->db->where('tbl_detail_sdm_1.id_sdm_detail', $id_sdm_detail);
    $query_result_detail_sdm_1 = $this->db->get();
    foreach ($query_result_detail_sdm_1->result_array() as $value_detail_sdm_1) {
        // ini ambil hirarti id detail_sdm_1
        $id_detail_sdm_1 = $value_detail_sdm_1['id_detail_sdm_1'];
        $where_detail_sdm_1 = [
            'id_detail_sdm_1' => $value_detail_sdm_1['id_detail_sdm_1'],
            'id_sdm_detail' => $value_detail_sdm_1['id_sdm_detail']
        ];
        $data_detail_sdm_1 = [
            'nilai_sdm_detail_1_add_V' => $value_detail_sdm_1['nilai_sdm_detail_1'],

        ];
        $this->Data_kontrak_model->update_tbl_detail_sdm_1($where_detail_sdm_1, $data_detail_sdm_1);
        $id_detail_sdm_1 = $value_detail_sdm_1['id_detail_sdm_1'];
        // BATAS DETAIL_sdm_2
        $this->db->select('*');
        $this->db->from('tbl_detail_sdm_2');
        $this->db->where('tbl_detail_sdm_2.id_detail_sdm_1', $id_detail_sdm_1);
        $query_result_detail_sdm_2 = $this->db->get();
        foreach ($query_result_detail_sdm_2->result_array() as $value_detail_sdm_2) {
            $where_detail_sdm_2 = [
                'id_detail_sdm_2' => $value_detail_sdm_2['id_detail_sdm_2'],
                'id_detail_sdm_1' => $value_detail_sdm_2['id_detail_sdm_1']
            ];
            $data_detail_sdm_2 = [
                'nilai_sdm_detail_2_add_V' => $value_detail_sdm_2['nilai_sdm_detail_2'],

            ];
            $this->Data_kontrak_model->update_tbl_detail_sdm_2($where_detail_sdm_2, $data_detail_sdm_2);
            $id_detail_sdm_2 = $value_detail_sdm_2['id_detail_sdm_2'];
            // BATAS DETAIL_sdm_3
            $this->db->select('*');
            $this->db->from('tbl_detail_sdm_3');
            $this->db->where('tbl_detail_sdm_3.id_detail_sdm_2', $id_detail_sdm_2);
            $query_result_detail_sdm_3 = $this->db->get();
            foreach ($query_result_detail_sdm_3->result_array() as $value_detail_sdm_3) {
                $where_detail_sdm_3 = [
                    'id_detail_sdm_3' => $value_detail_sdm_3['id_detail_sdm_3'],
                    'id_detail_sdm_2' => $value_detail_sdm_3['id_detail_sdm_2']
                ];
                $data_detail_sdm_3 = [
                    'nilai_sdm_detail_3_add_V' => $value_detail_sdm_3['nilai_sdm_detail_3'],

                ];
                $this->Data_kontrak_model->update_tbl_detail_sdm_3($where_detail_sdm_3, $data_detail_sdm_3);
                $id_detail_sdm_3 = $value_detail_sdm_3['id_detail_sdm_3'];
                // BATAS DETAIL_sdm_4
                $this->db->select('*');
                $this->db->from('tbl_detail_sdm_4');
                $this->db->where('tbl_detail_sdm_4.id_detail_sdm_3', $id_detail_sdm_3);
                $query_result_detail_sdm_4 = $this->db->get();
                foreach ($query_result_detail_sdm_4->result_array() as $value_detail_sdm_4) {
                    $where_detail_sdm_4 = [
                        'id_detail_sdm_4' => $value_detail_sdm_4['id_detail_sdm_4'],
                        'id_detail_sdm_3' => $value_detail_sdm_4['id_detail_sdm_3']
                    ];
                    $data_detail_sdm_4 = [
                        'nilai_sdm_detail_4_add_V' => $value_detail_sdm_4['nilai_sdm_detail_4'],

                    ];
                    $this->Data_kontrak_model->update_tbl_detail_sdm_4($where_detail_sdm_4, $data_detail_sdm_4);
                    $id_detail_sdm_4 = $value_detail_sdm_4['id_detail_sdm_4'];
                    // BATAS DETAIL_sdm_5
                    $this->db->select('*');
                    $this->db->from('tbl_detail_sdm_5');
                    $this->db->where('tbl_detail_sdm_5.id_detail_sdm_4', $id_detail_sdm_4);
                    $query_result_detail_sdm_5 = $this->db->get();
                    foreach ($query_result_detail_sdm_5->result_array() as $value_detail_sdm_5) {
                        $where_detail_sdm_5 = [
                            'id_detail_sdm_5' => $value_detail_sdm_5['id_detail_sdm_5'],
                            'id_detail_sdm_4' => $value_detail_sdm_5['id_detail_sdm_4']
                        ];
                        $data_detail_sdm_5 = [
                            'nilai_sdm_detail_5_add_V' => $value_detail_sdm_5['nilai_sdm_detail_5'],

                        ];
                        $this->Data_kontrak_model->update_tbl_detail_sdm_5($where_detail_sdm_5, $data_detail_sdm_5);
                        $id_detail_sdm_5 = $value_detail_sdm_5['id_detail_sdm_5'];
                        // BATAS DETAIL_sdm_6
                        $this->db->select('*');
                        $this->db->from('tbl_detail_sdm_6');
                        $this->db->where('tbl_detail_sdm_6.id_detail_sdm_5', $id_detail_sdm_5);
                        $query_result_detail_sdm_6 = $this->db->get();
                        foreach ($query_result_detail_sdm_6->result_array() as $value_detail_sdm_6) {
                            $where_detail_sdm_6 = [
                                'id_detail_sdm_6' => $value_detail_sdm_6['id_detail_sdm_6'],
                                'id_detail_sdm_5' => $value_detail_sdm_6['id_detail_sdm_5']
                            ];
                            $data_detail_sdm_6 = [
                                'nilai_sdm_detail_6_add_V' => $value_detail_sdm_6['nilai_sdm_detail_6'],

                            ];
                            $this->Data_kontrak_model->update_tbl_detail_sdm_6($where_detail_sdm_6, $data_detail_sdm_6);
                            $id_detail_sdm_6 = $value_detail_sdm_6['id_detail_sdm_6'];
                            // BATAS DETAIL_sdm_7
                            $this->db->select('*');
                            $this->db->from('tbl_detail_sdm_7');
                            $this->db->where('tbl_detail_sdm_7.id_detail_sdm_6', $id_detail_sdm_6);
                            $query_result_detail_sdm_7 = $this->db->get();
                            foreach ($query_result_detail_sdm_7->result_array() as $value_detail_sdm_7) {
                                $where_detail_sdm_7 = [
                                    'id_detail_sdm_7' => $value_detail_sdm_7['id_detail_sdm_7'],
                                    'id_detail_sdm_6' => $value_detail_sdm_7['id_detail_sdm_6']
                                ];
                                $data_detail_sdm_7 = [
                                    'nilai_sdm_detail_7_add_V' => $value_detail_sdm_7['nilai_sdm_detail_7'],

                                ];
                                $this->Data_kontrak_model->update_tbl_detail_sdm_7($where_detail_sdm_7, $data_detail_sdm_7);
                                // 8
                                // 7
                                $id_detail_sdm_7 = $value_detail_sdm_7['id_detail_sdm_7'];
                                // BATAS DETAIL_sdm_8
                                $this->db->select('*');
                                $this->db->from('tbl_detail_sdm_8');
                                $this->db->where('tbl_detail_sdm_8.id_detail_sdm_7', $id_detail_sdm_7);
                                $query_result_detail_sdm_8 = $this->db->get();
                                foreach ($query_result_detail_sdm_8->result_array() as $value_detail_sdm_8) {
                                    $where_detail_sdm_8 = [
                                        'id_detail_sdm_8' => $value_detail_sdm_8['id_detail_sdm_8'],
                                        'id_detail_sdm_7' => $value_detail_sdm_8['id_detail_sdm_7']
                                    ];
                                    $data_detail_sdm_8 = [
                                        'nilai_sdm_detail_8_add_V' => $value_detail_sdm_8['nilai_sdm_detail_8'],

                                    ];
                                    $this->Data_kontrak_model->update_tbl_detail_sdm_8($where_detail_sdm_8, $data_detail_sdm_8);

                                    // 9
                                    // 8
                                    $id_detail_sdm_8 = $value_detail_sdm_8['id_detail_sdm_8'];
                                    // BATAS DETAIL_sdm_9
                                    $this->db->select('*');
                                    $this->db->from('tbl_detail_sdm_9');
                                    $this->db->where('tbl_detail_sdm_9.id_detail_sdm_8', $id_detail_sdm_8);
                                    $query_result_detail_sdm_9 = $this->db->get();
                                    foreach ($query_result_detail_sdm_9->result_array() as $value_detail_sdm_9) {
                                        $where_detail_sdm_9 = [
                                            'id_detail_sdm_9' => $value_detail_sdm_9['id_detail_sdm_9'],
                                            'id_detail_sdm_8' => $value_detail_sdm_9['id_detail_sdm_8']
                                        ];
                                        $data_detail_sdm_9 = [
                                            'nilai_sdm_detail_9_add_V' => $value_detail_sdm_9['nilai_sdm_detail_9'],

                                        ];
                                        $this->Data_kontrak_model->update_tbl_detail_sdm_9($where_detail_sdm_9, $data_detail_sdm_9);
                                        // 10
                                        // 9
                                        $id_detail_sdm_9 = $value_detail_sdm_9['id_detail_sdm_9'];
                                        // BATAS DETAIL_sdm_10
                                        $this->db->select('*');
                                        $this->db->from('tbl_detail_sdm_10');
                                        $this->db->where('tbl_detail_sdm_10.id_detail_sdm_9', $id_detail_sdm_9);
                                        $query_result_detail_sdm_10 = $this->db->get();
                                        foreach ($query_result_detail_sdm_10->result_array() as $value_detail_sdm_10) {
                                            $where_detail_sdm_10 = [
                                                'id_detail_sdm_10' => $value_detail_sdm_10['id_detail_sdm_10'],
                                                'id_detail_sdm_9' => $value_detail_sdm_10['id_detail_sdm_9']
                                            ];
                                            $data_detail_sdm_10 = [
                                                'nilai_sdm_detail_10_add_V' => $value_detail_sdm_10['nilai_sdm_detail_10'],
                                            ];
                                            $this->Data_kontrak_model->update_tbl_detail_sdm_10($where_detail_sdm_10, $data_detail_sdm_10);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

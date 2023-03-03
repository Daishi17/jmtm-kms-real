            // _add_XIII
            $id_detail_bua_9 = $this->input->post('id_detail_bua_9');
            $where = [
                'id_detail_bua_9' => $id_detail_bua_9
            ];
            $data = [
                'nilai_bua_detail_9_add_XIII' => $this->input->post('nilai_bua_detail_9'),
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_9($where, $data);
            $row_bua_detail_9 = $this->Data_kontrak_model->by_id_detail_bua_9($id_detail_bua_9);
            $id_detail_bua_8 = $row_bua_detail_9['id_detail_bua_8'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_9');
            $this->db->where('tbl_detail_bua_9.id_detail_bua_8', $id_detail_bua_8);
            $query_detail_bua_result_9 = $this->db->get()->result_array();
            $total_detail_bua_9 = 0;
            foreach ($query_detail_bua_result_9 as $key => $value_detail_bua_9) {
                $total_detail_bua_9 +=  $value_detail_bua_9['nilai_bua_detail_9_add_XIII'];
            };
            $where = [
                'id_detail_bua_8' => $id_detail_bua_8
            ];
            $data = [
                'nilai_bua_detail_8_add_XIII' => $total_detail_bua_9,
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_8($where, $data);
            $row_bua_detail_8 = $this->Data_kontrak_model->by_id_detail_bua_8($id_detail_bua_8);
            $id_detail_bua_7 = $row_bua_detail_8['id_detail_bua_7'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_8');
            $this->db->where('tbl_detail_bua_8.id_detail_bua_7', $id_detail_bua_7);
            $query_detail_bua_result_8 = $this->db->get()->result_array();
            $total_detail_bua_8 = 0;
            foreach ($query_detail_bua_result_8 as $key => $value_detail_bua_8) {
                $total_detail_bua_8 +=  $value_detail_bua_8['nilai_bua_detail_8_add_XIII'];
            };

            $where = [
                'id_detail_bua_7' => $id_detail_bua_7
            ];
            $data = [
                'nilai_bua_detail_7_add_XIII' => $total_detail_bua_8,
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_7($where, $data);
            $row_bua_detail_7 = $this->Data_kontrak_model->by_id_detail_bua_7($id_detail_bua_7);
            $id_detail_bua_6 = $row_bua_detail_7['id_detail_bua_6'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_7');
            $this->db->where('tbl_detail_bua_7.id_detail_bua_6', $id_detail_bua_6);
            $query_detail_bua_result_7 = $this->db->get()->result_array();
            $total_detail_bua_7 = 0;
            foreach ($query_detail_bua_result_7 as $key => $value_detail_bua_7) {
                $total_detail_bua_7 +=  $value_detail_bua_7['nilai_bua_detail_7_add_XIII'];
            };
            // end ambil
            $where = [
                'id_detail_bua_6' => $id_detail_bua_6
            ];
            $data = [
                'nilai_bua_detail_6_add_XIII' => $total_detail_bua_7,
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_6($where, $data);
            $row_bua_detail_6 = $this->Data_kontrak_model->by_id_detail_bua_6($id_detail_bua_6);
            $id_detail_bua_5 = $row_bua_detail_6['id_detail_bua_5'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_6');
            $this->db->where('tbl_detail_bua_6.id_detail_bua_5', $id_detail_bua_5);
            $query_detail_bua_result_6 = $this->db->get()->result_array();
            $total_detail_bua_6 = 0;
            foreach ($query_detail_bua_result_6 as $key => $value_detail_bua_6) {
                $total_detail_bua_6 +=  $value_detail_bua_6['nilai_bua_detail_6_add_XIII'];
            };
            // end ambil
            $where = [
                'id_detail_bua_5' => $id_detail_bua_5
            ];
            $data = [
                'nilai_bua_detail_5_add_XIII' => $total_detail_bua_6,
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_5($where, $data);
            $row_bua_detail_5 = $this->Data_kontrak_model->by_id_detail_bua_5($id_detail_bua_5);
            $id_detail_bua_4 = $row_bua_detail_5['id_detail_bua_4'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_5');
            $this->db->where('tbl_detail_bua_5.id_detail_bua_4', $id_detail_bua_4);
            $query_detail_bua_result_5 = $this->db->get()->result_array();
            $total_detail_bua_5 = 0;
            foreach ($query_detail_bua_result_5 as $key => $value_detail_bua_5) {
                $total_detail_bua_5 +=  $value_detail_bua_5['nilai_bua_detail_5_add_XIII'];
            };

            $where = [
                'id_detail_bua_4' => $id_detail_bua_4
            ];
            $data = [
                'nilai_bua_detail_4_add_XIII' => $total_detail_bua_5
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_4($where, $data);
            $row_bua_detail_4 = $this->Data_kontrak_model->by_id_detail_bua_4($id_detail_bua_4);
            $id_detail_bua_3 = $row_bua_detail_4['id_detail_bua_3'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_4');
            $this->db->where('tbl_detail_bua_4.id_detail_bua_3', $id_detail_bua_3);
            $query_detail_bua_result_4 = $this->db->get()->result_array();
            $total_detail_bua_4 = 0;
            foreach ($query_detail_bua_result_4 as $key => $value_detail_bua_4) {
                $total_detail_bua_4 +=  $value_detail_bua_4['nilai_bua_detail_4_add_XIII'];
            };

            $where = [
                'id_detail_bua_3' => $id_detail_bua_3
            ];
            $data = [
                'nilai_bua_detail_3_add_XIII' => $total_detail_bua_4,
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_3($where, $data);
            $row_bua_detail_3 = $this->Data_kontrak_model->by_id_detail_bua_3($id_detail_bua_3);
            $id_detail_bua_2 = $row_bua_detail_3['id_detail_bua_2'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_3');
            $this->db->where('tbl_detail_bua_3.id_detail_bua_2', $id_detail_bua_2);
            $query_detail_bua_result_3 = $this->db->get()->result_array();
            $total_detail_bua_3 = 0;
            foreach ($query_detail_bua_result_3 as $key => $value_detail_bua_3) {
                $total_detail_bua_3 +=  $value_detail_bua_3['nilai_bua_detail_3_add_XIII'];
            };
            $where = [
                'id_detail_bua_2' => $id_detail_bua_2
            ];
            $data = [
                'nilai_bua_detail_2_add_XIII' => $total_detail_bua_3,
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_2($where, $data);
            $row_bua_detail_2 = $this->Data_kontrak_model->by_id_detail_bua_2($id_detail_bua_2);
            $id_detail_bua_1 = $row_bua_detail_2['id_detail_bua_1'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_2');
            $this->db->where('tbl_detail_bua_2.id_detail_bua_1', $id_detail_bua_1);
            $query_detail_bua_result_2 = $this->db->get()->result_array();
            $total_detail_bua_2 = 0;
            foreach ($query_detail_bua_result_2 as $key => $value_detail_bua_2) {
                $total_detail_bua_2 +=  $value_detail_bua_2['nilai_bua_detail_2_add_XIII'];
            };
            $where = [
                'id_detail_bua_1' => $id_detail_bua_1
            ];
            $data = [
                'nilai_bua_detail_1_add_XIII' => $total_detail_bua_2,
            ];
            $this->Data_kontrak_model->update_tbl_detail_bua_1($where, $data);
            $row_bua_detail_1 = $this->Data_kontrak_model->by_id_detail_bua_1($id_detail_bua_1);
            $id_bua_detail = $row_bua_detail_1['id_bua_detail'];
            $this->db->select('*');
            $this->db->from('tbl_detail_bua_1');
            $this->db->where('tbl_detail_bua_1.id_bua_detail', $id_bua_detail);
            $query_detail_bua_result = $this->db->get()->result_array();
            $total_detail_bua_1 = 0;
            foreach ($query_detail_bua_result as $key => $value_detail_bua_1) {
                $total_detail_bua_1 +=  $value_detail_bua_1['nilai_bua_detail_1_add_XIII'];
            };
            $where = [
                'id_bua_detail' => $id_bua_detail
            ];
            $data = [
                'nilai_detail_bua_add_XIII' => $total_detail_bua_1,
            ];
            $this->Data_kontrak_model->update_tbl_bua_detail($where, $data);
            $row_bua_detail = $this->Data_kontrak_model->by_id_bua_detail($id_bua_detail);
            $id_bua = $row_bua_detail['id_bua'];
            $this->db->select('*');
            $this->db->from('tbl_bua_detail');
            $this->db->where('tbl_bua_detail.id_bua', $id_bua);
            $query_detail_bua_result = $this->db->get()->result_array();
            $total_detail_bua = 0;
            foreach ($query_detail_bua_result as $key => $value_detail_bua) {
                $total_detail_bua +=  $value_detail_bua['nilai_detail_bua_add_XIII'];
            };
            $where = [
                'id_bua' => $id_bua,
            ];
            $data = [
                'nilai_bua_add_XIII' => $total_detail_bua,
            ];
            $this->Data_kontrak_model->update_tbl_bua($where, $data);
             // update after
            // bua
            // _add_XIII
            $row_bua = $this->Data_kontrak_model->by_id_bua($id_bua);
            $this->db->select('*');
            $this->db->from('tbl_bua');
            $this->db->where('tbl_bua.id_kontrak', $row_bua['id_kontrak']);
            $query_bua_result = $this->db->get()->result_array();
            $total_bua = 0;
            foreach ($query_bua_result as $key => $value_bua) {
                $total_bua += $value_bua['nilai_bua_add_XIII'];
            };

            // capex
            $this->db->select('*');
            $this->db->from('tbl_capex');
            $this->db->where('tbl_capex.id_kontrak', $row_bua['id_kontrak']);
            $query_capex_result = $this->db->get()->result_array();
            $total_capex = 0;
            foreach ($query_capex_result as $key => $value_capex) {
                $total_capex += $value_capex['nilai_capex_add_XIII'];
            };

            $this->db->select('*');
            $this->db->from('tbl_opex');
            $this->db->where('tbl_opex.id_kontrak', $row_bua['id_kontrak']);
            $query_opex_result = $this->db->get()->result_array();
            $total_opex = 0;
            foreach ($query_opex_result as $key => $value_opex) {
                $total_opex += $value_opex['nilai_opex_add_XIII'];
            };

            $this->db->select('*');
            $this->db->from('tbl_sdm');
            $this->db->where('tbl_sdm.id_kontrak', $row_bua['id_kontrak']);
            $query_sdm_result = $this->db->get()->result_array();
            $total_sdm = 0;
            foreach ($query_sdm_result as $key => $value_sdm) {
                $total_sdm += $value_sdm['nilai_sdm_add_XIII'];
            };

            $where = [
                'id_kontrak' => $row_bua['id_kontrak']
            ];
            $data = [
                'nilai_add_XIII' => $total_capex + $total_opex + $total_bua + $total_sdm,
            ];
            $this->Data_kontrak_model->update_kontrak($where, $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
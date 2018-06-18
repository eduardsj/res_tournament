<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Initial extends CI_Controller {
    
    public function index() {
        $teams = [];
        
        $finalRes = $this->db->get('group_final')->result_array();
        
        //get first and second teams
        if ($finalRes[0]['res_1'] > $finalRes[0]['res_2']){
            $teams[] = $finalRes[0]['team_1'];
            $teams[] = $finalRes[0]['team_2'];
        } else if ($finalRes[0]['res_1'] < $finalRes[0]['res_2']){
            $teams[] = $finalRes[0]['team_2'];
            $teams[] = $finalRes[0]['team_1'];
        }
         
        // get semi final results
        foreach ($this->db->get('group_semi')->result_array() as $dataSet){
            
            if (!in_array($dataSet['team_1'], $teams) || !in_array($dataSet['team_2'],$teams) ){
                if ($dataSet['res_1'] > $dataSet['res_2']){
                    $teams[] = $dataSet['team_1'];
                    $teams[] = $dataSet['team_2'];
                } else if ($dataSet['res_1'] < $dataSet['res_2']){
                    $teams[] = $dataSet['team_2'];
                    $teams[] = $dataSet['team_1'];
                }    
            }
        }
        
        // get group A results
        foreach ($this->db->get('group_a')->result_array() as $dataSet){
            if (!in_array($dataSet['team_1'], $teams) || !in_array($dataSet['team_2'],$teams)){
                if ($dataSet['res_1'] > $dataSet['res_2']){
                    $teams[] = $dataSet['team_1'];
                    $teams[] = $dataSet['team_2'];
                } else if ($dataSet['res_1'] < $dataSet['res_2']){
                    $teams[] = $dataSet['team_2'];
                    $teams[] = $dataSet['team_1'];
                }
            }
        }
        
        // get group B results
        foreach ($this->db->get('group_b')->result_array() as $dataSet){
            if (!in_array($dataSet['team_1'], $teams) || !in_array($dataSet['team_2'],$teams)){
                if ($dataSet['res_1'] > $dataSet['res_2']){
                    $teams[] = $dataSet['team_1'];
                    $teams[] = $dataSet['team_2'];
                } else if ($dataSet['res_1'] < $dataSet['res_2']){
                    $teams[] = $dataSet['team_2'];
                    $teams[] = $dataSet['team_1'];
                }
            }
        }        
        
        $data['finalRes'] = $teams;
        $this->load->view('index_view', $data);
    }
    
    //fill the table
    public function make() {
        //create data
        $this->db->trans_start();
        $this->db->query('CREATE TABLE IF NOT EXISTS `group_a` (
          `team_1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
          `team_2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
          `res_1` int(11) DEFAULT NULL,
          `res_2` int(11) DEFAULT NULL
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        
        $this->db->query('TRUNCATE group_a');
        
        $this->db->query("INSERT INTO `group_a` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
	('A', 'B', 1, 2);");
        $this->db->query("INSERT INTO `group_a` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
	('B', 'C', 2, 2);");
        $this->db->query("INSERT INTO `group_a` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
	('A', 'C', 1, 2);");
        $this->db->query('CREATE TABLE IF NOT EXISTS `group_b` (
          `team_1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
          `team_2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
          `res_1` int(11) DEFAULT NULL,
          `res_2` int(11) DEFAULT NULL
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        
        $this->db->query('TRUNCATE group_b');
        
        $this->db->query("INSERT INTO `group_b` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
	('D', 'E', 1, 2);");
        $this->db->query("INSERT INTO `group_b` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
        ('E', 'F', 1, 2);");
        $this->db->query("INSERT INTO `group_b` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
        ('F', 'D', 1, 3);");
        
        $this->db->query('CREATE TABLE IF NOT EXISTS `group_semi` (
          `team_1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
          `team_2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
          `res_1` int(11) DEFAULT NULL,
          `res_2` int(11) DEFAULT NULL
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        
        $this->db->query('TRUNCATE group_semi');
        
        $this->db->query("INSERT INTO `group_semi` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
	('A', 'E', 1, 2);");
        
        $this->db->query("INSERT INTO `group_semi` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
	('B', 'F', 1, 2);");
        
        $this->db->query('CREATE TABLE IF NOT EXISTS `group_final` (
          `team_1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
          `team_2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
          `res_1` int(11) DEFAULT NULL,
          `res_2` int(11) DEFAULT NULL
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        
        $this->db->query('TRUNCATE group_final');
        
        $this->db->query("INSERT INTO `group_final` (`team_1`, `team_2`, `res_1`, `res_2`) VALUES
	('A', 'F', 1, 2);");
        
        $this->db->trans_complete(); 
        redirect(base_url() . '#view_data');
    }
     
}

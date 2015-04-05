<?php
class Event_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
                
        public function get_event_info($eventid = NULL)
        {
        	if ($eventid == NULL) {
        		// Put something here if you don't have an event ID
        		show_404();
        	}
        	
        	$query = $this->db->get_where('event', array('id' => $eventid));
        	return $query->row_array();
        	
        }
        
        public function get_event_log($eventid = NULL) {
        	if ($eventid == NULL) {
        		// Put something here if you don't have an event ID
        		show_404();
        	}
        	
        	$query = $this->db->get_where('log', array('eventid' => $eventid));
        	return $query->row_array();
        }
        
        public function set_event()
        {
        	$data = array(
        			'name' => $this->input->post('event_name'),
        			'date' => $this->input->post('event_date'),
        			'net_location' => $this->input->post('event_net_location'),
        			'net_location_alt' => $this->input->post('event_net_location_alt'),
        			'starttime' => $this->input->post('event_starttime'),
        			'endtime' => $this->input->post('event_endtime'),
        			'notes' => $this->input->post('notes'),
        			'netctrl1' => $this->input->post('netctrl1'),
        			'netctrl2' => $this->input->post('netctrl2'),
        			'netctrl3' => $this->input->post('netctrl3')
        	);
        	
        	return $this->db->insert('event', $data);
        }
        
        
}


<?php
Class Index_model extends CI_Model
{
	
	function get_userLogin($usr, $pwd)
     {
		 $reader =    $this->db->get_where('users', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
		 return $reader->row_array();
     }
	 
	 function get_memberLogin($usr, $pwd)
     {
		 $reader =    $this->db->get_where('member', array('email'=> $usr, 'password'=>sha1($pwd)));
		 return $reader->row_array();
     }
	
	function update_squnce($seqence,$id)
		{
	
			$query=$this->db->query("select * from menu where sequence='".$seqence."'");
			$results=$query->result();
			foreach($results as $row);
			$sequenceVal=$row->sequence;
			$nid=$row->m_id;
								
			if($seqence!=$sequenceVal){
				$update=$this->db->query("update menu set sequence='".$seqence."' where m_id='".$id."'");
			}
			else{
				$query1=$this->db->query("select * from menu where m_id='".$id."'");
				$results1=$query1->result();
				foreach($results1 as $row1);
				$sequenceVal1=$row1->sequence;
				$nid1=$row1->m_id;
			
				$update=$this->db->query("update menu set sequence='".$sequenceVal1."' where m_id='".$nid."'");
				$update1=$this->db->query("update menu set sequence='".$seqence."' where m_id='".$id."'");
			}
	}
		
// Menu 		
function getDataById($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($colId!=""){
				$this->db->where($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
 public function record_count($table) {
        return $this->db->count_all($table);
    }
function getDataByIdWithPagination($table,$colId,$id,$orderId,$order,$start,$limit) 
	{
		if($colId!=""){
			$this->db->where($colId, $id);
		}
		$this->db->order_by($orderId, $order);
		if($limit!=""){
			$this->db->limit($start,$limit);
		}
		$result=$this->db->get($table);
		return $result;
	}
			
function getSearch0Data($table,$colId,$id,$colId2,$id2,$colId3,$id3,$orderId,$order,$limit) 
	{
	  		 $this->db->where($colId, $id);
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
				 if($colId3!=""){
				$this->db->where($colId3, $id3);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	
	function getArticleDataById($table,$colId,$id,$colId2,$id2,$orderId,$order,$limit) 
	{
				if($colId!=""){
				$this->db->where($colId, $id);
				}
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	function getDataByIdArray($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($id!=""){
				$this->db->where_in($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
	
	function getTable($table,$column,$order){
		$query =   $this->db
						->order_by($column, $order)
						->get($table);
		return $query;	
	}

function getOneItemTable($table,$tableColum,$userColum,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->get($table);
		return $query->row_array();	
	}

function getSearchAllData($keyword){
			$this->db->order_by('a_id', 'desc');
			$this->db->like('headline',$keyword);
			$this->db->or_like('details',$keyword);
		$query = $this->db->get('article_manage');
		return $query;	
	}
	
// Display All data with id
function getAllItemTable($table,$colum,$id,$statusColum,$status,$orderId,$order){
			  
			  if($colum!=""){
				  $this->db->where($colum,$id);
			  }
			  if($status!=""){
				  $this->db->where($statusColum,$status);
			  }
			
			  $this->db->order_by($orderId,$order);
			 $query = $this->db->get($table);
		return $query;
}

function getAllMember($keyword,$searchkey){
	  if($keyword!=""){
		  $this->db->like('company_name', $keyword);
		  $this->db->or_like('head_organization', $keyword);
		  $this->db->or_like('contact_person', $keyword);
		  $this->db->or_like('contact', $keyword);
		  $this->db->or_like('email', $keyword);
	  }
	  if($searchkey!=""){
		  $this->db->like('company_name', $searchkey, 'after');
	  }
	  $this->db->order_by('company_name','asc');
	  $query = $this->db->get('member');
	 return $query;
}

/////////////////////////////////////////All Insert, Update, Select, Delete and login Area/////////////////////////////////////////////////////////
	
/*----- Insert Table and Get ID -------- */
	
	function inertTable($table, $insertData){
		if($this->db->insert($table, $insertData)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	 
	function update_table($table, $colid,$idval, $uvalue){
		$this->db->where($colid,$idval);
		$dbquery = $this->db->update($table, $uvalue); 
		if($dbquery)
			return true;
		else
			return false;
	}
	
	function updateTable($tablename, $tableprimary_idname,$tableprimary_idvalue, $updated_array){
		$modified_date = time();
		$this->db->where($tableprimary_idname,$tableprimary_idvalue);
		$dbquery = $this->db->update($tablename, $updated_array); 

		if($dbquery)
			return true;
		else
			return false;
	}
	 function checkOldPass($table,$old_password,$cid)
		{
			$this->db->where('email', $this->session->userdata('memberAccessMail'));
			$this->db->where('id', $cid);
			$this->db->where('password', $old_password);
			$query = $this->db->get($table);
			return $query;
			/*if($query->num_rows() > 0)
				return 1;
			else
				return 0;*/
		}


/*----- Delete Table Row -------- */
	function deletetable_row($tablename, $tableidname, $tableidvalue){
		if($this->db->where($tableidname, $tableidvalue)->delete($tablename)) return true;
		return false;
	}
}

?>
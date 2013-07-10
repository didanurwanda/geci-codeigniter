<?php 

/**
 * GeCi 
 *
 * Widget dan Library Open Source untuk PHP Framework CodeIgniter
 *
 * @peckage			GeCi
 * @author			Dida Nurwanda
 * @email			didanurwanda@gmail.com
 * @blog			didanurwanda.blogspot.com
 * @copyright		Copyright (c) 2013
 * @license			http://geci.sourceforge.net/license.html
 * @link			http://geci.sourceforge.net
 * @sience			Version 1.0
 */
 
/**
 * @class			Model
 * @peckage			Model
 * @subpeckage		Component
 * @category		Component
 * @author			Dida Nurwanda
 */

namespace GeCi\component\base;

class Model extends \CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function findByPk($pk = '')
	{
		return $this->find($pk);
	}
	
	public function findAll($condition = '', $param = '')
	{
		return $this->find('all', $condition, $param);
	}
	
	public function findByAttributes($condition = '', $param = '')
	{
		return $this->findAll($condition, $param);
	}
	
	public function all($condition = '', $param = '')
	{
		return $this->findAll($condition, $param);
	}
	
	public function count($condition = '', $param = '')
	{
		return $this->find('all', $condition, $param)->num_rows();
	}
	
	public function countBySql($sql = '')
	{
		return $this->db->query($sql)->num_rows();
	}
	
	public function find($type = 'all', $condition = '', $param = '')
	{
		if($type === 'all')
		{
			$this->condition($condition, $param);
		}		
		else
		{
			$this->db->where($this->pk, $type);
		}
		
		$result = $this->db->get($this->table);
		
		if(count($result->result_array()) > 1)
		{
			return $result->result_object();
		}
		else
		{
			return $result->row();
		}
	}
	
	public function save($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	
	public function update($data = array())
	{
		$this->db->where($this->pk, $data[$this->pk]);
		return $this->db->update($this->table, $data);
	}
	
	public function updateByPk($pk = '', $data = array())
	{
		$this->db->where($this->pk, $pk);
		return $this->db->update($this->table, $data);
	}
	
	public function updateAll($data = array(), $condition = '', $param = '')
	{
		$this->condition($condition, $param);
		return $this->db->update($this->table, $data);
	}
	
	public function delete($pk = '')
	{
		return $this->db->delete($this->table, array($this->pk=>$pk));
	}
	
	public function deleteByPk($pk = '')
	{
		return $this->delete($pk);
	}
	
	public function deleteAll($condition = '', $param = '')
	{
		$this->condition($condition, $param);
		return $this->db->delete($this->table);
	}
	
	protected function condition($condition = '', $param = '')
	{
		if(is_array($condition))
		{
			if(isset($condition['distinct']))
			{
				$this->db->distinct((bool)$condition['distinct']);
			}
			if(isset($condition['select']))
			{
				$this->db->select($condition['select']);
			}
			if(isset($condition['select_max']))
			{
				if(is_array($condition['select_max']))
				{	
					$select = isset($condition['select_max'][0]) ? $condition['select_max'][0] : '';
					$alias = isset($condition['select_max'][1]) ? $condition['select_max'][1] : '';
					$this->db->select_max($select, $alias);
				}
				else
				{
					$this->db->select_max($condition['selext_max']);
				}
			}
			if(isset($condition['select_min']))
			{
				if(is_array($condition['select_min']))
				{	
					$select = isset($condition['select_min'][0]) ? $condition['select_min'][0] : '';
					$alias = isset($condition['select_min'][1]) ? $condition['select_min'][1] : '';
					$this->db->select_min($select, $alias);
				}
				else
				{
					$this->db->select_min($condition['select_min']);
				}
			}
			if(isset($condition['select_avg']))
			{
				if(is_array($condition['select_avg']))
				{	
					$select = isset($condition['select_avg'][0]) ? $condition['select_avg'][0] : '';
					$alias = isset($condition['select_avg'][1]) ? $condition['select_avg'][1] : '';
					$this->db->select_avg($select, $alias);
				}
				else
				{
					$this->db->select_avg($condition['select_avg']);
				}
			}
			if(isset($condition['select_sum']))
			{
				if(is_array($condition['select_sum']))
				{	
					$select = isset($condition['select_sum'][0]) ? $condition['select_sum'][0] : '';
					$alias = isset($condition['select_sum'][1]) ? $condition['select_sum'][1] : '';
					$this->db->select_sum($select, $alias);
				}
				else
				{
					$this->db->select_sum($condition['select_sum']);
				}
			}
			if(isset($condition['limit']))
			{
				$this->db->limit($condition['limit']);
			}
			if(isset($condition['order']))
			{
				$this->db->order_by($condition['order']);
			}
			if(isset($condition['offset']))
			{
				$this->db->offset($condition['offset']);
			}
			if(isset($condition['from']))
			{
				$this->db->from($condition['from']);
			}
			if(isset($condition['group']))
			{
				$this->db->group_by($condition['group']);
			}
			if(isset($condition['having']))
			{
				$this->db->having($condition['having']);
			}
			if(isset($condition['where']))
			{
				$this->db->where($condition['where']);
			}
			if(isset($condition['or_where']))
			{
				$this->db->or_where($condition['or_where']);
			}
			if(isset($condition['where_in']))
			{
				$key = isset($condition['where_in'][0]) ? $condition['where_in'][0] : NULL;
				$values = isset($condition['where_in'][1]) ? $condition['where_in'][1] : NULL;
				$this->db->where_in($key, $values);
			}
			if(isset($condition['or_where_in']))
			{
				$key = isset($condition['or_where_in'][0]) ? $condition['or_where_in'][0] : NULL;
				$values = isset($condition['or_where_in'][1]) ? $condition['or_where_in'][1] : NULL;
				$this->db->or_where_in($key, $values);
			}
			if(isset($condition['where_not_in']))
			{
				$key = isset($condition['where_not_in'][0]) ? $condition['where_not_in'][0] : NULL;
				$values = isset($condition['where_not_in'][1]) ? $condition['where_not_in'][1] : NULL;
				$this->db->where_not_in($key, $values);
			}
			if(isset($condition['or_where_not_in']))
			{
				$key = isset($condition['or_where_not_in'][0]) ? $condition['or_where_not_in'][0] : NULL;
				$values = isset($condition['or_where_not_in'][1]) ? $condition['or_where_not_in'][1] : NULL;
				$this->db->or_where_not_in($key, $values);
			}
			if(isset($condition['join']))
			{
				$table = isset($condition['join'][0]) ? $condition['join'][0] : '';
				$cond = isset($condition['join'][1]) ? $condition['join'][1] : '';
				$type = isset($condition['join'][2]) ? $condition['join'][2] : '';
				$this->db->join($table, $cond, $type);
			}
			if(isset($condition['like']))
			{
				$field = isset($condition['like'][0]) ? $condition['like'][0] : array();
				$side = isset($condition['like'][1]) ? $condition['like'][1] : '';
				$this->db->like($field, '', $side);
			}
			if(isset($condition['not_like']))
			{
				$field = isset($condition['not_like'][0]) ? $condition['not_like'][0] : array();
				$side = isset($condition['not_like'][1]) ? $condition['not_like'][1] : '';
				$this->db->not_like($field, '', $side);
			}
			if(isset($condition['or_like']))
			{
				$field = isset($condition['or_like'][0]) ? $condition['or_like'][0] : array();
				$side = isset($condition['or_like'][1]) ? $condition['or_like'][1] : '';
				$this->db->or_like($field, '', $side);
			}
			if(isset($condition['or_not_like']))
			{
				$field = isset($condition['or_not_like'][0]) ? $condition['or_not_like'][0] : array();
				$side = isset($condition['or_not_like'][1]) ? $condition['or_not_like'][1] : '';
				$this->db->or_not_like($field, '', $side);
			}
		}
		elseif($condition !== '' && $param !== '')
		{
			$this->db->where($condition, $param);
		}
	}
	
	public function last()
	{
		return $this->findAll()->last_row();
	}
	
	public function first()
	{
		return $this->findAll()->first_row();
	}
}
<?php

class Site_model  extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getAllContent($params)
    {
        $this->db->select('*')
            ->from(TBL_CONTENT);

        if(isset($params['content_id']))
        {
            $this->db->where('content_id', $params['content_id']);
        }

        if(isset($params['category']))
        {
            $this->db->where('category', $params['category']);
        }

        if(isset($params['limit']))
        {
            $this->db->limit($params['limit']);
        }

        if(isset($params['where_in']))
        {
            $this->db->where_in('category', $params['where_in']);
        }

        if(isset($params['search']))
        {
            $this->db->like('title', $params['search'], 'both');
            $this->db->or_like('description', $params['search'], 'both');
        }

        if(isset($params['order']))
        {
            $this->db->order_by($params['field'], $params['order']);
        }

        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result : false;
    }

    function getAllCareer($params)
    {
        $this->db->select('*')
            ->from('careers');

        if(isset($params['category']))
        {
            $this->db->where('category', $params['category']);
        }

        $this->db->order_by('created', 'desc');

        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result : false;
    }

    function getAllContact($params)
    {
        $this->db->select('*')
            ->from('contact');

        if(isset($params['category']))
        {
            $this->db->where('category', $params['category']);
        }

        $this->db->order_by('created', 'DESC');

        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result : false;
    }

    function getAllManagement($params)
    {
        $this->db->select('*')
            ->from('managements');

        if(isset($params['category']))
        {
            $this->db->where('category', $params['category']);
        }

        if(isset($params['emp_id']))
        {
            $this->db->where('emp_id', $params['emp_id']);
        }

        if(isset($params['order']))
        {
            $this->db->order_by($params['field'], $params['order']);
        }

        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result : false;
    }
}
    
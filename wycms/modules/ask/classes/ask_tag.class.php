<?php
/**
 * ask标签
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */

/**
 * ask标签
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */
class ask_tag {
    private $db;           //问题模型
    private $pos_db;       //咨询推荐模型
    private $reply_db;     //咨询回复模型
    private $hits_db;      //点击量/回复量模型

    /**
     * 构造函数
     *
     * return null
     */
    public function __construct() {
        $this->db       = wy_base::load_model('ask_question_model');
        $this->pos_db   = wy_base::load_model('ask_position_data_model');
        $this->reply_db = wy_base::load_model('ask_reply_model');
        $this->hits_db  = wy_base::load_model('ask_question_hits_model');
        $siteid = $data['siteid'] && intval($data['siteid']) ? intval($data['siteid']) : get_siteid();
        $this->TYPES    = getcache('ask_type_' . $siteid, 'commons');
    }

    /**
     * 问题统计
     *
     * @param $data array 参数列表[where|typeid|siteid|status|memberid]
     *
     * @return int
     */
    public function count($data) {
        if(isset($data['where'])) {
            $where = $data['where'];
        } else {
            $where = "1";
            if (isset($data['typeid'])) {
                $typeid = intval($data['typeid']);
                if($this->TYPES[$typeid]['child']) {
                    $typeids_str = $this->TYPES[$typeid]['arrchildid'];
                    $pos = strpos($typeids_str,',') + 1;
                    $typeids_str = substr($typeids_str, $pos);
                    $where .= " AND typeid IN ({$typeids_str})";
                } else {
                    $where .= " AND typeid='{$typeid}'";
                }
            }
            if (isset($data['siteid'])) {
                $where .= " AND siteid=" . intval($data['siteid']);
            }
            if (isset($data['status'])) {     //status条件可传in参数
                if (strpos(trim($data['status']), ",") > 0) {
                    $where .= " AND status in(" . trim($data['status']) . ")";
                } else {
                    $where .= " AND status=" . intval($data['status']);
                }
            }
            if (isset($data['memberid'])) {
                $where .= " AND memberid=" . intval($data['memberid']);
            }
        }
        return $this->db->count($where);
    }

    /**
     * 问题列表页
     *
     * @param $data array 参数列表[where|typeid|siteid|status|memberid|num|page|order|hitsinfo|replyinfo]
     *
     * @return array
     */
    public function lists($data) {
        $hitsinfo  = isset($data['hitsinfo']) && intval($data['hitsinfo']) == 1 ? true : false;
        $replyinfo = isset($data['replyinfo']) && intval($data['replyinfo']) == 1 ? true : false;
        if(isset($data['where'])) {
            $where = $data['where'];
        } else {
            $where = "1";
            if (isset($data['typeid'])) {
                $typeid = intval($data['typeid']);
                if($this->TYPES[$typeid]['child']) {
                    $typeids_str = $this->TYPES[$typeid]['arrchildid'];
                    $pos = strpos($typeids_str,',') + 1;
                    $typeids_str = substr($typeids_str, $pos);
                    $where .= " AND typeid IN ({$typeids_str})";
                } else {
                    $where .= " AND typeid='{$typeid}'";
                }
            }
            if (isset($data['siteid'])) {
                $where .= " AND siteid=" . intval($data['siteid']);
            }
            if (isset($data['status'])) {     //status条件可传in参数
                if (strpos(trim($data['status']), ",") > 0) {
                    $where .= " AND status in(" . trim($data['status']) . ")";
                } else {
                    $where .= " AND status=" . intval($data['status']);
                }
            }
            if (isset($data['memberid'])) {
                $where .= " AND memberid=" . intval($data['memberid']);
            }
        }
        $order  = $data['order'];
        $return = $this->db->select($where, '*', $data['limit'], $order, '', 'questionid');

        if ($hitsinfo || $replyinfo) {
            //遍历获取点击数/回复数，或者获取回复数据
            foreach ($return as $k => $v) {
                if ($hitsinfo) {      //获取点击数/回复数
                    $hits = $this->hits_db->get_one("questionid=" . $v['questionid']);
                    $return[$k] = array_merge($hits, $return[$k]);
                }
                if ($replyinfo) {     //获取回复数据
                    $return[$k]['reply'] = $this->reply_db->select("questionid=" . $v['questionid']);
                }
            }
        }
        return $return;
    }

    /**
     * 点击数/回复数排行榜列表标签
     *
     * @param $data array 参数列表[where|typeid|siteid|status|memberid|num|page|order|replyinfo]
     *
     * @return array
     */
    public function hits($data) {
        $order_arr = array('hits asc', 'hits desc', 'replys asc', 'replys desc');
        if (isset($data['order']) && in_array(strtolower($data['order']), $order_arr)) {
            $replyinfo = isset($data['replyinfo']) && intval($data['replyinfo']) == 1 ? true : false;
            if(isset($data['where'])) {
                $where = $data['where'];
            } else {
                $where = "1";
                if (isset($data['typeid'])) {
                    $typeid = intval($data['typeid']);
                    if($this->TYPES[$typeid]['child']) {
                        $typeids_str = $this->TYPES[$typeid]['arrchildid'];
                        $pos = strpos($typeids_str,',') + 1;
                        $typeids_str = substr($typeids_str, $pos);
                        $where .= " AND A.typeid IN ({$typeids_str})";
                    } else {
                        $where .= " AND A.typeid='{$typeid}'";
                    }
                }
                if (isset($data['siteid'])) {
                    $where .= " AND A.siteid=" . intval($data['siteid']);
                }
                if (isset($data['status'])) {     //status条件可传in参数
                    if (strpos(trim($data['status']), ",") > 0) {
                        $where .= " AND status in(" . trim($data['status']) . ")";
                    } else {
                        $where .= " AND status=" . intval($data['status']);
                    }
                }
                if (isset($data['memberid'])) {
                    $where .= " AND A.memberid=" . intval($data['memberid']);
                }
            }
            $sql = "SELECT * FROM {$this->db->db_tablepre}ask_question AS A LEFT JOIN {$this->db->db_tablepre}ask_question_hits AS B ON A.questionid=B.questionid WHERE {$where} ORDER BY B.{$data['order']} LIMIT {$data['limit']}";
            $query = $this->db->query($sql);
            $return = $this->db->fetch_array($query);
            if ($replyinfo) {     //获取回复数据
                foreach ($return as $k => $v) {
                    $return[$k]['reply'] = $this->reply_db->select("questionid=" . $v['questionid']);
                }
            }
            return $return;
        } else {
            return array();
        }
    }

    /**
     * 获取咨询子类型标签
     *
     * @param $data array 参数列表[typeid|siteid|num]
     *
     * @return array
     */
    public function type($data) {
        $data['typeid'] = intval($data['typeid']);
        $return = array();
        $i = 1;
        foreach ($this->TYPES as $typeid => $type) {
            if ($i > intval($data['limit'])) {
                break;
            }
            if($type['isclose'] || $siteid && $type['siteid'] != $siteid) {
                continue;
            }
            if($type['parentid'] == $data['typeid']) {
                $return[$typeid] = $type;
                $i ++;
            }
        }
        return $return;
    }
    
    /**
     * 推荐位数据
     *
     * @param $data array 参数列表[where|posid|typeid|siteid|num|order|replyinfo]
     *
     * @return array
     */
    public function position($data) {
        $replyinfo = isset($data['replyinfo']) && intval($data['replyinfo']) == 1 ? true : false;
        if(isset($data['where'])) {
            $where = $data['where'];
        } else {
            $where = "1";
            if (isset($data['posid'])) {
                $where .= " AND posid=" . intval($data['posid']);
            }
            if (isset($data['typeid'])) {
                $typeid = intval($data['typeid']);
                if($this->TYPES[$typeid]['child']) {
                    $typeids_str = $this->TYPES[$typeid]['arrchildid'];
                    $pos = strpos($typeids_str,',') + 1;
                    $typeids_str = substr($typeids_str, $pos);
                    $where .= " AND typeid IN ({$typeids_str})";
                } else {
                    $where .= " AND typeid='{$typeid}'";
                }
            }
            if (isset($data['siteid'])) {
                $where .= " AND siteid=" . intval($data['siteid']);
            }
        }
        $order  = $data['order'];
        $return = array();
        $pos_arr = $this->pos_db->select($where, '*', $data['limit'], $order);
        if(!empty($pos_arr)) {
            foreach ($pos_arr as $info) {
                $key          = $info['typeid'].'-'.$info['id'];
                $return[$key] = string2array($info['data']);
                $return[$key]['id']        = $info['id'];
                $return[$key]['typeid']    = $info['typeid'];
                $return[$key]['posid']     = $info['posid'];
                $return[$key]['siteid']    = $info['siteid'];
                $return[$key]['postime']   = $info['postime'];
                $return[$key]['listorder'] = $info['listorder'];
                if ($replyinfo) {     //获取回复数据
                    $return[$key]['reply'] = $this->reply_db->select("questionid=" . $info['id']);
                }
            }
        }
        return $return;
    }
}
?>
